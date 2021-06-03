@extends('layout.master')

@php
    $errorsFound = count($errors->all());
    $subtotal = 0.0;
@endphp

@section('content')
    <main class="cart__wrapper" id="toggle__wrapper">
        @include('cart.cartheader')
        <section class="{{ count($orderItems) > 0 ? 'cart__items__wrapper' : 'd-none' }}">
            <div class="cart__items__header col-12 m-0 p-0">
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
            @include('cart.cartitem')
        </section>
    </main>
@endsection