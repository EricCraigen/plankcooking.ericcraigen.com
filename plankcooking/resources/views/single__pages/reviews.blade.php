@extends('layout.master')

@section('content')
    <main class="reviews__wrapper" id="toggle__wrapper">
        <section class="reviews__menu">
            <div class="reviews__menu__links">
                <img src="/img/Reviews_MenuHeader.png" alt="About Menu Header">
                <a class="dropdown-item" href="/reviews">PRESS REVIEWS &#x25B6;</a>
                <a class="dropdown-item" href="/testimonials">TESTIMONIALS</a>
            </div>
        </section>
        <section class="dropdown">
            <div class="dropdown__wrapper">
                <button
                    class="btn reviews__dropdown__button text-light px-5 my-4"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                Reviews<br />
                <span class="reviews__dropdown__description dropdown-toggle">&amp; Testimonials</span>
                </button>
                <div class="dropdown-menu reviews__dropdown__menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/reviews">PRESS REVIEWS</a>
                    <a class="dropdown-item" href="/testimonials">TESTIMONIALS</a>
                </div>
            </div>
        </section>
        <section class="reviews__content__wrapper pt-3">
            <div class="reviews__content pt-3 px-4">
                <div class="reviews__item">
                    <div class="reviews__rotator__wrapper">
                        <img class="reviews__rotator" src="/img/JHandMartha_photo.png" alt="Cookbooks" />
                    </div>
                    <img class="reviews__rotator__sm pb-3" src="/img/JHandMartha_photo.png" alt="Cookbooks" />
                    <div class="w-100">
                        <h6 class="reviews__title text-center pb-2">
                            JOHN HOWIE & PLANK COOKING <br />
                            ON MARTHA STEWART LIVING
                        </h6>
                        <p class="reviews__description text-center pt-2 pb-3 w-100">
                            "Delicious. This is a very unusual and tasty, tasty appetizer!"
                        </p>
                        <p class="reviews__description text-center pb-3">
                            "I think we should all try plank cooking."
                        </p>
                        <p class="reviews__description text-center pb-3">
                            Martha Stewart - Martha Stewart Living Television Show
                        </p>
                    </div>
                </div>
                <div class="reviews__footer d-flex flex-column">
                    <h5 class="reviews__footer__title py-1 pl-3">SIMPLY SEAFOOD MAGAZINE &copy;</h5>
                    <div class="d-flex col-12 reviews__footer__description m-0 p-0">
                        <p>
                            "Guests will delight in the delectable fragrance of salmon mingled with the aroma of the heated plank." <br />
                            <br />
                            Simply Seafood Magazine
                        </p>
                        <div class="d-flex col-5 reviews__footer__logo">
                            <img src="/img/SimplySeafood_logo.png" alt="Simply Seafood Logo" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection