@foreach ($orderItems as $orderItem)
    <div class="cart__items col-12 m-0 p-0">
        <div class="cart__items__name">
            {{ $products[$orderItem['productId'] - 1]['name'] }}
        </div>
        <div class="cart__items__description">
        ${{ $products[$orderItem['productId'] - 1]['price'] }}
        </div>
        <div class="cart__items__description">
            <form class="cart__input__wrapper" method="POST" action="cart" id="updateQtyButton">
                <input
                    type="text"
                    id="qty_input"
                    name="qty_input"
                    class="qty_input text-center"
                    placeholder="0"
                    onChange=""
                    value="{{ $orderItem['qty'] }}"
                />
                @if($errorsFound)
                    <section class="cart__qty_input_error">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                    </section>
                @endif
                <button class="cart__items__button" type="submit" id="updateQtyButton"> 
                    <img class="" src="/img/Update_Button.png" alt="Remove Items" />
                </button>
                <input type="hidden" id="orderItemIdUpdate" name="orderItemIdUpdate" value="{{ $orderItem['orderItemId'] }}" />
                {{ csrf_field() }}
            </form>
        </div>
        <div class="cart__items__description">
            <form class="cart__input__wrapper" method="POST" action="cart" id="removeFromCartButton">
                ${{ number_format($products[$orderItem['productId'] - 1]['price'] * $orderItem['qty'], 2) }}
                @php
                    $subtotal += $products[$orderItem['productId'] - 1]['price'] * $orderItem['qty']
                @endphp
                <input type="hidden" id="orderItemIdRemove" name="orderItemIdRemove" value="{{ $orderItem['orderItemId'] }}" />
                <button class="cart__items__button cart__remove__button" type="submit" id="removeFromCartButton"> 
                    <img class="cart__item__remove__button" src="/img/Remove_Button.png" alt="Remove Items" />
                </button>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endforeach
    <div class="cart__items__footer m-0 p-0">
        <div class="cart__items__footer__info">
            <span class="mr-1">Subtotal:</span>
            <span class="ml-5 mr-5">${{ number_format($subtotal, 2)}}</span>
        </div>
        <div class="cart__footer__buttons">
            <a href="/shop">
                <img  src="/img/ContinueShopping_button.png" alt="Continue Shopping" />
            </a>
            <a class="cart__sm__link ml-3 mr-2" href="/cart/checkout">
                <img class="cart__sm__links" src="/img/Checkout_button.png" alt="Checkout" />
            </a> 
        </div>
    </div>