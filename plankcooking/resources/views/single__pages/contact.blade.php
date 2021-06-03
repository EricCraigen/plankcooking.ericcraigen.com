@extends('layout.master')

@section('content')
    <main class="contact__wrapper" id="toggle__wrapper">
        <section class="contact__menu">
            <div class="contact__menu__links">
                <img src="/img/Contact_MenuHeader.png" alt="Contact Menu Header" />
            </div>
        </section>
        <section class="dropdown">
            <div class="dropdown__wrapper">
                <button
                    class="btn contact__dropdown__button text-light px-5 my-4"
                    type="button"
                    id="dropdownMenuButton"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                Contact Us
                </button>
            </div>
        </section>
        <section class="contact__content__wrapper mt-5">
            <div class="contact__content pt-3 px-4">
                <div class="contact__title__wrapper">
                    <h5 class="contact__title col-5">CONTACT US</h5>
                    <div class="w-100"></div>
                </div>
                <div class="contact__item">
                    <p class="contact__description">
                    You can contact us one of two ways; click one of the email links below to send us an email, 
                    or call the customer service number.
                    </p>
                    <div class="d-flex flex-column ml-2">
                        <p class="m-0 p-0">CUSTOMER SERVICE:</p>
                        <a class="m-0 p-0" href="mailto:chefhowie@plankcooking.com">ChefHowie@plankcooking.com</a>
                        <p class="m-0 p-0">Phone: 425.881.0422</p>
                        <p class="m-0 p-0">Fax: 425.881.7338</p>
                    </div>
                </div>
                <div class="contact__footer mt-3">
                    <p>WHOLESALE OPPORTUNITIES are available, please contact customer service for more information.</p>
                </div>
            </div>
        </section>
    </main>
@endsection