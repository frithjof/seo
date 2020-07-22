<?php

namespace Gfe\Seo\Block;

use Magento\Catalog\Model\Layer\Resolver;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class Category extends Template
{
    private $layerResolver;
    private $image;
    private $product_image_amount = 10;

    public function __construct(
        Context $context,
        Resolver $layerResolver,
        \Magento\Catalog\Helper\Image $image,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->layerResolver = $layerResolver;
        $this->image = $image;
    }

    /**
     * gets fb opengraph data for cat page
     * @return array
     */
    public function getOgdata()
    {
        $ogdata = [];
        $cat = $this->getCurrentCategory();


        if($cat->getData('meta_title')){
            $ogdata[] = ['property' => 'og:title' , 'content' =>$cat->getData('meta_title')];
        }
        else{
            $ogdata[] = ['property' => 'og:title' , 'content' =>$cat->getName()];
        }
        if($cat->getData('meta_description')){
            $ogdata[] = ['property' => 'og:description' , 'content' =>$cat->getData('meta_description')];
        }
        else{
            $ogdata[] = ['property' => 'og:description' , 'content' =>$cat->getData('description')];
        }


        if($cat->getImageUrl())  $ogdata[] = ['property' => 'og:image' , 'content' => $cat->getImageUrl()];;



        $products = $this->getProductCollection();
        /** @var  \Magento\Catalog\Model\Product $product */
        foreach ($products as $product){
            $image = $this->image->init($product, 'image', ['type'=>'image'])->keepAspectRatio(true)->resize('554')->getUrl();
            $ogdata[] = ['property' => 'og:image' , 'content' => $image];
        }

        return $ogdata;
    }

    public function getProductCollection()
    {
        return $this->getCurrentCategory()->getProductCollection()->setPageSize($this->product_image_amount)->setCurPage(1)->addAttributeToSelect('image');
    }

    public function getCurrentCategory()
    {
        $cat = $this->layerResolver->get()->getCurrentCategory();
        return $cat;
    }
}
