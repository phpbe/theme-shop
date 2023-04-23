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

</body>
</html>
</be-html>