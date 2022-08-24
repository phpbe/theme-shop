
var DrawerSearch = {

    load: function () {

    },

    toggle: function () {
        if ($("html").hasClass("js-open-drawer-search")) {
            $("html").removeClass("js-open-drawer").removeClass("js-open-drawer-search");
        } else {
            $("html").addClass("js-open-drawer").addClass("js-open-drawer-search");
        }
        return false;
    },

    show: function () {
        $("html").addClass("js-open-drawer").addClass("js-open-drawer-search");
        return false;
    },

    hide: function () {
        $("html").removeClass("js-open-drawer").removeClass("js-open-drawer-search");
        return false;
    },
};

