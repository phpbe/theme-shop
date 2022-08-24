<?php
namespace Be\Theme\ShopFai\Config;

class Page
{

    public int $north = 1;

    public int $middle = 0;

    public int $west = 25;

    public int $center = 50;

    public int $east = 25;

    public int $south = 1;

    public array $northSections = [
        [
            'name' => 'Theme.ShopFai.Header',
        ],
    ];

    public array $middleSections = [
        [
            'name' => 'be-page-title',
        ],
        [
            'name' => 'be-page-content',
        ],
    ];

    public array $westSections = [

    ];

    public array $centerSections = [
        [
            'name' => 'be-page-title',
        ],
        [
            'name' => 'be-page-content',
        ],
    ];

    public array $eastSections = [

    ];

    public array $southSections = [
        [
            'name' => 'Theme.ShopFai.Footer',
        ],
    ];

    // 五方位间的间距
    public string $spacingMobile = '1.5rem';
    public string $spacingTablet = '1.75rem';
    public string $spacingDesktop = '2rem';

}
