@extends('layouts.guest')

@section('restaurant-main')
    <div id="menu-restaurant">

      {{-- BANNER CARRELLO--}}
      <div id="banner_exit_container" v-if="activeBanner" style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; width: 100%; height: 100%">
        <div class="banner_box">
          <h2>Banner carrello da stilizzare</h2>
          <a href="{{ route("home") }}" name="button">SI</a>
          <button type="button" name="button" @click="activeBanner = false">NO</button>
        </div>
      </div>

      <div id="menu_hero_img_container">
        <img src="https://bikanersweetsandrestaurant.ca/wp-content/uploads/2019/08/indiancocktails_social.jpg" alt="" :style="heroStatus ? 'opacity: 0.8' : 'opacity: 1'">
        <div class="layover_hero">

        </div>
      </div>
      <div class="container-menu-main">
        <div class="menu_container container">

          <div id="menu_left">

            {{-- SEZIONE INFORMAZIONI RISTORANTE --}}
            <div class="menu_info" :style="heroStatus ? 'height: 150px' : 'height: 250px'">
              <div class="menu_info_container" >
              </div>
              <h2>@{{restaurant.name}}</h2>
            </div>

            {{-- sezione contenente piatti , scrollabile --}}
            <div class="menu_item_sections_container">

              {{-- singolo piatto --}}
              <div class="menu_plate" v-for="(plate, index) in menu">

                <div class="menu_img">
                  <img :src="plate.image" alt="">
                </div>
                <h3>@{{plate.name}}</h3>
                <p>@{{plate.description}}</p>
                <div class="plate_price_add">
                  <span class="plate_infos" id="plate_price">@{{plate.price.toFixed(2)}}€</span>
                  <span class="plate_infos" id="plate_add_cart" @click="addToCart(index)"><i class="fas fa-shopping-cart"></i>
                  </span>
                </div>
              </div>

            </div>

          </div>

          {{-- Container del carrello --}}
          <div id="menu_cart">

            {{-- CARRELLO --}}
            <div id="cart">
              <h3>Il tuo ordine</h3>
              <span><img src="{{ asset('img/store-delivery-light.svg') }}" alt=""></span>
              <ul id="cart_order_items">
                <div id="cart_order_placeholder_container" v-if="cartProducts.length == 0">
                  <img src="{{ asset('img/astronaut-disabled.svg') }}" alt="">
                </div>
                <li v-if='cartProducts.length != 0' v-for="(product, index) in cartProducts">
                  <div class="order_item_top">
                    <span>@{{ product.counter }}x</span>
                    <p>@{{ product.name }}</p>
                    <span>@{{ (product.price * product.counter).toFixed(2) }}€</span>
                  </div>
                  <div class="order_item_bottom">
                    <span @click="decrementCounter(index)"><i class="fas fa-minus"></i></span>
                    <span @click="incrementCounter(index)"><i class="fas fa-plus"></i></span>
                  </div>
                </li>
                {{-- test per grafica da cancellare li --}}
                {{-- <li id="test_cart_item">
                  <div class="order_item_top">
                    <span>999 x</span>
                    <p>asasasasasa</p>
                    <span>1000 €</span>
                  </div>
                  <div class="order_item_bottom">
                    <span @click="decrementCounter(index)"><i class="fas fa-minus"></i></span>
                    <span @click="incrementCounter(index)"><i class="fas fa-plus"></i></span>
                  </div>
                </li> --}}
                {{-- test per grafica da cancellare li --}}
                {{-- test per grafica da cancellare li --}}
                {{-- <li id="test_cart_item">
                  <div class="order_item_top">
                    <span>999 x</span>
                    <p>asasasasasaaasasasasasasasa</p>
                    <span>1000 €</span>
                  </div>
                  <div class="order_item_bottom">
                    <span @click="decrementCounter(index)"><i class="fas fa-minus"></i></span>
                    <span @click="incrementCounter(index)"><i class="fas fa-plus"></i></span>
                  </div>
                </li> --}}
                {{-- test per grafica da cancellare li --}}
              </ul>
              <div id="container_button_cart" v-if="cartProducts.length != 0">
                <span id="button_cart" @click="clearCart()">Vai al pagamento</span>
              </div>
            </div>

          </div>

        </div>
      </div>

    </div>
@endsection

@section("page-guest-script")
  <script src="{{ asset("js/partials/guest/menu-restaurant.js") }}" charset="utf-8"></script>
@endsection
