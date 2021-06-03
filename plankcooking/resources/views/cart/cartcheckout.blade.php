@extends('layout.master')

@php
    $errorsFound = count($errors->all());
    $subtotal = 0.0;
@endphp

@section('content')
    <main class="cart__wrapper" id="toggle__wrapper">
        <section class="cart__header">
            <div class="cart__header__description">
                Enter Billing & Shipping Information > Step 2 of 4
            </div>
        </section>

        <section class="cart__checkout__wrapper">
            <div class="cart__checkout__form">
                <div class="cart__form__inputs__wrapper">
                    <form class="cart__checkout__form__tag" method="POST" action="preview" name="cartCheckoutForm" id="cartCheckoutForm">
                        <div class="cart__checkout__header__billing">
                            Billing Address
                        </div>
                        <div class="cart__form__input mt-3">
                            <div class="cart__form__input__label">
                                First Name:
                            </div>
                            <div class="cart__form__input">
                                <input onClick="clearErrorMsgs()" class="{{ $errors->has('billingFirstName') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="billingFirstName" id="billingFirstName" value="{{ $orderCart['billingFirstName'] ? $orderCart['billingFirstName'] : old('billingFirstName') }}" />
                            </div>
                            <div class="cart__input__error__wrapper">
                                @if ($errors->has("billingFirstName"))
                                    <div class="cart__input__error" id="cart__input__error1" onClick="clearErrorMsgs()">
                                        <i class="fas fa-exclamation-circle"></i> 
                                            {{ $errors->first("billingFirstName") }}
                                        <div class="cart__input__error__before"></div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                Last Name:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('billingLastName') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="billingLastName" id="billingLastName" value="{{ $orderCart['billingLastName'] ? $orderCart['billingLastName'] : old('billingLastName') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("billingLastName"))
                                        <div class="cart__input__error" id="cart__input__error2" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("billingLastName") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                Address:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('billingAddress1') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="billingAddress1" id="billingAddress1" value="{{ $orderCart['billingAddress1'] ? $orderCart['billingAddress1'] : old('billingAddress1') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("billingAddress1"))
                                        <div class="cart__input__error" id="cart__input__error3" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("billingAddress1") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                Address 2:
                            </div>
                            <div class="cart__form__input">
                                <input class="cart__input" type="text" name="billingAddress2" id="billingAddress2" value="{{ $orderCart['billingAddress2'] ? $orderCart['billingAddress2'] : old('billingAddress2') }}" />
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                City:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('billingCity') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="billingCity" id="billingCity" value="{{ $orderCart['billingCity'] ? $orderCart['billingCity'] : old('billingCity') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("billingCity"))
                                        <div class="cart__input__error" id="cart__input__error4" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("billingCity") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                State:
                            </div>
                            <div class="cart__form__input">
                                <select class="{{ $errors->has('billingState') ? 'cart__input border__red' : 'cart__input' }}" name="billingState" id="billingState" value="{{ $orderCart['billingState'] }}">
                                    <option value="">Select</option>
                                    <option value="AL" <?php echo $orderCart['billingState'] == "AL" ? "selected" : "" ?>>Alabama</option>
                                    <option value="AK" <?php echo $orderCart['billingState'] == "Ak" ? "selected" : "" ?>>Alaska</option>
                                    <option value="AZ" <?php echo $orderCart['billingState'] == "AZ" ? "selected" : "" ?>>Arizona</option>
                                    <option value="AR" <?php echo $orderCart['billingState'] == "AR" ? "selected" : "" ?>>Arkansas</option>
                                    <option value="CA" <?php echo $orderCart['billingState'] == "CA" ? "selected" : "" ?>>California</option>
                                    <option value="CO" <?php echo $orderCart['billingState'] == "CO" ? "selected" : "" ?>>Colorado</option>
                                    <option value="CT" <?php echo $orderCart['billingState'] == "CT" ? "selected" : "" ?>>Connecticut</option>
                                    <option value="DE" <?php echo $orderCart['billingState'] == "DE" ? "selected" : "" ?>>Delaware</option>
                                    <option value="DoC" <?php echo $orderCart['billingState'] == "DoC" ? "selected" : "" ?>>Dist of Columbia</option>
                                    <option value="FL" <?php echo $orderCart['billingState'] == "FL" ? "selected" : "" ?>>Florida</option>
                                    <option value="GA" <?php echo $orderCart['billingState'] == "GA" ? "selected" : "" ?>>Georgia</option>
                                    <option value="HI" <?php echo $orderCart['billingState'] == "HI" ? "selected" : "" ?>>Hawaii</option>
                                    <option value="ID" <?php echo $orderCart['billingState'] == "ID" ? "selected" : "" ?>>Idaho</option>
                                    <option value="IL" <?php echo $orderCart['billingState'] == "IL" ? "selected" : "" ?>>Illinois</option>
                                    <option value="IN" <?php echo $orderCart['billingState'] == "IN" ? "selected" : "" ?>>Indiana</option>
                                    <option value="IA" <?php echo $orderCart['billingState'] == "IA" ? "selected" : "" ?>>Iowa</option>
                                    <option value="KS" <?php echo $orderCart['billingState'] == "KS" ? "selected" : "" ?>>Kansas</option>
                                    <option value="KY" <?php echo $orderCart['billingState'] == "KY" ? "selected" : "" ?>>Kentucky</option>
                                    <option value="LA" <?php echo $orderCart['billingState'] == "LA" ? "selected" : "" ?>>Louisiana</option>
                                    <option value="ME" <?php echo $orderCart['billingState'] == "ME" ? "selected" : "" ?>>Maine</option>
                                    <option value="MD" <?php echo $orderCart['billingState'] == "MD" ? "selected" : "" ?>>Maryland</option>
                                    <option value="MA" <?php echo $orderCart['billingState'] == "MA" ? "selected" : "" ?>>Massachusetts</option>
                                    <option value="MI" <?php echo $orderCart['billingState'] == "MI" ? "selected" : "" ?>>Michigan</option>
                                    <option value="MN" <?php echo $orderCart['billingState'] == "MN" ? "selected" : "" ?>>Minnesota</option>
                                    <option value="MS" <?php echo $orderCart['billingState'] == "MS" ? "selected" : "" ?>>Mississippi</option>
                                    <option value="MO" <?php echo $orderCart['billingState'] == "MO" ? "selected" : "" ?>>Missouri</option>
                                    <option value="MT" <?php echo $orderCart['billingState'] == "MT" ? "selected" : "" ?>>Montana</option>
                                    <option value="NE" <?php echo $orderCart['billingState'] == "NE" ? "selected" : "" ?>>Nebraska</option>
                                    <option value="NV" <?php echo $orderCart['billingState'] == "NV" ? "selected" : "" ?>>Nevada</option>
                                    <option value="NH" <?php echo $orderCart['billingState'] == "NH" ? "selected" : "" ?>>New Hampshire</option>
                                    <option value="NJ" <?php echo $orderCart['billingState'] == "NJ" ? "selected" : "" ?>>New Jersey</option>
                                    <option value="NM" <?php echo $orderCart['billingState'] == "NM" ? "selected" : "" ?>>New Mexico</option>
                                    <option value="NY" <?php echo $orderCart['billingState'] == "NY" ? "selected" : "" ?>>New York</option>
                                    <option value="NC" <?php echo $orderCart['billingState'] == "NC" ? "selected" : "" ?>>North Carolina</option>
                                    <option value="ND" <?php echo $orderCart['billingState'] == "ND" ? "selected" : "" ?>>North Dakota</option>
                                    <option value="OH" <?php echo $orderCart['billingState'] == "OH" ? "selected" : "" ?>>Ohio</option>
                                    <option value="OK" <?php echo $orderCart['billingState'] == "OK" ? "selected" : "" ?>>Oklahoma</option>
                                    <option value="OR" <?php echo $orderCart['billingState'] == "OR" ? "selected" : "" ?>>Oregon</option>
                                    <option value="PA" <?php echo $orderCart['billingState'] == "PA" ? "selected" : "" ?>>Pennsylvania</option>
                                    <option value="RI" <?php echo $orderCart['billingState'] == "RI" ? "selected" : "" ?>>Rhode Island</option>
                                    <option value="SC" <?php echo $orderCart['billingState'] == "SC" ? "selected" : "" ?>>South Carolina</option>
                                    <option value="SD" <?php echo $orderCart['billingState'] == "SD" ? "selected" : "" ?>>South Dakota</option>
                                    <option value="TN" <?php echo $orderCart['billingState'] == "TN" ? "selected" : "" ?>>Tennessee</option>
                                    <option value="TX" <?php echo $orderCart['billingState'] == "TX" ? "selected" : "" ?>>Texas</option>
                                    <option value="UT" <?php echo $orderCart['billingState'] == "UT" ? "selected" : "" ?>>Utah</option>
                                    <option value="VT" <?php echo $orderCart['billingState'] == "VT" ? "selected" : "" ?>>Vermont</option>
                                    <option value="VA" <?php echo $orderCart['billingState'] == "VA" ? "selected" : "" ?>>Virginia</option>
                                    <option value="WA" <?php echo $orderCart['billingState'] == "WA" ? "selected" : "" ?>>Washington</option>
                                    <option value="WV" <?php echo $orderCart['billingState'] == "WV" ? "selected" : "" ?>>West Virginia</option>
                                    <option value="WI" <?php echo $orderCart['billingState'] == "WI" ? "selected" : "" ?>>Wisconsin</option>
                                    <option value="WY" <?php echo $orderCart['billingState'] == "WY" ? "selected" : "" ?>>Wyoming</option>
                                </select>
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("billingState"))
                                        <div class="cart__input__error" id="cart__input__error5" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("billingState") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                ZIP / Postal:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('billingPostalCode') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="billingPostalCode" id="billingPostalCode" value="{{ $orderCart['billingPostalCode'] ? $orderCart['billingPostalCode'] : old('billingPostalCode') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("billingPostalCode"))
                                        <div class="cart__input__error" id="cart__input__error6" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("billingPostalCode") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                Phone:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('billingPhone') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="billingPhone" id="billingPhone" value="{{ $orderCart['billingPhone'] ? $orderCart['billingPhone'] : old('billingPhone') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("billingPhone"))
                                        <div class="cart__input__error" id="cart__input__error7" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("billingPhone") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>  
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                Email:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('billingEmail') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="billingEmail" id="billingEmail" value="{{ $orderCart['billingEmail'] ? $orderCart['billingEmail'] : old('billingEmail') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("billingEmail"))
                                        <div class="cart__input__error" id="cart__input__error8" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("billingEmail") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="cart__form__inputs__wrapper__right">
                        <div class="cart__checkout__header__shipping">
                            Shipping Address
                            <input class="sameAsAddressCheckbox" type="checkbox" name="sameAsAddressCheckbox" id="sameAsAddressCheckbox" />
                            Same as Billing Address
                        </div>
                        <div class="cart__form__input mt-3">
                            <div class="cart__form__input__label">
                                First Name:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('shippingFirstName') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="shippingFirstName" id="shippingFirstName" value="{{ $orderCart['shippingFirstName'] ? $orderCart['shippingFirstName'] : old('shippingFirstName') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("shippingFirstName"))
                                        <div class="cart__input__error" id="cart__input__error9" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("shippingFirstName") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                Last Name:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('shippingLastName') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="shippingLastName" id="shippingLastName" value="{{ $orderCart['shippingLastName'] ? $orderCart['shippingLastName'] : old('shippingLastName') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("shippingLastName"))
                                        <div class="cart__input__error" id="cart__input__error10" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("shippingLastName") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                Address:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('shippingAddress1') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="shippingAddress1" id="shippingAddress1" value="{{ $orderCart['shippingAddress1'] ? $orderCart['shippingAddress1'] : old('shippingAddress1') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("shippingAddress1"))
                                        <div class="cart__input__error" id="cart__input__error11" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("shippingAddress1") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                Address 2:
                            </div>
                            <div class="cart__form__input">
                                <input class="cart__input" type="text" name="shippingAddress2" id="shippingAddress2" value="{{ $orderCart['shippingAddress2'] ? $orderCart['shippingAddress2'] : old('shippingAddress2') }}" />
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                City:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('shippingCity') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="shippingCity" id="shippingCity" value="{{ $orderCart['shippingCity'] ? $orderCart['shippingCity'] : old('shippingCity') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("shippingCity"))
                                        <div class="cart__input__error" id="cart__input__error12" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("shippingCity") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cart__form__input">
                        <div class="cart__form__input__label">
                            State:
                        </div>
                        <div class="cart__form__input">
                            <select class="{{ $errors->has('shippingState') ? 'cart__input border__red' : 'cart__input' }}" name="shippingState" id="shippingState" value="{{ $orderCart['shippingState'] ? $orderCart['shippingState'] : old('shippingState') }}">
                                    <option value="">Select</option>
                                    <option value="AL" <?php echo $orderCart['shippingState'] == "AL" ? "selected" : "" ?>>Alabama</option>
                                    <option value="AK" <?php echo $orderCart['shippingState'] == "AK" ? "selected" : "" ?>>Alaska</option>
                                    <option value="AZ" <?php echo $orderCart['shippingState'] == "AZ" ? "selected" : "" ?>>Arizona</option>
                                    <option value="AR" <?php echo $orderCart['shippingState'] == "AR" ? "selected" : "" ?>>Arkansas</option>
                                    <option value="CA" <?php echo $orderCart['shippingState'] == "CA" ? "selected" : "" ?>>California</option>
                                    <option value="CO" <?php echo $orderCart['shippingState'] == "CO" ? "selected" : "" ?>>Colorado</option>
                                    <option value="CT" <?php echo $orderCart['shippingState'] == "CT" ? "selected" : "" ?>>Connecticut</option>
                                    <option value="DE" <?php echo $orderCart['shippingState'] == "DE" ? "selected" : "" ?>>Delaware</option>
                                    <option value="DoC" <?php echo $orderCart['shippingState'] == "DoC" ? "selected" : "" ?>>Dist of Columbia</option>
                                    <option value="FL" <?php echo $orderCart['shippingState'] == "FL" ? "selected" : "" ?>>Florida</option>
                                    <option value="GA" <?php echo $orderCart['shippingState'] == "GA" ? "selected" : "" ?>>Georgia</option>
                                    <option value="HI" <?php echo $orderCart['shippingState'] == "HI" ? "selected" : "" ?>>Hawaii</option>
                                    <option value="ID" <?php echo $orderCart['shippingState'] == "ID" ? "selected" : "" ?>>Idaho</option>
                                    <option value="IL" <?php echo $orderCart['shippingState'] == "IL" ? "selected" : "" ?>>Illinois</option>
                                    <option value="IN" <?php echo $orderCart['shippingState'] == "IN" ? "selected" : "" ?>>Indiana</option>
                                    <option value="IA" <?php echo $orderCart['shippingState'] == "IA" ? "selected" : "" ?>>Iowa</option>
                                    <option value="KS" <?php echo $orderCart['shippingState'] == "KS" ? "selected" : "" ?>>Kansas</option>
                                    <option value="KY" <?php echo $orderCart['shippingState'] == "KY" ? "selected" : "" ?>>Kentucky</option>
                                    <option value="LA" <?php echo $orderCart['shippingState'] == "LA" ? "selected" : "" ?>>Louisiana</option>
                                    <option value="ME" <?php echo $orderCart['shippingState'] == "ME" ? "selected" : "" ?>>Maine</option>
                                    <option value="MD" <?php echo $orderCart['shippingState'] == "MD" ? "selected" : "" ?>>Maryland</option>
                                    <option value="MA" <?php echo $orderCart['shippingState'] == "MA" ? "selected" : "" ?>>Massachusetts</option>
                                    <option value="MI" <?php echo $orderCart['shippingState'] == "MI" ? "selected" : "" ?>>Michigan</option>
                                    <option value="MN" <?php echo $orderCart['shippingState'] == "MN" ? "selected" : "" ?>>Minnesota</option>
                                    <option value="MS" <?php echo $orderCart['shippingState'] == "MS" ? "selected" : "" ?>>Mississippi</option>
                                    <option value="MO" <?php echo $orderCart['shippingState'] == "MO" ? "selected" : "" ?>>Missouri</option>
                                    <option value="MT" <?php echo $orderCart['shippingState'] == "MT" ? "selected" : "" ?>>Montana</option>
                                    <option value="NE" <?php echo $orderCart['shippingState'] == "NE" ? "selected" : "" ?>>Nebraska</option>
                                    <option value="NV" <?php echo $orderCart['shippingState'] == "NV" ? "selected" : "" ?>>Nevada</option>
                                    <option value="NH" <?php echo $orderCart['shippingState'] == "NH" ? "selected" : "" ?>>New Hampshire</option>
                                    <option value="NJ" <?php echo $orderCart['shippingState'] == "NJ" ? "selected" : "" ?>>New Jersey</option>
                                    <option value="NM" <?php echo $orderCart['shippingState'] == "NM" ? "selected" : "" ?>>New Mexico</option>
                                    <option value="NY" <?php echo $orderCart['shippingState'] == "NY" ? "selected" : "" ?>>New York</option>
                                    <option value="NC" <?php echo $orderCart['shippingState'] == "NC" ? "selected" : "" ?>>North Carolina</option>
                                    <option value="ND" <?php echo $orderCart['shippingState'] == "ND" ? "selected" : "" ?>>North Dakota</option>
                                    <option value="OH" <?php echo $orderCart['shippingState'] == "OH" ? "selected" : "" ?>>Ohio</option>
                                    <option value="OK" <?php echo $orderCart['shippingState'] == "OK" ? "selected" : "" ?>>Oklahoma</option>
                                    <option value="OR" <?php echo $orderCart['shippingState'] == "OR" ? "selected" : "" ?>>Oregon</option>
                                    <option value="PA" <?php echo $orderCart['shippingState'] == "PA" ? "selected" : "" ?>>Pennsylvania</option>
                                    <option value="RI" <?php echo $orderCart['shippingState'] == "RI" ? "selected" : "" ?>>Rhode Island</option>
                                    <option value="SC" <?php echo $orderCart['shippingState'] == "SC" ? "selected" : "" ?>>South Carolina</option>
                                    <option value="SD" <?php echo $orderCart['shippingState'] == "SD" ? "selected" : "" ?>>South Dakota</option>
                                    <option value="TN" <?php echo $orderCart['shippingState'] == "TN" ? "selected" : "" ?>>Tennessee</option>
                                    <option value="TX" <?php echo $orderCart['shippingState'] == "TX" ? "selected" : "" ?>>Texas</option>
                                    <option value="UT" <?php echo $orderCart['shippingState'] == "UT" ? "selected" : "" ?>>Utah</option>
                                    <option value="VT" <?php echo $orderCart['shippingState'] == "VT" ? "selected" : "" ?>>Vermont</option>
                                    <option value="VA" <?php echo $orderCart['shippingState'] == "VA" ? "selected" : "" ?>>Virginia</option>
                                    <option value="WA" <?php echo $orderCart['shippingState'] == "WA" ? "selected" : "" ?>>Washington</option>
                                    <option value="WV" <?php echo $orderCart['shippingState'] == "WV" ? "selected" : "" ?>>West Virginia</option>
                                    <option value="WI" <?php echo $orderCart['shippingState'] == "WI" ? "selected" : "" ?>>Wisconsin</option>
                                    <option value="WY" <?php echo $orderCart['shippingState'] == "WY" ? "selected" : "" ?>>Wyoming</option>
                                </select>
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("shippingState"))
                                        <div class="cart__input__error" id="cart__input__error13" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("shippingState") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                ZIP / Postal:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('shippingPostalCode') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="shippingPostalCode" id="shippingPostalCode" value="{{ $orderCart['shippingPostalCode'] ? $orderCart['shippingPostalCode'] : old('shippingPostalCode') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("shippingPostalCode"))
                                        <div class="cart__input__error" id="cart__input__error14" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("shippingPostalCode") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                Phone:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('shippingPhone') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="shippingPhone" id="shippingPhone" value="{{ $orderCart['shippingPhone'] ? $orderCart['shippingPhone'] : old('shippingPhone') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("shippingPhone"))
                                        <div class="cart__input__error" id="cart__input__error15" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("shippingPhone") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="cart__form__input">
                            <div class="cart__form__input__label">
                                Email:
                            </div>
                            <div class="cart__form__input">
                                <input class="{{ $errors->has('shippingEmail') ? 'cart__input border__red' : 'cart__input' }}" type="text" name="shippingEmail" id="shippingEmail" value="{{ $orderCart['shippingEmail'] ? $orderCart['shippingEmail'] : old('shippingEmail') }}" />
                                <div class="cart__input__error__wrapper">
                                    @if ($errors->has("shippingEmail"))
                                        <div class="cart__input__error" id="cart__input__error16" onClick="clearErrorMsgs()">
                                            <i class="fas fa-exclamation-circle"></i> 
                                                {{ $errors->first("shippingEmail") }}
                                            <div class="cart__input__error__before"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="cart__checkout__items m-0 mt-4 p-0">
                <div class="cart__checkout__items__header m-0 p-0">
                    <div class="cart__items__header__name">
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
                        <div class="cart__items__name">
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
                <div class="cart__checkout__subtotal">
                    <span class="cart__preview__subtotal__label">Subtotal:</span>
                    <span class="cart__preview__subtotal__output">${{ number_format($subtotal, 2)}}</span>
                </div>
            </div>

            <div class="cart__checkout__notes m-0 mt-4 p-0">
                <div class="cart__checkout__notes__header m-0 p-0">
                    <div class="cart__notes__header__name">
                        Comments or Additional Information
                    </div>
                </div>
                <div class="cart__notes__input__wrapper">
                    <textarea name="notes" id="notes">{{ $orderCart['notes'] }}</textarea>
                </div>
            </div>
        
            <div class="cart__checkout__footer m-0 mt-4 p-0">
                <div class="cart__footer__buttons">
                    <a class="cart__footer__button" href="/cart">
                        <img  src="/img/Back_button.png" alt="Continue Shopping" />
                    </a>
                    <button class="cart__checkout__button ml-3 mr-2" type="submit">
                        <img src="/img/Checkout_button.png" alt="Checkout" />
                    </button> 
                </div>
            </div>
            {{ csrf_field() }}
            </form> 
        </section>
    </main>
@endsection