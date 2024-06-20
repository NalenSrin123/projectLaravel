<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <link class="border-rounded" rel="icon" href="logo.jpg">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ url('css/frontend/theme.css') }}" rel="stylesheet">
        <link href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="logo">
                    <a href="{{route('getall')}}">
                        <img width="80px" height="80px" src="{{url('images/',$logo[0]->thumbnail)}}"  class="rounded-circle">

                    </a>
                </div>
                <ul class="menu">
                    <li>
                        <a href="{{route('getall')}}">HOME</a>
                    </li>
                    <li>
                        <a href="{{route('shop')}}">SHOP</a>
                    </li>
                    <li>
                        <a href="{{route('get-news')}}">NEWS</a>
                    </li>
                </ul>
                <div class="search">
                    <form action="{{route('search-product')}}" method="get">
                        <input type="text" name="search" class="box" placeholder="SEARCH HERE">
                        <button>
                            <div style="background-image: url(search.png);
                                        width: 28px;
                                        height: 28px;
                                        background-position: center;
                                        background-size: contain;
                                        background-repeat: no-repeat;
                                        color:black
                            "></div>
                        </button>
                    </form>
                </div>
            </div>
        </header>
        @yield('content')
        <footer>
            <span>
                AllRight Recieved @ 2023
            </span>
        </footer>

    </body>
    <script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js') }}"></script>
</html>
