<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@400;500;700;800;900&family=Vollkorn:wght@400;500;600&family=Josefin+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.css')}}">
        <style>
            body {
                font-family: 'Montserrat', sans-serif;
            }
        </style>

    </head>

    <body>

        @php $locale = session()->get('locale'); @endphp

        <nav class="navbar navbar-light mb-3">
            <div class="container justify-content-end">
                <ul class="nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="login">@lang('lang.connection')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register">@lang('lang.register_user')</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="/Maisonneuve2095376/dashboard">@lang('lang.back_all')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Maisonneuve2095376/articles/mes-articles">@lang('lang.back_my')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Maisonneuve2095376/document">@lang('lang.all_docs')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/Maisonneuve2095376/etudiant">@lang('lang.all_students')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">@lang('lang.logout')</a>
                    </li>
                    @endguest

                    <li class="nav-item">
                        <a class="nav-link @if($locale=='en') bg-light @endif" href="/Maisonneuve2095376/lang/en"><img src="{{asset('images/flag/usa.png')}}" >En</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if($locale=='fr') bg-light @endif" href="/Maisonneuve2095376/lang/fr"><img src="{{asset('images/flag/France.png')}}" >Fr</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="banner">
            <div class="image-box">
                <img src="{{asset('images/header.jpg')}}" alt="background image">
            </div>
            <div class="text-box">
                <h1>@lang('lang.title_page')</h1>
                <h1>FORUM</h1>
            </div>
        </div>
        @yield('content')

        <footer class="py-3 bg-footer">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                <li class="nav-item"><a href="/Maisonneuve2095376/dashboard" class="nav-link px-2 text-white">@lang('lang.back_all')</a></li>
                <li class="nav-item"><a href="/Maisonneuve2095376/articles/mes-articles" class="nav-link px-2 text-white">@lang('lang.back_my')</a></li>
                <li class="nav-item"><a href="/Maisonneuve2095376/document" class="nav-link px-2 text-white">@lang('lang.all_docs')</a></li>
                <li class="nav-item"><a href="/Maisonneuve2095376/etudiant" class="nav-link px-2 text-white">@lang('lang.all_students')</a></li>
            </ul>
            <p class="text-center text-white">© 2021 College, Inc</p>
        </footer>

    </body>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"  crossorigin="anonymous"></script> -->
    <script src="{{asset('/js/bootstrap.js')}}"></script>

</html>