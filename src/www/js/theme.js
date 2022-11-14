$(document).ready(function () {
    $.ajaxSetup({cache: false});

    $(document).ajaxStart(function(){
        $('#ajax-loader').fadeIn();
    }).ajaxStop(function(){
        $('#ajax-loader').fadeOut();
    });

    $('#overlay').click(function(){
        var classNames = $('html').attr('class').split(" ");
        if (classNames.length > 0) {
            var className;
            for (var x in classNames) {
                className = classNames[x];
                if (className.substr(0, 8) == "js-open-") {
                    $("html").removeClass(className);
                }
            }
        }
    });

    DrawerCart.load();
});


function addToCart(goodsId, n) {
    var quantity = n ? n : 1;
    quantity = parseInt(quantity);
    if (quantity <= 0) quantity = 1;
    $.ajax({
        url: ShopUrl.cartAdd,
        data: {
            "goodsId": goodsId,
            "quantity": quantity
        },
        type: "POST",
        success: function (json) {
            if (json.success) {
                DrawerCart.load();
                DrawerCart.show();
            }
        },
        error: function () {
            alert("Shopping cart add item failed!");
        }
    });
}



function reload() {
    window.location.reload();
}

function topPopLogin() {
    $.ajax({
        url: ShopUrl.userLoginCheck,
        data: $("#top-pop-login-form").serialize(),
        type: "POST",
        success: function (json) {
            if (json.success) {
                window.parent.reload();
            } else {
                alert(json.message);
            }
        },
        error: function () {
            alert("User login failed!");
        }
    });
}


function toggleTopSearch() {
    $("#search-modal").toggle();
    return false;
}

function showTopSearch() {
    $("#search-modal").show();
    return false;
}

function hideTopSearch() {
    $("#search-modal").hide();
    return false;
}