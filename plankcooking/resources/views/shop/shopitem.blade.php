@foreach ($products as $product)
    <form method="POST" action="spicerubs" 
        id="addToCartForm{{ $product['sortOrder'] }}" 
        name="addToCartForm{{ $product['sortOrder'] }}">
        <div class="shop__item">
            <h6 class="item__title">
                {{ $product['name'] }} {{ $product['active'] == 1 ? "" : "**Out of Stock**" }} 
            </h6>
            <h6 class="item__title__filler"></h6>
            <p class="item__description">
                {{ $product['description'] }}
            </p>
            <div class="item__form">
                <p class="item__price">
                    Price: ${{ number_format($product['price'], 2) }}
                </p>
                <div>
                    <label class="item__qty" for="item__qty">
                    Quantity:
                    </label>
                    <input type="text"
                        class="qty_input"
                        id="{{ strval($qtyInputs[$product['sortOrder'] - 1]) }}"
                        name="{{ strval($qtyInputs[$product['sortOrder'] - 1]) }}"
                        value="{{ old(strval($qtyInputs[$product['sortOrder'] - 1])) }}"
                        placeholder="0"
                    />
                </div>
                @if($errorsFound && session('_sortOrder') === strval($qtyInputs[$product['sortOrder'] - 1]) )
                    <section class="qty_input_error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </section>
                @endif
                <button class="p-0 my-2" type="submit" id="addToCartBtn{{ $product['sortOrder'] }}" <?php echo $product['productId'] == 8 || $product['productId'] == 10 ? "disabled" : "" ?>>
                    <img src="/img/AddToCart_button.png" alt="Add to Cart" />
                </button>
                @if (session('_sortOrder') == strval($qtyInputs[$product['sortOrder'] - 1]))
                    <div class="showLoading" id="showLoading">
                        <p>
                            <img class="loadingSpinner" src="/img/loadingSpinner.gif" alt="Updating..." />&nbsp;Updating...
                        </p>
                    </div>
                @endif
                @if (session('_sortOrder') == strval($qtyInputs[$product['sortOrder'] - 1]) && !$errorsFound && session('_showAddedToCart') == true)
                <div class="display inline-block" id="showAddedToCart">
                    <p class="addedToCart">
                        Added To Cart - <a href="/cart">View Cart</a>
                    </p>
                </div>
                @endif
                <img src="{{ $product['imagePath'] }}" alt="{{ $product['imagePath'] != null ? $product['name'] : '' }}" />
                <input type="hidden" id="productId" name="productId" value="{{ $product['productId'] }}" />
                <input type="hidden" id="sortOrder" name="sortOrder" value="{{ $product['sortOrder'] }}" />
                <input type="hidden" id="categoryId" name="categoryId" value="{{ $category['categoryId'] }}" />
                <input type="hidden" id="qtyInputId" name="qtyInputId" value="qty_input{{ $product['productId'] }}" />
            </div>
            {{ csrf_field() }}
        </div>
    </form>
@endforeach