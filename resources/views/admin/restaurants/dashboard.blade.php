@extends('layouts.backend')

@section("main")
  <div id="dashboard_index" class="container">
 
    <div class="dashboard_top_section">

      <ul class="dashboard_top_container_cards">

        <li class="dashboard_top_card">
          <div class="dashboard_top_card_icon">
            <i class="fas fa-store"></i>
          </div>
          <p>{{$restaurant->name}}</p>
        </li>
        <li class="dashboard_top_card" id="first-child">
          <div class="dashboard_top_card_icon">
            <i class="fas fa-wallet"></i>
          </div>
        </li>
        <li class="dashboard_top_card">
          <div class="dashboard_top_card_icon">
            <i class="fas fa-map-marker-alt"></i>
          </div>
          <p>{{$restaurant->address}}</p>
        </li>

      </ul>

    </div>

    <div class="dashboard_middle_section">
      <ul class="dashboard_middle_container_cards">

        <li class="dashboard_middle_card" id="first-child">
          <div class="dashboard_middle_card_icon">
            <p>Ultimi Ordini</p>
          </div>
          <div class="dashboard_container_orders">
            <div class="dashboard_item dashbord_order"><span class="badge badge-success">14:15</span> - Order n° #00001</div>
            <div class="dashboard_item dashbord_order"><span class="badge badge-success">20:00</span> - Order n° #00002</div>
            <div class="dashboard_item dashbord_order"><span class="badge badge-success">16:15</span> - Order n° #00003</div>
            <div class="dashboard_item dashbord_order"><span class="badge badge-success">23:20</span> - Order n° #00004</div>
            <div class="dashboard_item dashbord_order"><span class="badge badge-success">17:10</span> - Order n° #00005</div>
          </div>
        </li>
        <li class="dashboard_middle_card">
          <div class="dashboard_middle_card_icon">
            <p>Ultimi aggiornamenti menù</p>
          </div>
          <div class="dashboard_container_plates">
            @foreach ($restaurant->products as $key => $product)
            @if($key == 0) 
            <p class="dashboard_item">{{$product->name}} <span class="badge badge-danger">new</span></p>
            @endif
            <p class="dashboard_item">{{$product->name}}</p>
            @endforeach
          </div>
        </li>

      </ul>
    </div>

  </div>

@endsection
