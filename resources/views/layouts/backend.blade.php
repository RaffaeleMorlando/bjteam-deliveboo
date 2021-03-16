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

    {{-- FORM PER LA MODIFICA DEL RISTORANTE --}}
    <div class="dashboard_edit_restaurant_form" :style="editForm ? 'display: block' : ''">
      <div class="edit_content">
        <button type="button" name="button" @click="activeEditForm">Indietro</button>
      </div>
    </div>

    <div id="container_dashboard" class="container-fluid p-0">

        {{-- parte sinistra del layout --}}
        <main :class="activeAside ? 'main_slide_right' : 'main_slide_left'" id="dashboard_main">
          @yield('main')
        </main>

        {{-- parte destra del layout --}}
        <aside :class="activeAside ? 'aside_slide_left' : 'aside_slide_right'">

          <div class="content" :class="activeAside ? 'fade_in' : 'fade_out'">

            <div id="aside_top">
              <i class="far fa-user-circle"></i>
              <span id="name_admin">{{ Auth::user()->name }}</span>
            </div>

            <div id="aside_center">
              {{-- <h3>Pages</h3> --}}

              <ul id="route_list" class="list-unstyled">
                  <li class="my-5">
                    <a class="link-aside" href="{{ route('admin.restaurants.dashboard') }}">
                      <i class="fas fa-home dashboard-icon"></i>
                      <small>Home</small>
                    </a>
                  </li>
                <li class="my-5">
                  <a class="link-aside" href="{{ route('admin.restaurants.products.index') }}">
                    <i class="fas fa-pizza-slice dashboard-icon"></i>
                    <small>Prodotti</small>
                  </a>
                </li>
                <li class="my-5">
                  <a class="link-aside" href="{{ route('admin.restaurants.orders.index') }}">
                    <i class="far fa-chart-bar dashboard-icon"></i>
                    <small>Ordini</small>
                  </a>
                </li>

              </ul>

              <div id="settings_dashboard" class="text-center">
                <a href="#" @click="toggleSettings">
                  <span>SETTINGS</span>
                  <i class="fas fa-chevron-down"></i>
                </a>

                {{-- mostra/nascondi li dei settings --}}
                <transition name="slide">
                  <ul class="setting_list list-unstyled" v-if="activeSettings">
                    <li class="my-3">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST">
                          @csrf
                      </form>
                    </li>
                    <li class="my-3">
                      <a href="#" @click="activeEditForm">Modifca profilo</a>
                    </li>
                  </ul>
                </transition>

              </div>

            </div>
          </div>

          <div class="image_curve"></div>
        </aside>

       {{-- burgericon --}}
      <a id="burgerIcon" @click="toggleShow" :class="activeAside ? 'active' : '' "><i></i></a>
      {{-- box con il form per editare le informazioni del ristorante --}}


    </div>
  </div>

  <script src="{{ asset("js/partials/layouts/backend.js") }}" charset="utf-8"></script>
</body>
</html>
