<be-html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no,viewport-fit=cover">
    <title><?php echo $this->title; ?></title>
    <meta name="keywords" content="<?php echo $this->metaKeywords ?? ''; ?>">
    <meta name="description" content="<?php echo $this->metaDescription ?? ''; ?>">
    <meta name="applicable-device" content="pc,mobile">
    <base href="<?php echo beUrl(); ?>/">
    <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>

    <script src="https://libs.baidu.com/jquery/2.0.3/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.phpbe.com/scss/be.css"/>

    <?php
    $wwwUrl = \Be\Be::getProperty('Theme.ShopFai')->getWwwUrl();
    ?>
    <link rel="stylesheet" href="<?php echo $wwwUrl; ?>/css/drawer.css" />
    <script src="<?php echo $wwwUrl; ?>/js/drawer-menu.js"></script>
    <script src="<?php echo $wwwUrl; ?>/js/drawer-search.js"></script>
    <script src="<?php echo $wwwUrl; ?>/js/drawer-user.js"></script>
    <script src="<?php echo $wwwUrl; ?>/js/drawer-cart.js"></script>

    <link rel="stylesheet" href="<?php echo $wwwUrl; ?>/css/theme.css" />
    <script src="<?php echo $wwwUrl; ?>/js/theme.js"></script>

    <?php
    $configTheme = \Be\Be::getConfig('Theme.ShopFai.Theme');

    $libCss = \Be\Be::getLib('Css');
    $mainColor = $configTheme->mainColor;
    $mainColor1 = $libCss->lighter($mainColor, 10);
    $mainColor2 = $libCss->lighter($mainColor, 20);
    $mainColor3 = $libCss->lighter($mainColor, 30);
    $mainColor4 = $libCss->lighter($mainColor, 40);
    $mainColor5 = $libCss->lighter($mainColor, 50);
    $mainColor6 = $libCss->lighter($mainColor, 60);
    $mainColor7 = $libCss->lighter($mainColor, 70);
    $mainColor8 = $libCss->lighter($mainColor, 80);
    $mainColor9 = $libCss->lighter($mainColor, 90);
    $mainColorHover = $libCss->darker($mainColor, 10);
    ?>
    <style type="text/css">
        html {
            font-size: <?php echo $configTheme->fontSize; ?>px;
            background-color: <?php echo $configTheme->backgroundColor; ?>;
            color: <?php echo $configTheme->fontColor; ?>;
        }

        body {
            --main-color: <?php echo $mainColor; ?>;
            --main-color-1: <?php echo $mainColor1; ?>;
            --main-color-2: <?php echo $mainColor2; ?>;
            --main-color-3: <?php echo $mainColor3; ?>;
            --main-color-4: <?php echo $mainColor4; ?>;
            --main-color-5: <?php echo $mainColor5; ?>;
            --main-color-6: <?php echo $mainColor6; ?>;
            --main-color-7: <?php echo $mainColor7; ?>;
            --main-color-8: <?php echo $mainColor8; ?>;
            --main-color-9: <?php echo $mainColor9; ?>;
            --main-color-hover: <?php echo $mainColorHover; ?>;
        }

        a {
            color: <?php echo $configTheme->linkColor; ?>;
        }

        a:hover {
            color: <?php echo $configTheme->linkHoverColor; ?>;
        }

        .link-hover:before {
            background-color: <?php echo $configTheme->linkHoverColor; ?>;
        }
    </style>

    <be-head>
    </be-head>
