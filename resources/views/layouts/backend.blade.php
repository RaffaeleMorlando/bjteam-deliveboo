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
    <div class="dashboard_edit_restaurant_form" :style="editForm ? 'display: block' : 'display: none'">
      <div class="form_box">

        <div class="product_create_img" v-if="url == null">
          @if($restaurant->logo)
            <img src="{{ $restaurant->logo }}" alt="product-image">
          @else
            <i class="fas fa-hotdog"></i>
          @endif
        </div>

        <div class="product_create_img" v-else>
            <img :src="url" alt="product-image">
        </div>

        {{-- rettangolo verde che contiene il nome della sezione --}}
        <div class="product_name_green_box text-center">
          <p>Modifica informazioni ristorante</p>
        </div>

        <form class="px-3" action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method("PUT")

          <label for="logo" class="create_add_image" title="add photo">
            <input type="file" accept="image/*" name="logo" id="logo" @change="onFileChange">
            <i class="fas fa-camera-retro"></i>
          </label>

          <div class="create_product_input">
            {{-- box arancione contente l'icona --}}
            <div class="orange_icon_box">
              <i class="fas fa-store"></i>
            </div>

            {{-- retangolo piccolo verde con la label --}}
            <div class="small_green_box">
              <label for="name" class="mx-1 my-0">Indirizzo</label>
            </div>
            <input type="text" name="name" id="name" value="{{ $restaurant->name }}" placeholder="Inserisci il nome del ristorante">
          </div>

          <div class="create_product_input">
            {{-- box arancione contente l'icona --}}
            <div class="orange_icon_box">
              <i class="fas fa-map-marker-alt"></i>
            </div>

            {{-- retangolo piccolo verde con la label --}}
            <div class="small_green_box">
              <label for="address" class="mx-1 my-0">Nome</label>
            </div>
            <input type="text" name="address" id="address" value="{{ $restaurant->address }}" placeholder="Inserisci l'indirizzo">
          </div>

          <div class="buttons_container">
            <input type="submit" id="submit" value="SAVE" class="btn-submit">
            <a href="#">
              <button type="button" class="btn_back" @click="activeEditForm">BACK</button>
            </a>
          </div>
        </form>
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
            @if(Auth::user()->restaurant)
            <div id="aside_center">
              {{-- <h3>Pages</h3> --}}

              <ul id="route_list" class="list-unstyled">
                  <li class="my-5">
                    <a class="link-aside" href="{{ route('admin.restaurants.dashboard') }}">
                      <i class="fas fa-user-lock"></i>
                      <small>Dashboard</small>
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

                <li class="my-5">
                  <a class="link-aside" href="{{ route('home') }}">
                    <i class="fas fa-home"></i>
                    <small>Home</small>
                  </a>
                </li>
              </ul>

              <div id="settings_dashboard_container" class="text-center">
                <a href="#" @click="toggleSettings">
                  <span id="settings_dashboard">SETTINGS</span>
                  <i class="fas fa-chevron-down" :class="activeSettings ? 'counterclockwise_180' : 'clockwise_180'"></i>
                </a>

                {{-- mostra/nascondi li dei settings --}}
                <transition name="slide">
                  <ul class="setting_list list-unstyled" v-if="activeSettings">
                    <li class="my-3">
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span>Log Out</span>
                        <i class="fas fa-sign-out-alt settings-icon mb-3"></i>
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST">
                          @csrf
                      </form>
                    </li>
                    <li class="my-3">
                      <a href="#" @click="activeEditForm">
                        <span>Modifca profilo</span>
                        <i class="fas fa-edit settings-icon mb-3"></i>
                      </a>
                    </li>
                  </ul>
                </transition>

              </div>

            </div>
            @endif
          </div>

          {{-- <div class="image_curve"></div> --}}
        </aside>


       {{-- burgericon --}}
      <a id="burgerIcon" @click="toggleShow" :class="activeAside ? 'active' : '' "><i></i></a>
      {{-- box con il form per editare le informazioni del ristorante --}}


    </div>
  </div>

  <script src="{{ asset("js/partials/layouts/backend.js") }}" charset="utf-8"></script>
</body>
</html>
