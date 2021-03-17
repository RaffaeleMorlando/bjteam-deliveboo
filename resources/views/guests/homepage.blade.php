@extends("../layouts.guest")

@section("guest-main")
<div id="main_home_page_guest">
  <div id="main_home_page_top">
    <div class="contenitore_di_tutto_il_casino">
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
         
          
          
        <li class="menu-item gadget_button_category">
          <a href="#"></a>
        </li>
  
        </ul>
      </nav>
    </div>
  
    
  </div>
  
  {{-- Ristoranti ricercati --}}
  <div class="searched_restaurants_container">
    <a v-for="restaurant in searchedRestaurants" :href="`http://127.0.0.1:8000/restaurants/${restaurant.slug}`" class="animate__animated animate__fadeInDown">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" :src="restaurant.logo">
        <div class="card-body">
          <h2 class="card-text">@{{ restaurant.name }}</h2>
        </div>
      </div>
    </a>
  </div>
</div>


@endsection

@section("page-guest-script")
  <script src="{{ asset("js/partials/guest/homepage.js") }}" charset="utf-8"></script>
@endsection
