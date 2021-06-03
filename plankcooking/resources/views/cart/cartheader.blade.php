<section class="cart__header">
    <div class="cart__header__description">
        SHOPPING CART: Your shopping cart contains {{ count($orderItems) }} items.
    </div>
    <div class="cart__header__buttons d-flex justify-content-end">
        <a id="cart__toggle__continueShopping__md__up"href="/shop">
            <img src="/img/ContinueShopping_button.png" alt="Continue Shopping" />
        </a>
        <a class="ml-2" href="/cart/checkout">
            <img class="cart__sm__links" src="/img/Checkout_button.png" alt="Checkout" />
        </a> 
        <a id="cart__toggle__continueShopping__sm"href="/shop">
            <img class="ml-2 mt-2" src="/img/ContinueShopping_button.png" alt="Continue Shopping" />
        </a>
    </div>
</section>