@extends('layout.master')

@php
    $errorsFound = count($errors->all());
    $subtotal = 0.0;
@endphp

@section('content')
    <main class="cart__wrapper" id="toggle__wrapper">
        <section class="cart__header__preview">
            <div class="cart__header__description__preview">
                Order Reciept > Step 4 of 4
            </div>
        </section>
        <section class="cart__checkout__wrapper">
            <div class="cart__checkout__form">
                <div class="cart__form__inputs__wrapper">
                    <form class="cart__checkout__form__tag" method="POST" action="receipt" name="cartCheckoutForm" id="cartCheckoutForm">
                        <div class="cart__preview__header__billing">
                            Billing Address
                        </div>
                            <div class="cart__preview__billing">
                                <div class="cart__preview__labels">
                                    <div class="cart__preview__label mb-1">
                                        Name:
                                    </div>
                                    <div class="cart__preview__label mb-3">
                                        Address:
                                    </div>
                                    <div class="cart__preview__label mb-1">
                                        Phone:
                                    </div>
                                    <div class="cart__preview__label">
                                        Email:
                                    </div>
                                </div>
                            <div class="cart__preview__outputs">
                                <div class="cart__preview__output">
                                    {{ $orderCart['billingFirstName'] }} {{ $orderCart['billingLastName'] }}
                                </div>
                                <div class="cart__preview__output">
                                    {{ $orderCart['billingAddress1'] }}
                                    {{ $orderCart['billingAddress2'] }}
                                <br />
                                    {{ $orderCart['billingCity'] }},
                                    {{ $orderCart['billingState'] }}
                                    {{ $orderCart['billingPostalCode'] }}
                                </div>
                                <div class="cart__preview__output">
                                    {{ $orderCart['billingPhone'] }}
                                </div>
                                <div class="cart__preview__output">
                                    {{ $orderCart['billingEmail'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cart__form__inputs__wrapper__right">
                        <div class="cart__preview__header__shipping">
                            Shipping Address
                        </div>
                        <div class="cart__preview__shipping">
                            <div class="cart__preview__labels">
                                <div class="cart__preview__label mb-1">
                                    Name:
                                </div>
                                <div class="cart__preview__label mb-3">
                                    Address:
                                </div>
                                <div class="cart__preview__label mb-1">
                                    Phone:
                                </div>
                                <div class="cart__preview__label">
                                    Email:
                                </div>
                            </div>
                            <div class="cart__preview__outputs__shipping">
                                <div class="cart__preview__output mb-1">
                                    {{ $orderCart['shippingFirstName'] }} {{ $orderCart['shippingLastName'] }}
                                </div>
                                <div class="cart__preview__output">
                                    {{ $orderCart['shippingAddress1'] }}
                                    {{ $orderCart['shippingAddress2'] }}
                                <br />
                                    {{ $orderCart['shippingCity'] }},
                                    {{ $orderCart['shippingState'] }}
                                    {{ $orderCart['shippingPostalCode'] }}
                                </div>
                                <div class="cart__preview__output">
                                    {{ $orderCart['shippingPhone'] }}
                                </div>
                                <div class="cart__preview__output">
                                    {{ $orderCart['shippingEmail'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart__checkout__items m-0 mt-4 p-0">
                <div class="cart__checkout__items__header m-0 p-0">
                    <div class="cart__preview__items__header__name">
                        Shipping to You
                    </div>
                    <div class="cart__items__header__description">
                        Price
                    </div>
                    <div class="cart__items__header__description">
                        Quantity
                    </div>
                    <div class="cart__items__header__description">
                        Total
                    </div>
                </div>
                @foreach ($orderItems as $orderItem)
                    <div class="cart__items col-12 m-0 p-0">
                        <div class="cart__preview__items__name">
                            {{ $products[$orderItem['productId'] - 1]['name'] }}
                        </div>
                        <div class="cart__items__description">
                        ${{ $products[$orderItem['productId'] - 1]['price'] }}
                        </div>
                        <div class="cart__items__description">
                            {{ $orderItem['qty'] }}
                        </div>
                        <div class="cart__items__description">
                            ${{ number_format($products[$orderItem['productId'] - 1]['price'] * $orderItem['qty'], 2) }}
                            @php
                                $subtotal += $products[$orderItem['productId'] - 1]['price'] * $orderItem['qty']
                            @endphp
                            <input type="hidden" name="subTotal" id="subTotal" value="{{ $subtotal }}" />
                        </div>
                    </div>
                @endforeach
                
                    <div class="cart__preview__items__footer">
                        <div class="cart__preview__subtotal">
                            <span class="cart__preview__subtotal__label">Subtotal:</span>
                            <span class="cart__preview__subtotal__output">${{ number_format($subtotal, 2)}}</span>
                        </div>
                    <div class="cart__preview__input__wrapper">
                        <span class="cart__preview__subtotal__label">Taxes:</span>
                        <span class="cart__preview__subtotal__output" name="shippingCost" id="shippingCost">${{ $orderCart['taxes'] }}</span>
                    </div>
                    <div class="cart__preview__input__wrapper">
                        <span class="cart__preview__subtotal__label text-right">Shipping &AMP; Handling: <br />{{ $orderCart['shippingType'] == 1 ? "U.S.P.S. Parcel (3 - 8 days)" : "U.S.P.S. Priority (2 - 4 days)" }}</span>
                        <span class="cart__preview__subtotal__output" name="shippingCost" id="shippingCost">${{ number_format($orderCart['shippingCost'], 2) }}</span>
                    </div>
                    <div class="cart__preview__input__wrapper mt-3 mb-2">
                        <span class="cart__preview__subtotal__label">Total:</span>
                        <span class="cart__preview__subtotal__output" name="total" id="total">${{ number_format($orderCart['orderTotal'] + $orderCart['taxes'] + $orderCart['shippingCost'], 2) }}</span>
                    </div>
                </div>
                <div class="cart__preview__shippingNote">
                    *Shipping durations are estimates and not a guarantee
                </div>
            </div>
            <div class="{{ $orderCart['notes'] == null ? 'd-none' : 'cart__checkout__notes m-0 mt-4 p-0' }}">
                    <div class="cart__preview__notes__header m-0 p-0">
                        <div class="cart__preview__header__name">
                            Comments or Additional Information
                        </div>
                    </div>
                    <div class="cart__preview__notes p-2">
                        {{ $orderCart['notes'] }}
                    </div>
                </div>
                <div class="cart__checkout__notes m-0 mt-4 p-0">
                    <div class="cart__checkout__notes__header m-0 p-0">
                        <div class="cart__paymentInfo__header__name">
                            Payment Information
                        </div>
                    </div>
                    <form method="POST" action="receipt" name="cartCheckoutForm" id="cartCheckoutForm">
                        <div class="cart__notes__input__wrapper">
                        <div class="cart__preview__payment__inputs">
                            <span class="cart__receipt__input__label">Confirmation Code:</span>
                            <span class="cart__reciept__input__output mr-1">{{ $orderCart['authorizationCode'] }}</span>
                        </div>
                        <div class="cart__preview__payment__inputs">
                            <span class="cart__receipt__input__label pr-2 text-right">Card Number:</span>
                            <span class="cart__reciept__input__output mr-1">{{ $orderCart['creditCardType'] }} XXXX {{ $creditCardLastFour }}</span>
                        </div>
                        {{ csrf_field() }}
                    </form>     
                    </div>

                </div>
            </section>
    </main>
@endsection