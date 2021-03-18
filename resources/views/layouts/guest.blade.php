<!DOCTYPE html>
<html lang="en" dir="ltr">
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


      <header id="header" :class="headerStatus ? 'active' : ''">
        <div class="container">
          <div class="row">

            <div class="left col-lg-3">
              <img class="logo" src="{{ asset("img/logo_glovo-prova.svg") }}" alt="logo">
            </div>
            
            <div class="center col-lg-6">
              @auth
              <input type="text" name="" value="" :placeholder="searchBarPlaceholder">
              @endauth
            </div>

            <div class="right col-lg-3 text-right">
              {{-- header content login --}}
              @yield('header-content')
            </div>
          </div>
        </div>
      </header>

      <main>
        {{-- MAIN, qui dentro ci andra a finire il segnaposto per le varie viste pubbliche --}}

        {{-- main login --}}
        @yield("guest-main")
      </main>

      @include('/layouts/footer')

    </div>

    <script src="{{ asset("js/partials/layouts/frontend.js") }}" charset="utf-8"></script>
    @yield("page-guest-script")
  </body>
</html>
