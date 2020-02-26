<?php

namespace KA\CountdownTimer\ViewModel;


use Magento\Framework\Registry;
use Magento\Catalog\Model\Session as CatalogSession;
use Magento\Catalog\Api\CategoryRepositoryInterface as CategoryRepository;


class Countdowntimer implements \Magento\Framework\View\Element\Block\ArgumentInterface
{

    protected $catalogSession;
    protected $catalogProduct;
    protected $categoryRepository;
    protected $registry;


    public function __construct(
        CatalogSession $catalogSession,
        CategoryRepository $categoryRepository,
        Registry $registry
        )
    {
        $this->catalogSession = $catalogSession;
        $this->registry = $registry;

    }

    protected function getProduct()
    {
        if (!$this->catalogProduct) {
            //tried to use \Magento\Catalog\Model\Session to get current product but didn't work
            $this->catalogProduct = $this->registry->registry('current_product');

            if (!$this->catalogProduct) {
                return null;
            }
        }

        return $this->catalogProduct;
    }

    protected function checkConditions()
    {
//        todo , current product, website
//       todo add configuration check per website and product
//        todo return true or false
        /* todo check if current product has option turned on,
        if website has option turned on,

        */
        $product = $this->getProduct();

    }

    public function getCountdowntimer()
    {
        //todo gets current time
//        todo return time configuration per website (timestamp of the latest dispatch per current product)
/*todo get the diff between today's latest pick up time and current time
        (if negative, get next (option) day diff)
            if not filled in any, return false
        */


//        return 'Hello World';
        if ($this->checkConditions() == true) {
            return '2020-02-21 20:00:00';
        }
        return false;
    }

}
