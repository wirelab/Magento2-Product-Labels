<?php


namespace Wirelab\ProductLabels\Helper;


use Magento\Catalog\Model\Product as ModelProduct;
use DateTime;

class Labels extends \Magento\Framework\Url\Helper\Data
{

    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Checks if the products is younger than 30 days (new)
     * @param ModelProduct $product
     * @return bool
     */
    public function isProductNew(ModelProduct $product)
    {

        $now = new DateTime();
        $creation = new DateTime($product->getCreatedAt());

        $interval = $now->diff($creation);

        // Bail out if there is a Sale going on (more prominent label)
        if($this->isProductOnSale($product)) {
            return false;
        }

        // If the product is older than 30 days, it's not new anymore
        if($interval->days > 30) {
            return (boolean) false;
        }

        return (boolean) true;


    }

    /**
     * Checks if the product is new
     * @param ModelProduct $product
     * @return bool
     */
    public function isProductOnSale(ModelProduct $product)
    {
        return (boolean) $product->getSpecialPrice();
    }
}