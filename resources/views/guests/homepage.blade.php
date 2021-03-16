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

      <header></header>

      {{-- MAIN, qui dentro ci andra a finire il segnaposto per le varie viste pubbliche --}}
      <main></main>

      <footer :style="!activeFooter ? 'width: 50px' : 'width: 100%'">
        {{-- icona che mostra/nasconde footer --}}
        <div class="show_footer" @click="footerToggleShow">
          <i :class="!activeFooter ? 'fas fa-arrow-right' : 'fas fa-arrow-left'"></i>
        </div>
      </footer>

    </div>

    <script src="{{ asset("js/partials/layouts/guest.js") }}" charset="utf-8"></script>
  </body>
</html>
