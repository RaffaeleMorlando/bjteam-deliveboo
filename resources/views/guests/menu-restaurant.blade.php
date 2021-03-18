@extends('layouts.guest')

@section('restaurant-main')

    <div id="menu_hero_img_container">
        <img src="https://bikanersweetsandrestaurant.ca/wp-content/uploads/2019/08/indiancocktails_social.jpg" alt="">
        <div class="layover_hero">

        </div>
    </div>
    <div class="container-menu-main">
        <div class="menu_container container">
            <div id="menu_left">
                <div class="menu_item">
                    <h1>Nome Ristorante</h1>
                </div>
            </div>
            <div id="menu_cart">
                <div id="cart">
                    <h3>Il tuo ordine</h3>
                    {{-- <span><i class="fas fa-cart-plus"></i></span> --}}
                    <span><img src="{{ asset('img/store-delivery-light.svg') }}" alt=""></span>
                    <ul id="cart_order_items">
                        <li>
                            <div class="order_item_top">
                                <span>count</span>
                                <p>Pasta al sugo di pomodoro di olive e capperi sotto sale</p>
                                <span>price</span>
                            </div>
                            <div class="order_item_bottom">
                                <span><i class="fas fa-minus"></i></span>
                                <span><i class="fas fa-plus"></i></span>
                            </div>
                        </li>
                        <li>
                            <p>Pasta al sugo di pomodoro di olive e capperi sotto sale</p>
                        </li>
                        <li>
                            <p>Pasta al sugo di pomodoro di olive e capperi sotto sale</p>
                        </li>
                        <li>
                            <p>Pasta al sugo di pomodoro di olive e capperi sotto sale</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection