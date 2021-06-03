@extends('layout.master')

@php
    $errorsFound = count($errors->all());
@endphp

@section('content')
<main class="shop__wrapper" id="toggle__wrapper">

  @include('shop.shopnavigation')

    <section class="shop__content__wrapper">
      @include('shop.itemrotatorimage')
        <div class="shop__items__content pt-3 px-4">
            <p class="shop__category__description">{{ $category['description'] }}</p>
            @include('shop.shopitem')
        </div>
  </section>

</main>
@endsection