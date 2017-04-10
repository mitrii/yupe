<?php
Yii::import('application.modules.store.models.Product');

/**
 * Class ProductsFromCategoryWidget
 *
 * Show products from specified category
 *
 * @property bool|integer $limit The number of products. Default: false (unlimited)
 * @property string $order The order of products. Default: id DESC
 * @property string $view Widget view file
 */
class SpecialProductsWidget extends \yupe\widgets\YWidget
{

    /**
     * @var bool
     */
    public $limit = false;
    /**
     * @var string
     */
    public $view = 'default';

    /**
     * @var ProductRepository $productRepository
     */
    protected $productRepository;

    /**
     *
     */
    public function init()
    {
        $this->productRepository = Yii::app()->getComponent('productRepository');
        parent::init();
    }

    /**
     * @return bool
     * @throws CException
     */
    public function run()
    {
        $this->render(
            $this->view,
            [
                'products' => $this->productRepository->getSpecial($this->limit),
            ]
        );
    }
}