</head>
<body>
    <?php
    if ($configTheme->isMovedByDrawer) {
        echo '<div class="is-moved-by-drawer">';
    }
    ?>
    <be-body></be-body>
    <?php
    if ($configTheme->isMovedByDrawer) {
        echo '</div>';
    }
    ?>

    <div id="ajax-loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

    <div id="overlay"></div>

    <div id="drawer-menu" class="drawer">
        <div class="drawer-fixed-header">
            <div class="drawer-header">
                <div class="drawer-title">Navigation</div>
                <button type="button" class="drawer-close" onclick="DrawerMenu.hide();"></button>
            </div>
        </div>
        <ul class="drawer-menu-lv1">
            <?php
            $menu = \Be\Be::getMenu('North');
            $menuTree = $menu->getTree();
            foreach ($menuTree as $item) {
                $hasSubItem = false;
                if (isset($item->subItems) && is_array($item->subItems) && count($item->subItems) > 0) {
                    $hasSubItem = true;
                }

                if ($hasSubItem) {
                    echo '<li class="drawer-menu-lv1-item-with-dropdown">';
                } else {
                    echo '<li class="drawer-menu-lv1-item">';
                }

                $url = 'javascript:void(0);';
                if ($item->route) {
                    $url = beUrl($item->route, $item->params);
                } else {
                    if ($item->url) {
                        $url = $item->url;
                    }
                }
                echo '<a href="'.$url.'"';
                if ($item->target === '_blank') {
                    echo ' target="_blank"';
                }
                echo '>' . $item->label . '</a>';

                if ($hasSubItem) {
                    echo '<div class="drawer-menu-lv1-dropdown">';
                    echo '<div class="drawer-menu-lv1-dropdown-title">';
                    echo $item->label;
                    echo '</div>';
                    echo '<ul class="drawer-menu-lv2">';
                    foreach ($item->subItems as $subItem) {
                        $url = 'javascript:void(0);';
                        if ($subItem->route) {
                            $url = beUrl($subItem->route, $subItem->params);
                        } else {
                            if ($subItem->url) {
                                $url = $subItem->url;
                            }
                        }
                        echo '<li class="drawer-menu-lv2-item"><a href="'.$url.'"';
                        if ($subItem->target === '_blank') {
                            echo ' target="_blank"';
                        }
                        echo '>' . $subItem->label . '</a></li>';
                    }
                    echo '</ul>';
                    echo '</div>';
                }

                echo '</li>';
            }
            ?>
        </ul>
    </div>

    <div id="drawer-search" class="drawer">
        <div class="drawer-fixed-header">
            <div class="drawer-header">
                <div class="drawer-title">Search</div>
                <button type="button" class="drawer-close" onclick="DrawerSearch.hide();"></button>
            </div>
        </div>
        <div class="drawer-body">
            <form class="drawer-search-form" method="get" action="<?php echo beUrl('ShopFai.Product.search'); ?>">
                <input type="hidden" name="route" value="ShopFai.Product.search">
                <input class="drawer-search-form-input" type="text" placeholder="Search the store" autocomplete="off" name="q" value="<?php echo \Be\Be::getRequest()->get('q', ''); ?>">
                <button class="drawer-search-form-submit" type="submit">
                    <svg viewBox="0 0 512 512">
                        <path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5 S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9 C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z"></path>
                    </svg>
                </button>
            </form>

            <?php
            $hotKeywords = \Be\Be::getService('App.ShopFai.Product')->getTopSearchKeywords(12);
            if (count($hotKeywords) > 0) {
                echo '<div class="be-mt-200">';
                echo '<div class="be-fs-125 be-fw-bold be-lh-125 be-mb-100">Top Searches</div>';
                foreach ($hotKeywords as $hotKeyword) {
                    if (!$hotKeyword) continue;
                    echo '<a class="drawer-search-keyword" href="'.beUrl('ShopFai.Product.search', ['q' => $hotKeyword]).'">';
                    echo $hotKeyword;
                    echo '</a>';
                }
                echo '</div>';
            }
            ?>

        </div>
    </div>

    <?php
    $my = \Be\Be::getUser();
    ?>
    <div id="drawer-user" class="drawer">
        <div class="drawer-fixed-header">
            <div class="drawer-header">
                <div class="drawer-title"><?php echo $my->isGuest() ? 'Login' : 'Dashboard'; ?></div>
                <button type="button" class="drawer-close" onclick="DrawerUser.hide();"></button>
            </div>
        </div>

        <div class="drawer-body">
            <?php
            if ($my->isGuest()) {
                ?>
                <div class="be-p-50 be-fs-80 be-mb-100">
                    If you are already registered, please log in.
                </div>

                <form id="drawer-user-form" class="be-mb-100">
                    <div class="be-floating round-be-floating be-mx-10 be-mb-100">
                        <input type="text" name="email" id="drawer-user-email" class="be-input" placeholder="Email Address" />
                        <label class="be-floating-label" for="drawer-user-email">Email Address</label>
                    </div>

                    <div class="be-floating round-be-floating be-mx-10 be-mb-100">
                        <input type="password" name="password" id="drawer-user-password" class="be-input" placeholder="Password" />
                        <label class="be-floating-label" for="drawer-user-password">Password</label>
                    </div>

                    <input type="submit" class="be-btn be-btn-main be-btn-lg be-btn-round be-w-100" value="Login">
                </form>

                <div class="be-mb-100 be-ta-center">
                    <a href="<?php echo beUrl('ShopFai.User.forgotPassword'); ?>" class="link-hover">Forgot your password?</a>
                </div>

                <div class="be-p-50 be-fs-80 be-mb-100">
                    Create your account and enjoy a new shopping experience.
                </div>

                <div>
                    <a href="<?php echo beUrl('ShopFai.User.register'); ?>" class="be-btn be-btn-outline be-btn-lg be-btn-round be-w-100">Create An Account</a>
                </div>
                <?php
            } else {
                ?>
                <div class="be-d-flex">
                    <div class="be-flex-0">
                        <img src="<?php
                        if ($my->avatar) {
                            echo \Be\Be::getProperty('App.ShopFai')->getWwwUrl() . '/user/avatar/' . $my->avatar;
                        } else {
                            echo beUrl() . '/app/ShopFai/Template/User/images/avatar.png';
                        }
                        ?>" alt="<?php echo $my->first_name . ' ' . $my->last_name; ?>" style="width: 75px; max-height: 75px;">
                    </div>

                    <div class="be-flex-1 be-pl-100">
                        <div class="be-mt-50 be-fs-125 be-fw-bold">
                            <?php echo $my->first_name . ' ' . $my->last_name; ?>
                        </div>
                        <div class="be-mt-50">
                            <?php echo $my->email; ?>
                        </div>
                    </div>
                </div>

                <div class="be-mt-100">
                    <ul class="drawer-user-nav">
                        <?php
                        $links = [
                            'ShopFai.Order.orders' => 'My Orders',
                            'ShopFai.UserFavorite.favorites' => 'Wish List',
                            'ShopFai.UserAddress.addresses' => 'Address Book',
                            'ShopFai.UserCenter.setting' => 'Setting',
                        ];
                        foreach ($links as $key => $val) {
                            echo '<li><a class="link-hover" href="' . beUrl($key) . '">'. $val . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>

                <div class="be-mt-200">
                    <a href="<?php echo beUrl('ShopFai.User.logout'); ?>" class="be-btn be-btn-lg be-btn-round be-w-100">Log Out</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <?php if (!isset($this->hideHeaderCart) || !$this->hideHeaderCart) { ?>
    <div id="drawer-cart" class="drawer">
        <form action="<?php echo beUrl('ShopFai.Cart.checkout'); ?>" method="post">
        <div class="drawer-fixed-header">
            <div class="drawer-header">
                <div class="drawer-title">Your Cart</div>
                <button type="button" class="drawer-close" onclick="DrawerCart.hide();"></button>
            </div>
        </div>

        <div class="drawer-body">
            <div id="drawer-cart-products">
                <div class="drawer-cart-empty">Your shopping cart is empty.</div>
            </div>
        </div>

        <div class="drawer-fixed-footer">
            <div class="be-row">
                <div class="be-col">Discount</div>
                <div class="be-col-auto" id="drawer-cart-discount">$0.00</div>
            </div>
            <div class="be-row">
                <div class="be-col">Total</div>
                <div class="be-col-auto" id="drawer-cart-total">$0.00</div>
            </div>
            <div class="be-ta-center be-mt-100">
                <input type="submit" class="be-mb-100 be-btn be-btn-main be-btn-lg be-btn-round" value="Check Out" onclick="DrawerCart.checkout(this);" >
                <a href="<?php echo beUrl('ShopFai.Cart.index'); ?>" class="be-mb-100 be-btn be-btn-outline be-btn-lg be-btn-round">View Cart</a>
            </div>
        </div>
        </form>
    </div>
    <?php } ?>

</body>
</html>
</be-html>