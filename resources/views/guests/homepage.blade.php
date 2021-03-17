@extends("../layouts.guest")

@section("guest-main")
<div id="main_home_page_guest">
  <div id="jumbotron">
    {{-- sarà un bottone --}}
    <button @click="funzione">PROVA</button>
    <p>Consegne in
    <strong>Giovanni Battista Sammartini, 9</strong></p>
    <div id="container_categories">
      <div id="main_homepage_guest">
        <div id="search_by_categories" class="round_box">
          <img class="icon_category" src="{{asset('img\categories\search-flat.png')}}" alt="">
          <small>Search</small>
        </div>
      </div>
    </div>
    <img id="jumbotron_circle" src="{{asset('img/jumbotron_semicircle.svg')}}">
  </div>

 </div> 
 
@endsection

@section("page-guest-script")
  <script src="{{ asset("js/partials/guest/homepage.js") }}" charset="utf-8"></script>
@endsection
