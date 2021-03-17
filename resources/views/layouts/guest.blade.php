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

      <header>
        <div class="container">
          <div class="row">

            <div class="left col-lg-2">
              <img class="logo" src="{{ asset("img/logo_glovo-prova.svg") }}" alt="logo">
            </div>

            <div class="center col-lg-8">
              <input type="text" name="" value="" placeholder="Cerca">
            </div>

            <div class="right col-lg-2"></div>
          </div>
        </div>
      </header>
   


      <main>
        {{-- MAIN, qui dentro ci andra a finire il segnaposto per le varie viste pubbliche --}}
    </div>
        @yield("guest-main")
      </main>
      @include('/layouts/footer')

    

    <script src="{{ asset("js/partials/layouts/guest.js") }}" charset="utf-8"></script>
    @yield("page-guest-script")
  </body>
</html>
