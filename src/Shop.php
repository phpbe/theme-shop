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

    <?php
    $configTheme = \Be\Be::getConfig('Theme.Shop.Theme');

    $beUrl = beUrl();
    $wwwUrl = \Be\Be::getProperty('Theme.Shop')->getWwwUrl();
    ?>
    <base href="<?php echo $beUrl; ?>/" >
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <script src="<?php echo $wwwUrl; ?>/lib/jquery/jquery-1.12.4.min.js"></script>
    <script src="<?php echo $wwwUrl; ?>/lib/jquery/jquery.validate-1.19.2.min.js"></script>

    <link rel="stylesheet" href="https://cdn.phpbe.com/ui/be.css" />
    <link rel="stylesheet" href="https://cdn.phpbe.com/ui/be-icons.css"/>

    <style type="text/css">
        html {
            font-size: <?php echo $configTheme->fontSize; ?>px;
            background-color: <?php echo $configTheme->backgroundColor; ?>;
            color: <?php echo $configTheme->fontColor; ?>;
        }

        body {
        <?php
        echo '--major-color: ' . $configTheme->majorColor . ';';

        // CSS 处理库
        $libCss = \Be\Be::getLib('Css');
        for ($i=1; $i<=9; $i++) {
            echo '--major-color-' . $i. ': ' . $libCss->lighter($configTheme->majorColor, $i * 10) . ';';
            echo '--major-color' . $i. ': ' . $libCss->darker($configTheme->majorColor, $i * 10) . ';';
        }

        echo '--minor-color: ' . $configTheme->minorColor . ';';
        echo '--font-color: ' . $configTheme->fontColor . ';';
        ?>
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

    <script>
        const Url = "<?php echo beUrl(); ?>";
        const ShopUrl = {
            cartGetProducts: "<?php echo beUrl('Shop.Cart.getProducts'); ?>",
            cartAdd: "<?php echo beUrl('Shop.Cart.Add'); ?>",
            cartRemove: "<?php echo beUrl('Shop.Cart.remove'); ?>",
            cartChange: "<?php echo beUrl('Shop.Cart.change'); ?>",
            userLoginCheck: "<?php echo beUrl('Shop.User.loginCheck'); ?>",
            userCenterDashboard: "<?php echo beUrl('Shop.UserCenter.dashboard'); ?>",
        };
        <?php
        $configStore = \Be\Be::getConfig('App.Shop.Store');
        ?>
        const Store = {
            name: "<?php echo $configStore->name; ?>",
            currency: "<?php echo $configStore->currency; ?>",
            currencySymbol: "<?php echo $configStore->currencySymbol; ?>"
        };
    </script>

    <link rel="stylesheet" href="<?php echo $wwwUrl; ?>/css/drawer.css" />
    <script src="<?php echo $wwwUrl; ?>/js/drawer-menu.js"></script>
    <script src="<?php echo $wwwUrl; ?>/js/drawer-search.js"></script>
    <script src="<?php echo $wwwUrl; ?>/js/drawer-user.js"></script>
    <script src="<?php echo $wwwUrl; ?>/js/drawer-cart.js"></script>

    <link rel="stylesheet" href="<?php echo $wwwUrl; ?>/css/theme.css" />
    <script src="<?php echo $wwwUrl; ?>/js/theme.js"></script>

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
            <form class="drawer-search-form" method="get" action="<?php echo beUrl('Shop.Product.search'); ?>">
                <input type="hidden" name="route" value="Shop.Product.search">
                <input class="drawer-search-form-input" type="text" placeholder="Search the store" autocomplete="off" name="q" value="<?php echo \Be\Be::getRequest()->get('q', ''); ?>">
                <button class="drawer-search-form-submit" type="submit">
                    <svg viewBox="0 0 512 512">
                        <path d="M495,466.2L377.2,348.4c29.2-35.6,46.8-81.2,46.8-130.9C424,103.5,331.5,11,217.5,11C103.4,11,11,103.5,11,217.5 S103.4,424,217.5,424c49.7,0,95.2-17.5,130.8-46.7L466.1,495c8,8,20.9,8,28.9,0C503,487.1,503,474.1,495,466.2z M217.5,382.9 C126.2,382.9,52,308.7,52,217.5S126.2,52,217.5,52C308.7,52,383,126.3,383,217.5S308.7,382.9,217.5,382.9z"></path>
                    </svg>
                </button>
            </form>

            <?php
            $hotKeywords = \Be\Be::getService('App.Shop.Product')->getTopSearchKeywords(12);
            if (count($hotKeywords) > 0) {
                echo '<div class="be-mt-200">';
                echo '<div class="be-fs-125 be-fw-bold be-lh-125 be-mb-100">Top Searches</div>';
                foreach ($hotKeywords as $hotKeyword) {
                    if (!$hotKeyword) continue;
                    echo '<a class="drawer-search-keyword" href="'.beUrl('Shop.Product.search', ['q' => $hotKeyword]).'">';
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

                    <input type="submit" class="be-btn be-btn-major be-btn-lg be-btn-round be-w-100" value="Login">
                </form>

                <div class="be-mb-100 be-ta-center">
                    <a href="<?php echo beUrl('Shop.User.forgotPassword'); ?>" class="link-hover">Forgot your password?</a>
                </div>

                <div class="be-p-50 be-fs-80 be-mb-100">
                    Create your account and enjoy a new shopping experience.
                </div>

                <div>
                    <a href="<?php echo beUrl('Shop.User.register'); ?>" class="be-btn be-btn-outline be-btn-lg be-btn-round be-w-100">Create An Account</a>
                </div>
                <?php
            } else {
                ?>
                <div class="be-d-flex">
                    <div class="be-flex-0">
                        <img src="<?php echo $my->avatar; ?>" alt="<?php echo $my->first_name . ' ' . $my->last_name; ?>" style="width: 75px; max-height: 75px;">
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
                            'Shop.Order.orders' => 'My Orders',
                            'Shop.UserFavorite.favorites' => 'Wish List',
                            'Shop.UserAddress.addresses' => 'Address Book',
                            'Shop.UserCenter.setting' => 'Setting',
                        ];
                        foreach ($links as $key => $val) {
                            echo '<li><a class="link-hover" href="' . beUrl($key) . '">'. $val . '</a></li>';
                        }
                        ?>
                    </ul>
                </div>

                <div class="be-mt-200">
                    <a href="<?php echo beUrl('Shop.User.logout'); ?>" class="be-btn be-btn-lg be-btn-round be-w-100">Log Out</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <?php if (!isset($this->hideHeaderCart) || !$this->hideHeaderCart) { ?>
    <div id="drawer-cart" class="drawer">
        <form action="<?php echo beUrl('Shop.Cart.checkout'); ?>" method="post">
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
                <input type="submit" class="be-mb-100 be-btn be-btn-major be-btn-lg be-btn-round" value="Check Out" onclick="DrawerCart.checkout(this);" >
                <a href="<?php echo beUrl('Shop.Cart.index'); ?>" class="be-mb-100 be-btn be-btn-outline be-btn-lg be-btn-round">View Cart</a>
            </div>
        </div>
        </form>
    </div>
    <?php } ?>

</body>
</html>
</be-html>