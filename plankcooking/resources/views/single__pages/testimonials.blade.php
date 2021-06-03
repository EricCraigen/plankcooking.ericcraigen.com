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
        <section class="reviews__content__wrapper">
            <div class="reviews__content pt-3 px-4">
                <div class="testimonials__item">
                    <p class="text-left">
                        “I must tell you I’m very impressed with the prompt delivery of the four planks I ordered on December 4th and received on December 7th. My husband and I have thoroughly enjoyed our own plank and have experimented quite a bit. I probably cook on it twice a week. Thanks for the great service."<br />
                        <br />
                        -Becky C
                    </p>
                    <p class="text-left borderTop pt-3">
                        "Last night, I used your dry herb rub for salmon to enhance the flavor of shrimp. My husband and I enjoyed the flavors that both the cedar plank and herb rub gave the shellfish. But the added benefit was the woodsy aroma throughout the house. It brought me back to my Vermont days, with a wood burning fire place."<br />
                        <br />
                        -A. Cardello
                    </p>
                    <p class="text-left borderTop pt-3">
                        "Thank you for a great product. We use it all the time. It might even keep us away from your restaurant since we can make our own great meals!"<br />
                        <br />
                        -Kyle Ohashi
                    </p>
                </div>
            </div>
        </section>
    </main>
@endsection