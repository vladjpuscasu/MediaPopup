<?php
namespace VPuscasu\MediaPopup\Block\Product;

use Magento\Catalog\Block\Product\Context;
use Magento\Catalog\Block\Product\AbstractProduct;
use Magento\Catalog\Helper\Data as CatalogHelper;
use Magento\Framework\Registry;
//use Magento\Framework\Stdlib\ArrayUtils;

class MediaPopupAttribute extends AbstractProduct
{
    protected $registry;
    protected $catalogHelper;
    //protected $arrayUtils;

    public function __construct(
        Context $context,
        Registry $registry,
        CatalogHelper $catalogHelper,
        array $data = []
    ) {
        $this->registry = $registry;
        $this->catalogHelper = $catalogHelper;
        parent::__construct($context, $data);
    }

    public function getCurrentProduct()
    {
        return $this->registry->registry('current_product');
    }

    public function getMediaPopupLinkAttributes()
{
    $product = $this->getCurrentProduct();
    

    if ($product instanceof \Magento\Catalog\Model\Product) {
        $attributes = [];
        $productData = $product->getData();
    
        foreach ($productData as $key => $value) {
            if (strpos($key, 'MediaPopup_link_') === 0) {
                
                $attributes[$key] = $value;
            }
        }
    }
     
    return $attributes; 
}

}
