
var Cart = {
    add: function (productId, productItemId, n, fnSuccessCallback) {
        let quantity = n ? n : 1;
        quantity = parseInt(quantity);
        if (quantity <= 0) quantity = 1;
        $.ajax({
            url: ShopFaiUrl.cartAdd,
            data: {
                "product_id": productId,
                "product_item_id": productItemId,
                "quantity": quantity
            },
            type: "POST",
            success: function (json) {
                if (json.success) {
                    DrawerCart.load();
                    DrawerCart.show();
                    if (fnSuccessCallback) {
                        fnSuccessCallback();
                    }
                }
            },
            error: function () {
                alert("Shopping cart loading failed!");
            }
        });
    },

    remove: function (productId, productItemId, fnSuccessCallback) {
        $.ajax({
            url: ShopFaiUrl.cartRemove,
            data: {
                "product_id": productId,
                "product_item_id": productItemId,
            },
            type: "POST",
            success: function (json) {
                if (json.success) {
                    DrawerCart.load();
                    if (fnSuccess) {
                        fnSuccessCallback();
                    }
                } else {
                    alert(json.message);
                }
            },
            error: function () {
                alert("Shopping cart remove item failed!");
            }
        });
    },

    changeQuantity: function (productId, productItemId, n, fnSuccessCallback) {
        let quantity = n ? n : 1;
        quantity = parseInt(quantity);
        if (quantity <= 0) quantity = 1;
        $.ajax({
            url: ShopFaiUrl.cartChange,
            data: {
                "product_id": productId,
                "product_item_id": productItemId,
                "quantity": quantity
            },
            type: "POST",
            success: function (json) {
                if (json.success) {
                    DrawerCart.load();
                    if (fnSuccessCallback) {
                        fnSuccessCallback();
                    }
                } else {
                    alert(json.message);
                }
            },
            error: function () {
                alert("Shopping cart change item quantity failed!!");
            }
        });
    }
};




