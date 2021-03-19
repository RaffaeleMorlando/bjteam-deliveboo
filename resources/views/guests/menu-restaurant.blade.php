@extends('layouts.guest')

@section('restaurant-main')
    <div id="menu-restaurant">

      <div id="menu_hero_img_container">
        <img src="https://bikanersweetsandrestaurant.ca/wp-content/uploads/2019/08/indiancocktails_social.jpg" alt="" :style="heroStatus ? 'opacity: 0.8' : 'opacity: 1'">
        <div class="layover_hero">

        </div>
      </div>
      <div class="container-menu-main">
        <div class="menu_container container">

          <div id="menu_left">

            {{-- SEZIONE INFORMAZIONI RISTORANTE --}}
            <div class="menu_info">
              <div class="menu_info_container">
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
                  <span>@{{plate.price}}€</span>
                  <span @click="addToCart(index)"><i class="fas fa-shopping-cart"></i>
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
                <li v-for="(product, index) in actualCart">
                  <div class="order_item_top">
                    <span>@{{ product.counter }}X</span>
                    <p>@{{ product.name }}</p>
                    <span>@{{ (product.price * product.counter).toFixed(2) }}€</span>
                  </div>
                  <div class="order_item_bottom">
                    <span @click="decrementCounter(index)"><i class="fas fa-minus"></i></span>
                    <span @click="incrementCounter(index)"><i class="fas fa-plus"></i></span>
                  </div>
                </li>
              </ul>
              <button @click="clearCart">PAGA</button>
            </div>

          </div>

        </div>
      </div>

    </div>
@endsection

@section("page-guest-script")
  <script src="{{ asset("js/partials/guest/menu-restaurant.js") }}" charset="utf-8"></script>
@endsection
