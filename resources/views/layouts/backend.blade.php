<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- bootstrap --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  {{-- my style --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
  <div id="background">
    <div id="backend" class="container-fluid p-0">

        {{-- parte sinistra del layout --}}
        <main :class="activeAside ? 'main_slide_right' : 'main_slide_left'" id="dashboard-main">
          <h2>titolo della main</h2>
        </main>

        {{-- parte destra del layout --}}
        <aside :class="activeAside ? 'aside_slide_left' : 'aside_slide_right'">
          <div class="content" :class="activeAside ? 'fade_in' : 'fade_out'">

            <header>
              <a href="#"><i class="far fa-user-circle"></i></a>
              <span>name utente</span>
            </header>

            <main>
              <h3></h3>
              <ul class="list-unstyled">
                <li class="my-5">
                  <a href="#">
                    <i class="fas fa-home"></i>
                    <small>Home</small>
                  </a>
                </li>
                <li class="my-5">
                  <a href="#">
                    <i class="fas fa-pizza-slice"></i>
                    <small>Prodotti</small>
                  </a>
                </li>
                <li class="my-5">
                  <a href="#">
                    <i class="far fa-chart-bar"></i>
                    <small>Ordini</small>
                  </a>
                </li>

              </ul>
            </main>
          </div>
        </aside>

       {{-- burgericon --}}
      <a id="burgerIcon" @click="toggleShow" :class="activeAside ? 'active' : '' "><i></i></a>

    </div>
  </div>


  <script src="{{ asset("js/partials/layouts/backend.js") }}" charset="utf-8"></script>
</body>
</html>
