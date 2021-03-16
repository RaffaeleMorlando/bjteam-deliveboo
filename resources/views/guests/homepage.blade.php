@extends("../layouts.guest")

@section("page-guest-script")
  <script src="{{ asset("js/partials/guest/homepage.js") }}" charset="utf-8"></script>
@endsection

@section("guest-main")
  <div id="main_homepage_guest">
    <div id="search_by_categories" class="round_box">
    </div>
  </div>
@endsection
