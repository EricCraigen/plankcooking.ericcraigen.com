@extends('layout.master')

@php
    $errorsFound = count($errors->all());
    $orderTotal = 0.0;
    $subtotal = 0.0;
    $taxes = 0.0;
    $shippingHandlingCostParcel = 0.0;
    $shippingHandlingCostPriority = 0.0;
    $stateTaxes = [
        "AL" => 0.053,
        "Ak" => 0.065,
        "AZ" => 0.055,
        "AR" => 0.068,
        "CA" => 0.07,
        "CO" => 0.08,
        "CT" => 0.08,
        "DE" => 0.08,
        "DoC" => 0.09,
        "FL" => 0.08,
        "GA" => 0.06,
        "HI" => 0.086,
        "ID" => 0.065,
        "IL" => 0.064,
        "IN" => 0.063,
        "IA" => 0.068,
        "KS" => 0.07,
        "KY" => 0.04,
        "LA" => 0.07,
        "ME" => 0.068,
        "MD" => 0.06,
        "MA" => 0.06,
        "MI" => 0.064,
        "MN" => 0.068,
        "MS" => 0.04,
        "MO" => 0.05,
        "MT" => 0.078,
        "NE" => 0.07,
        "NV" => 0.056,
        "NH" => 0.07,
        "NJ" => 0.08,
        "NM" => 0.07,
        "NY" => 0.09,
        "NC" => 0.054,
        "ND" => 0.067,
        "OH" => 0.064,
        "OK" => 0.066,
        "OR" => 0.069,
        "PA" => 0.076,
        "RI" => 0.08,
        "SC" => 0.065,
        "SD" => 0.056,
        "TN" => 0.064,
        "TX" => 0.05,
        "UT" => 0.04,
        "VT" => 0.07,
        "VA" => 0.069,
        "WA" => 0.08,
        "WV" => 0.075,
        "WI" => 0.067,
        "WY" => 0.0654
    ];
@endphp

