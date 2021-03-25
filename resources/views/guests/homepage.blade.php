@extends("../layouts.guest")

@section("guest-main")
<div id="main_home_page_guest">

  <div id="main_home_page_top" >
    <div class="main_title animate__animated animate__fadeIn">
      <h1>Ordina con Comodo</h1>
      <h3>consegne in un razzo!</h3>
    </div>


    <img id="razzo" class="animate__animated animate__bounceInLeft"  src="{{asset("img/rider2.png")}}" alt="">

    {{-- ricerca delle categorie per LG --}}
    <div class="contenitore_di_tutto_il_casino" :class="isChecked ? 'active' : ''">
      <nav class="menu">
        <input class="menu-toggler" type="checkbox" v-model="isChecked" @click="checked()">
        <ul>

          <li class="menu-item" v-for="(category, index) in categories" :title="category.name" v-on:click="getRestaurantsByCategory(index)">
            <a href="#">
              <img :src="category.image" alt="" style="width: 50px; height: 50px">
              <span>@{{ category.name }}</span>
            </a>
          </li>

        <li class="menu-item gadget_button_category text-center" :class="isChecked ? '' : 'blob'">
          <a href="#">
            <img src="{{ asset("img/categories/backpack.png") }}" alt="" style="width: 50px; height: 50px">
          </a>
        </li>

        </ul>
      </nav>
    </div>

    {{-- Ricerca delle categorie in MD --}}
    {{-- <div class="md_category_selection">
      <ul class="list-unstyled md_list_category">
        <li class="md_item_category" v-for="(category, index) in categories" :title="category.name" v-on:click="getRestaurantsByCategory(index)">
          <a href="#">
            <img :src="category.image" alt="">

          </a>
        </li>
      </ul>
    </div> --}}
    {{-- CAROSELLO DI IMMAGINI --}}
    <div id="carousel">
      <i class="fas fa-angle-left" @click="prevCategory"></i>
      <div class="carousel_box" v-show="index == indexCarousel" v-for="(category, index) in categories" @click='getRestaurantsByCategory(index)'>
        <img :src="category.image" :alt="category.name">
        <h4>@{{ category.name }}</h4>
      </div>
      <i class="fas fa-angle-right" @click="nextCategory"></i>
    </div>

    <div class="main_sub_title">
      <h2 class="text-center scroll">I nostri Ritoranti!</h2>
    </div>

  </div>

  {{-- Ristoranti ricercati --}}
  <div v-if="filteredRestaurants.length != 0" class="static_restaurants_home container-fluid">
    <ul class="static_restaurants_container">
      <a v-for="restaurant in filteredRestaurants" :href="`http://127.0.0.1:8000/restaurants/${restaurant.slug}`" class="animate__animated animate__backInDown">
        <li class="static_restaurant_card">
          <div class="static_restaurant_card_thumbnail_container">
            <img :src="restaurant.logo" alt="">
          </div>
          <div class="static_restaurant_card_info">
            <div class="static_restaurant_card_info_logo">
              <img :src="restaurant.logo" alt="">
            </div>
            <div class="static_restaurant_card_info_name">
              <p>@{{ restaurant.name }}</p>
            </div>
          </div>
        </li>
      </a>
    </ul>
  </div>

  <div v-else class="container-fluid static_restaurants_home">
    <ul class="animate__animated animate__fadeInUp static_restaurants_container">

      <li class="static_restaurant_card" v-for="(restaurant, index) in homeRestaurants">
        <a :href="`http://127.0.0.1:8000/restaurants/${restaurant.slug}`">
          <div class="static_restaurant_card_thumbnail_container">
            <img :src="restaurant.logo" alt="logo">
          </div>
          <div class="static_restaurant_card_info">
            <div class="static_restaurant_card_info_logo">
              <img :src="restaurant.logo" alt="logo">
            </div>
            <div class="static_restaurant_card_info_name">
              <p>@{{ restaurant.name }}</p>
            </div>
          </div>
        </a>
      </li>

    </ul>
  </div>
</div>


@endsection

@section("page-guest-script")
  <script src="{{ asset("js/partials/guest/homepage.js") }}" charset="utf-8"></script>
@endsection
