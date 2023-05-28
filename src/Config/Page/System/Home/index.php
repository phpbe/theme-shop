<?php

namespace Be\Theme\Shop\Config\Page\System\Home;

/**
 * @BeConfig("首页")
 */
class index
{

    public int $north = -1;

    public int $middle = 1;
    public array $middleSections = [
        [
            'name' => 'App.Shop.Product.LatestTopN',
        ],
        [
            'name' => 'App.Shop.Product.HottestTopN',
        ],
        [
            'name' => 'App.Shop.Product.TopSalesTopN',
        ],
        [
            'name' => 'App.Shop.Product.HotSearchTopN',
        ],
    ];

    public int $south = -1;

    /**
     * @BeConfigItem("HEAD头标题",
     *     description="HEAD头标题，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $title = 'Home';

    /**
     * @BeConfigItem("Meta描述",
     *     description="填写页面内容的简单描述，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaDescription = '';

    /**
     * @BeConfigItem("Meta关键词",
     *     description="填写页面内容的关键词，用于SEO",
     *     driver = "FormItemInput"
     * )
     */
    public string $metaKeywords = '';

    /**
     * @BeConfigItem("页面标题",
     *     description="展示在页面内容中的标题，一般与HEAD头标题一致，两者相同时可不填写此项",
     *     driver = "FormItemInput"
     * )
     */
    public string $pageTitle = '';


}