@section('content')
    <main class="cart__wrapper" id="toggle__wrapper">
        <section class="cart__header__preview">
            <div class="cart__header__description__preview">
                Preview Order & Enter Payment Information > Step 3 of 4
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
                                $subtotal += $products[$orderItem['productId'] - 1]['price'] * $orderItem['qty'];
                                if ($products[$orderItem['productId'] - 1]['taxExempt'] == 0) {

                                    $taxes += ($products[$orderItem['productId'] - 1]['price'] * $orderItem['qty']) * $stateTaxes[$orderCart['shippingState']];
                                }
                                $shippingHandlingCostParcel += number_format(($orderItem['qty'] * $products[$orderItem['productId'] - 1]['ounces'] * 0.03), 2);
                                $shippingHandlingCostPriority += number_format(($orderItem['qty'] * $products[$orderItem['productId'] - 1]['ounces'] * 0.09), 2);
                            @endphp
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
                            <span class="cart__preview__subtotal__output" name="taxesDisplay" id="taxesDisplay">${{ number_format($taxes, 2) }}</span>
                        </div>
                <div clas="cart__preview__subtotal__label">
                        <div class="cart__preview__input__wrapper">
                            <div class="cart__preview__subtotal__label">
                                <div class="cart__shippingType__error__wrapper m-0 p-0">
                                    @if ($errors->has("shippingType"))
                                        <div class="cart__input__error__preview" id="cart__input__error1" onClick="clearErrorMsgs()">
                                                {{ $errors->first("shippingType") }}
                                            <div class="cart__input__error__before__preview"></div>
                                        </div>
                                    @endif
                                </div>
                                <span class="m-0 p-0 mr-1 w-100 text-right">*Shipping &AMP; Handling:</span>
                                <select class="{{ $errors->has('shippingType') ? 'cart__input1 border__red' : 'cart__input' }}" name="shippingType" id="shippingType" onChange="onShippingTypeChange()" value="{{ $orderCart['shippingType'] ? $orderCart['shippingType'] : old('shippingType') }}">
                                    <option value="">Select</option>
                                    <option value="1">U.S.P.S Parcel (3 - 8 days)</option>
                                    <option value="2">U.S.P.S Priority (2 - 4 days)</option>
                                </select>
                            </div>
                            <span class="cart__preview__subtotal__output" name="shippingCost" id="shippingCost">$0.00</span>
                        </div>
                        <div class="cart__preview__input__wrapper mt-4">
                            <span class="cart__preview__subtotal__label">Total:</span>
                            <span class="cart__preview__subtotal__output" name="orderTotalDisplay" id="orderTotalDisplay">${{ number_format(($subtotal + $taxes), 2) }}</span>
                        </div>
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
                <div class="cart__preview__notes">
                        {{ $orderCart['notes'] }}
                </div>
            </div>
            <div class="cart__checkout__notes m-0 mt-4 p-0">
                <div class="cart__checkout__notes__header m-0 p-0">
                    <div class="cart__paymentInfo__header__name">
                        Payment Information
                    </div>
                </div>
                <div class="cart__notes__input__wrapper">
                    <div class="cart__preview__payment__inputs">
                        <div class="cart__preview__creditCardType__label">
                            <span class="cart__preview__input__label mr-1">Card Type:</span>
                            <select class="{{ $errors->has('cardTypeSelect') ? 'cart__input border__red' : 'cart__input' }}" name="cardTypeSelect" id="cardTypeSelect" value="{{ $orderCart['creditCardType'] ? $orderCart['creditCardType'] : old('cardTypeSelect') }}">
                                <option value="">Select</option>
                                <option value="VISA">Visa</option>
                                <option value="Master Card">MasterCard</option>
                                <option value="Discover">Discover</option>
                                <option value="American Express">American Express</option>
                            </select>
                        </div>
                    </div>
                    <div class="cart__preview__payment__inputs">
                        <div class="cart__preview__creditCardType__label">
                            <span class="cart__preview__input__label mr-1">Card Number:</span>
                            <input class="{{ $errors->has('creditCardNumber') ? 'cart__input border__red' : 'cart__input' }}"
                                maxlength="16" 
                                type="text" 
                                name="creditCardNumber" 
                                id="creditCardNumber" 
                                placeholder="Card Number" 
                                value="{{ old('creditCardNumber') }}" 
                            />
                            <div class="cart__cardDate__wrapper m-0 p-0">
                                <span class="mr-1 ml-1">Expiration:</span>
                                <select class="{{ $errors->has('cardExpMonth') ? 'cart__input cart__card__YYMM__select border__red' : 'cart__input cart__card__YYMM__select' }}" name="cardExpMonth" id="cardExpMonth" value="{{ old('cardExpMonth') }}" > 
                                    <option value="">Select</option>
                                    <option value="1">January</option>
                                    <option value="2">Febuary</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            
                                <select class="{{ $errors->has('cardExpYear') ? 'cart__input cart__card__YYMM__select border__red' : 'cart__input cart__card__YYMM__select' }}" name="cardExpYear" id="cardExpYear" value="{{ old('cardExpYear') }} ">
                                    <option value="">Select</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    <option value="2031">2031</option>
                                </select>
                            </div>
                        </div>
                        <div class="cart__input__error_cardType__wrapper m-0 p-0">
                            @if ($errors->has("cardTypeSelect"))
                                <div class="cart__input__error__cardType" id="cart__input__error2" onClick="clearErrorMsgs()">
                                        {{ $errors->first("cardTypeSelect") }}
                                    <div class="cart__input__error__before__cardType"></div>
                                </div>
                            @endif
                            @if ($errors->has("creditCardNumber"))
                                <div class="cart__input__error__cardNumber" id="cart__input__error3" onClick="clearErrorMsgs()">
                                        {{ $errors->first("creditCardNumber") }}
                                    <div class="cart__input__error__before__cardNumber"></div>
                                </div>
                            @endif
                            @if ($errors->has("cardExpMonth"))
                                <div class="cart__input__error__month" id="cart__input__error4" onClick="clearErrorMsgs()">
                                        {{ $errors->first("cardExpMonth") }}
                                    <div class="cart__input__error__before__cardMonth"></div>
                                </div>
                            @endif
                            @if ($errors->has("cardExpYear"))
                                <div class="cart__input__error__year" id="cart__input__error5" onClick="clearErrorMsgs()">
                                        {{ $errors->first("cardExpYear") }}
                                    <div class="cart__input__error__before__cardYear"></div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="cart__preview__footer__buttons">
                    <a class="cart__footer__button" href="/cart/checkout">
                        <img  src="/img/Back_button.png" alt="Continue Shopping" />
                    </a>
                    <button class="cart__checkout__button ml-3 mr-2" type="submit">
                        <img src="/img/Purchase_button.png" alt="Checkout" />
                    </button> 
                </div>
                <input type="hidden" name="orderTotalInput" id="orderTotalInput" value="{{ number_format($subtotal + $taxes, 2) }}" />   
                <input type="hidden" name="taxes" id="taxes" value="{{ number_format($taxes, 2) }}" />   
                <input type="hidden" name="shippingHandlingCostParcel" id="shippingHandlingCostParcel" value="{{ number_format($shippingHandlingCostParcel, 2) }}" />   
                <input type="hidden" name="shippingHandlingCostPriority" id="shippingHandlingCostPriority" value="{{ number_format($shippingHandlingCostPriority, 2) }}" />
                {{ csrf_field() }}
                </form> 
            </div>
        </section>
    </main>
@endsection