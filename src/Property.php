<?php

namespace Be\Theme\ShopFai;

class Property extends \Be\Theme\Property
{

    public string $label = '店熵默认主题';

    /**
     * 预览图片
     *
     * @var string
     */
    public string $previewImage = 'images/preview.jpg';


    public function __construct() {
        parent::__construct(__FILE__);
    }

}

