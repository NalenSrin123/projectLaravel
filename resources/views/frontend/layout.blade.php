<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="UTF-8">
        <link class="border-rounded" rel="icon" href="{{ asset('logo.jpg') }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="{{ asset('css/frontend/theme.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="logo">
                    <a href="{{route('getall')}}">
                        @if (filled($logo->first()?->thumbnail))
                            <img width="80" height="80" src="{{ asset('images/' . $logo->first()->thumbnail) }}" class="rounded-circle" alt="Logo">
                        @endif

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
                <div class="search d-flex gap-4">
                    <form action="{{route('search-product')}}" method="get">
                        <input type="text" name="search" class="box" placeholder="SEARCH HERE">
                        <button>
                            <div style="background-image: url('{{ asset('search.png') }}');
                                        width: 28px;
                                        height: 28px;
                                        background-position: center;
                                        background-size: contain;
                                        background-repeat: no-repeat;
                                        color:black
                            "></div>
                        </button>
                    </form>
                    @auth
                        <form action="{{ route('frontend-logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary">LOGOUT</button>
                        </form>
                    @else
                        <a href="{{ route('frontend-register') }}" class="btn btn-primary">SIGN UP</a>
                    @endauth
                </div>
            </div>
        </header>
        @yield('content')
        <footer>
            <span>
                AllRight Recieved &copy; 2026 <a href="{{route('getall')}}">NL SHOPPING</a>
            </span>
        </footer>

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>
