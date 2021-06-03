@extends('layout.master')

@section('content')

<main class="shop__wrapper" id="toggle__wrapper">

  @include('shop.shopnavigation')

    <section class="shop__home__wrapper">
        <div class="shop__home__content pt-3 px-2">
            <div class="shop__home px-2">
              <h5 class="shop__home__title">
                  PLANKCOOKING PRODUCTS
              </h5>
              <h6 class="shop__home__title__filler"></h6>
            </div>
            <div class="shop__cubes__wrapper mt-2 mb-5">
              <div class="shop__cubes">
                <a href="/shop/spicerubs">
                  <img src="/img/SpiceRubs_cube.png" alt="SpiceRubs" />
                </a>
                <a href="/shop/bakingplanks">
                  <img src="/img/BakingPlanks_cube.png" alt="BakingPlanks" />
                </a>
                <a href="/shop/cookbooks">
                  <img src="/img/Cookbooks_cube.png" alt="Cookbooks" />
                </a>
                <a href="/shop/bbqplanks">
                  <img src="/img/BBQ_Planks_cube.png" alt="BBQ_Planks" />
                </a>  
              </div>           
            </div>
        </div>
  </section>

</main>
@endsection