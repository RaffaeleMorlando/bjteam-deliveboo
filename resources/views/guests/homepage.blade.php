@extends("../layouts.guest")

@section("guest-main")
<div id="main_home_page_guest">
  
  <div id="main_home_page_top" >
    <div class="slogan animate__animated animate__zoomInDown">
      <h1>COMPRA SU COMODO</h1>
      <h3>Cerca il tuo ristorante preferito</h3>
    </div>
    
    
    <img id="razzo" class="animate__animated animate__bounceInLeft"  src="{{asset("img/rider2.png")}}" alt="">
 
    
    <div class="contenitore_di_tutto_il_casino" :class="isChecked ? 'active' : ''">
      <h3 v-if="visible" style="text-align: center; padding-top: 40px">Search for category</h3>
      <nav class="menu">
        <input class="menu-toggler" type="checkbox" v-model="isChecked" @click="checked()">
        {{-- <label for="menu-toggler"></label> --}}
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


  </div>

  {{-- Ristoranti ricercati --}}
  <div v-if="filteredRestaurants.length != 0" class="static_restaurants_home container scroll">
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

  <div v-else class="container static_restaurants_home">
    <ul class="animate__animated animate__fadeInUp static_restaurants_container">
      <li class="static_restaurant_card">
        <div class="static_restaurant_card_thumbnail_container">
          <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80" alt="">
        </div>
        <div class="static_restaurant_card_info">
          <div class="static_restaurant_card_info_logo">
            <img src="https://i.pinimg.com/originals/f8/8e/89/f88e898955530880794913f0efb38755.jpg" alt="">
          </div>
          <div class="static_restaurant_card_info_name">
            <p>Nome Ristorante</p>
          </div>
        </div>
      </li>


      <li class="static_restaurant_card">
        <div class="static_restaurant_card_thumbnail_container">
          <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80" alt="">
        </div>
        <div class="static_restaurant_card_info">
          <div class="static_restaurant_card_info_logo">
            <img src="https://i.pinimg.com/originals/f8/8e/89/f88e898955530880794913f0efb38755.jpg" alt="">
          </div>
          <div class="static_restaurant_card_info_name">
            <p>Nome Ristorante</p>
          </div>
        </div>
      </li>

      <li class="static_restaurant_card">
        <div class="static_restaurant_card_thumbnail_container">
          <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80" alt="">
        </div>
        <div class="static_restaurant_card_info">
          <div class="static_restaurant_card_info_logo">
            <img src="https://i.pinimg.com/originals/f8/8e/89/f88e898955530880794913f0efb38755.jpg" alt="">
          </div>
          <div class="static_restaurant_card_info_name">
            <p>Nome Ristorante</p>
          </div>
        </div>
      </li>

      <li class="static_restaurant_card">
        <div class="static_restaurant_card_thumbnail_container">
          <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80" alt="">
        </div>
        <div class="static_restaurant_card_info">
          <div class="static_restaurant_card_info_logo">
            <img src="https://i.pinimg.com/originals/f8/8e/89/f88e898955530880794913f0efb38755.jpg" alt="">
          </div>
          <div class="static_restaurant_card_info_name">
            <p>Nome Ristorante</p>
          </div>
        </div>
      </li>

      <li class="static_restaurant_card">
        <div class="static_restaurant_card_thumbnail_container">
          <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80" alt="">
        </div>
        <div class="static_restaurant_card_info">
          <div class="static_restaurant_card_info_logo">
            <img src="https://i.pinimg.com/originals/f8/8e/89/f88e898955530880794913f0efb38755.jpg" alt="">
          </div>
          <div class="static_restaurant_card_info_name">
            <p>Nome Ristorante</p>
          </div>
        </div>
      </li>

      <li class="static_restaurant_card">
        <div class="static_restaurant_card_thumbnail_container">
          <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1650&q=80" alt="">
        </div>
        <div class="static_restaurant_card_info">
          <div class="static_restaurant_card_info_logo">
            <img src="https://i.pinimg.com/originals/f8/8e/89/f88e898955530880794913f0efb38755.jpg" alt="">
          </div>
          <div class="static_restaurant_card_info_name">
            <p>Nome Ristorante</p>
          </div>
        </div>
      </li>

    </ul>
  </div>
</div>


@endsection

@section("page-guest-script")
  <script src="{{ asset("js/partials/guest/homepage.js") }}" charset="utf-8"></script>
@endsection
