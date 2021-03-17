@extends("../layouts.guest")

@section("guest-main")
<div id="main_home_page_guest">
  <div class="contenitore_di_tutto_il_casino">
    <nav class="menu">
      <input checked="checked" class="menu-toggler" type="checkbox">
      {{-- <label for="menu-toggler"></label> --}}
      <ul>
        <li class="menu-item">
          <a class="fas fa-cat" href=""></a>
        </li>
        <li class="menu-item">
          <a class="fas fa-cookie-bite" href="#"></a>
        </li>
        <li class="menu-item">
          <a class="fab fa-earlybirds" href="#"></a>
        </li>
        <li class="menu-item">
          <a class="fab fa-fly"href="#"></a>
        </li>
        <li class="menu-item">
          <a class ="far fa-gem" href="#"></a>
        </li>
        <li class="menu-item">
          <a class="fas fa-glass-cheers" href="#"></a>
        </li>
            <li class="menu-item">
          <a class="fas fa-glass-cheers" href="#"></a>
        </li>
            </li>
            <li class="menu-item">
          <a class="fas fa-glass-cheers" href="#"></a>
        </li>
          </li>
            <li class="menu-item">
          <a class="fas fa-glass-cheers" href="#"></a>
        </li>
        </li>
            <li class="menu-item">
          <a class="fas fa-glass-cheers" href="#"></a>
        </li>
        </li>
            <li class="menu-item">
          <a class="fas fa-glass-cheers" href="#"></a>
        </li>
      </li>
      <li class="menu-item gadget_button_category">
        <a class="fas fa-glass-cheers" href="#"></a>
      </li>

      </ul>
    </nav>
  </div>
</div>

@endsection

@section("page-guest-script")
  <script src="{{ asset("js/partials/guest/homepage.js") }}" charset="utf-8"></script>
@endsection
