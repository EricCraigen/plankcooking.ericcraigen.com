@extends('layout.master')

@section('content')
<main class="home__wrapper m-0 p-0">
<section class="container-fluid-sm m-0 p-0">
    <div class="home__rotator__wrapper">
      <img
        src="/img/HomePg_Rotator_image1a.png"
        alt="Home-Rotator"
        class="home__rotator"
      />
    </div>
    <section class="d-flex justify-content-center">
        <div class="home__cubes__wrapper">
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
    </section>
    <div>
        <img src="/img/FooterPlank.png" alt="Footer Plank" class="home__footer__plank" />
    </div>
  </section>
  </main>
@endsection
