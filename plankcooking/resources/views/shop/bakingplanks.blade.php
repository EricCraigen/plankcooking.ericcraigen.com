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
            @foreach ($resultsArray as $result)
            <div class="shop__item__bp">
                <h6 class="item__title__bp">
                    {{ $result[0]['name'] }}
                </h6>
                <p class="item__description__bp w-100">
                  {{ $result[0]['description'] }}
                </p>
                @foreach ($result as $item)
                @if ($item['active'] === 1)
                  <form method="POST" 
                    action="bakingplanks" 
                    id="addToCartForm{{ $item['sortOrder'] }}" 
                    name="addToCartForm{{ $item['sortOrder'] }}">
                  <div class="item__form__bp m-0 p-0">
                    <div class="single__item__wrapper pb-5">
                      <div class="d-flex col-6 m-0 p-0">
                        <div class="m-0 p-0">
                          <p class="text-left">
                            {{ $item['name'] }}
                          </p>
                            <img src="{{ $item['imagePath'] }}" alt="{{ $item['imagePath'] != null ? $item['name'] : '' }}" />
                        </div>
                      </div>
                      <div class="d-flex col-6 align-items-center justify-content-center">
                        <div class="d-flex flex-column align-items-center">
                          <p class="item__price">
                            ${{ number_format($item['price'], 2) }}
                          </p>
                          <div>
                              <label class="item__qty" for="item__qty">
                              Quantity:
                              </label>
                              <input type="text"
                                class="qty_input"
                                id="{{ strval($qtyInputs[$item['sortOrder'] - 1]) }}"
                                name="{{ strval($qtyInputs[$item['sortOrder'] - 1]) }}"
                                value="{{ old(strval($qtyInputs[$item['sortOrder'] - 1])) }}"
                                placeholder="0"
                              />
                          </div>
                          @if($errorsFound && session('_sortOrder') === strval($qtyInputs[$item['sortOrder'] - 1]) )
                              <section class="qty_input_error">
                                  @foreach ($errors->all() as $error)
                                      <p>{{ $error }}</p>
                                  @endforeach
                              </section>
                          @endif
                          <button class="p-0 my-2" type="submit" id="addToCartBtn{{ $item['sortOrder'] }}" <?php echo  $item['productId'] == 12 || $item['productId'] == 16 ? "disabled" : "" ?>>
                              <img src="/img/AddToCart_button.png" alt="Add to Cart" />
                          </button>
                          @if (session('_sortOrder') == strval($qtyInputs[$item['sortOrder'] - 1]))
                              <div class="showLoading" id="showLoading">
                                  <p>
                                      <img class="loadingSpinner" src="/img/loadingSpinner.gif" alt="Updating..." />&nbsp;Updating...
                                  </p>
                              </div>
                          @endif
                          @if (session('_sortOrder') === strval($qtyInputs[$item['sortOrder'] - 1]) && !$errorsFound && session('_showAddedToCart') == true)
                            <div class="display inline-block" id="showAddedToCart">
                                <p class="addedToCart">
                                    Added To Cart - <a href="/cart">View Cart</a>
                                </p>
                            </div>
                          @endif
                        </div>
                      </div>
                  </div>
                  <input type="hidden" id="productId" name="productId" value="{{ $item['productId'] }}" />
                  <input type="hidden" id="categoryId" name="categoryId" value="{{ $category['categoryId'] }}" />
                  <input type="hidden" id="sortOrder" name="sortOrder" value="{{ $item['sortOrder'] }}" />
                  <input type="hidden" id="qtyInputId" name="qtyInputId" value="qty_input{{ $item['productId'] }}" />
                </div>
                {{ csrf_field() }}
            </form>
            @elseif ($item['active'] === 0 && $item['productId'] === 13)
              <h4 class="shop__item__inactive">No {{ $item['name'] }}s are available for purchase.</h4>
            @endif
            @endforeach
          @endforeach
      </div>
  </section>
</main>
@endsection