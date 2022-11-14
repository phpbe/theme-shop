
var DrawerCart = {

    load: function () {
        if ($("#drawer-cart-products").length === 0) {
            return;
        }

        $.ajax({
            url: ShopUrl.cartGetProducts,
            method: "GET",
            success: function (json) {
                //console.log(json);
                if (json.success) {
                    let len = json.products.length;
                    if (len === 0) {
                        $("#drawer-cart-discount").html(Store.currencySymbol + "0.00");
                        $("#drawer-cart-total").html(Store.currencySymbol + "0.00");
                        $("#drawer-cart-products").html('<div class="be-c-999">Your shopping cart is empty.</div>');
                        $("#drawer-cart .be-btn-checkout").prop("disabled", true);
                    } else {
                        let product;
                        let html = '';

                        for (let i = 0; i < len; i++) {
                            product = json.products[i];

                            if (i === 6) {
                                html += '<div class="be-ta-center be-p-150">......</div>';
                            }

                            if (i >= 6) {
                                continue;
                            }

                            html += '<div class="drawer-cart-product" data-productid="' + product.product_id + '" data-productitemid="' + product.product_item_id + '">';

                            html += '<input type="hidden" name="product_id[]" value="' + product.product_id + '" />';
                            html += '<input type="hidden" name="product_item_id[]" value="' + product.product_item_id + '" />';

                            html += '<div class="be-row be-mb-100">';

                            html += '<div class="be-col-auto" style="max-height: 100px; overflow: hidden;">';
                            html += '<a href="' + product.url + '"><img src="' + product.image + '" alt="' + product.name + '" style="max-width: 100px"></a>';
                            html += '</div>';

                            html += '<div class="be-col">';
                            html += '<div class="be-pl-50">';
                            html += '<div class="be-pb-50" style="min-width: 0;"><a href="' + product.url + '" class="be-d-block be-t-ellipsis-2">' + product.name + '</a></div>';
                            if (product.style === 2) {
                                html += '<div class="be-pb-50 be-c-999">' + product.item_style + '</div>';
                            }
                            html += '<div class="be-row">';
                            html += '<div class="be-col-auto">';
                            html += '<div class="be-pb-50 be-lh-250">' + Store.currencySymbol + product.price + '</div>';
                            html += '</div>';
                            html += '<div class="be-col"></div>';
                            html += '<div class="be-col-auto">';
                            html += '   <div class="be-pb-50">';
                            html += '       <div class="drawer-cart-product-qty">';
                            html += '           <button type="button" class="drawer-cart-product-qty-minus" onclick="DrawerCart.changeQuantity(this, -1);">-</button>';
                            html += '           <input type="text" name="quantity[]" class="drawer-cart-product-qty-input" value="' + product.quantity + '" onkeyup="DrawerCart.changeQuantity(this, 0);" />';
                            html += '           <button type="button" class="drawer-cart-product-qty-plus" onclick="DrawerCart.changeQuantity(this, 1);">+</button>';
                            html += '       </div>';
                            html += '   </div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';
                            html += '</div>';

                            html += '<div class="be-col-auto">';
                            html += '<div class="be-pl-50">';
                            html += '<button class="drawer-cart-product-remove-btn" type="button" onclick="DrawerCart.remove(this);"></button>';
                            html += '</div>';
                            html += '</div>';

                            html += '</div>';

                            html += '</div>';
                        }

                        $(".header-toolbar-cart-counter").html(json.productTotalQuantity);
                        $("#drawer-cart-discount").html(Store.currencySymbol + json.discountAmount);
                        $("#drawer-cart-total").html(Store.currencySymbol + json.totalAmount);
                        $("#drawer-cart-products").html(html);
                        $("#drawer-cart .be-btn-checkout").prop("disabled", false);
                    }
                }
            },
            error: function () {
                $("#drawer-cart-discount").html(Store.currencySymbol + "0.00");
                $("#drawer-cart-total").html(Store.currencySymbol + "0.00");
                $("#drawer-cart-products").html('<div class="be-c-999">Shopping cart loading failed!</div>');
                $("#drawer-cart .be-btn-checkout").prop("disabled", true);
            }
        });
    },

    remove: function (e) {
        let $e = $(e);

        let $product = $e.closest(".drawer-cart-product");
        let productId = $product.data("productid");
        let productItemId = $product.data("productitemid");

        $.ajax({
            url: ShopUrl.cartRemove,
            data: {
                "product_id": productId,
                "product_item_id": productItemId
            },
            type: "POST",
            success: function (json) {
                if (json.success) {
                    DrawerCart.load();
                } else {
                    alert(json.message);
                }
            },
            error: function () {
                alert("Shopping cart remove item failed!");
            }
        });
    },

    changeQuantity: function (e, n) {
        let $e = $(e);
        if ($e.hasClass("disabled")) {
            return;
        }

        let $product = $e.closest(".drawer-cart-product");
        let productId = $product.data("productid");
        let productItemId = $product.data("productitemid");

        var $quantity = $(".drawer-cart-product-qty-input", $product);
        var quantity = $quantity.val();
        if (isNaN(quantity)) {
            quantity = 1;
        } else {
            quantity = Number(quantity);
        }
        quantity += n;
        quantity = parseInt(quantity);

        if (quantity < 1) {
            quantity = 1;
        }

        $quantity.val(quantity);

        $.ajax({
            url: ShopUrl.cartChange,
            data: {
                "product_id": productId,
                "product_item_id": productItemId,
                "quantity": quantity
            },
            type: "POST",
            success: function (json) {
                if (json.success) {
                    DrawerCart.load();
                } else {
                    alert(json.message);
                }
            },
            error: function () {
                alert("Shopping cart change item quantity failed!!");
            }
        });
    },

    toggle: function () {
        let $e = $("html");
        if ($e.hasClass("js-open-drawer-cart")) {
            $e.removeClass("js-open-drawer").removeClass("js-open-drawer-cart");
        } else {
            $e.addClass("js-open-drawer").addClass("js-open-drawer-cart");
        }
        return false;
    },

    show: function () {
        $("html").addClass("js-open-drawer").addClass("js-open-drawer-cart");
        return false;
    },

    hide: function () {
        $("html").removeClass("js-open-drawer").removeClass("js-open-drawer-cart");
        return false;
    },

    checkout: function (e) {
        $(e).closest("form").submit();
    }

};

