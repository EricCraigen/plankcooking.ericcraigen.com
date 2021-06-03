
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
        @isset($title)
            {{ $title }}
        @endisset
        </title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ URL::asset('css/global.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/index.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/shop.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/about.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/recipes.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/reviews.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/contact.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/cart.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/cartPreview.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/cartCheckout.css') }}" />
        <link rel="stylesheet" href="{{ URL::asset('css/cartReceipt.css') }}" />
    </head>

    <body class="container-fluid m-0 p-0" id="scrollPos">
        @include('shared.header')

            @yield('content')

        @include('shared.footer')

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/66a795f106.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="/js/headerFunctions.js"></script>
        <script type="text/javascript" src="/js/showLoading.js"></script>
    </body>

</html>