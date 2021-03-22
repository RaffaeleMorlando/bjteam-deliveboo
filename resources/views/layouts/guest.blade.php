<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="ltr">
  <head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-guest.css') }}" rel="stylesheet">

    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <div id="guest_layout">


      <header id="header" :class="headerStatus ? 'active' : ''" :style="headerStatus ? 'background-color: #FCF6B1' : 'transparent'">
        <div class="container">
          <div class="row">

            <div class="left col-lg-3 col-md-4">
              <a href="{{ route('home') }}" id="home_link"><img class="logo" src="{{ asset("img/logo_glovo-prova.svg") }}" alt="logo"></a>
            </div>

            <div class="center col-lg-6 col-md-4 ">
            @if(Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register')
              <input type="text" name="" value="" :placeholder="searchBarPlaceholder">
            @endif
            </div>

            <div class="right col-lg-3 col-md-4 text-right">
              {{-- header content login --}}
              <ul id="container_buttons_log_reg" class="ml-auto">
                  <!-- Authentication Links -->
                @guest
                  <li class="button_log_reg">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                    <li class="button_log_reg">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                  @endif
                @else
                  <li>
                    <a href="{{ route('admin.restaurants.dashboard') }}">
                      <img class="restaurant_logo" src="{{ Auth::user()->restaurant->logo }}"
                      alt="restaurant_logo">
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
                @endguest
              </ul>
            </div>
          </div>
        </div>

      </header>

      <main>
        {{-- MAIN, qui dentro ci andra a finire il segnaposto per le varie viste pubbliche --}}

        {{-- main login --}}
        @yield("guest-main")
        @yield('restaurant-main')
      </main>

      @include('/layouts/footer')

    </div>

    <script src="{{ asset("js/partials/layouts/frontend.js") }}" charset="utf-8"></script>
    @yield("page-guest-script")
  </body>
</html>
