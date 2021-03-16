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
            <div class="dashboard_item dashbord_order"><span>14:15</span> - Order n° #00001</div>
            <div class="dashboard_item dashbord_order"><span>20:00</span> - Order n° #00002</div>
            <div class="dashboard_item dashbord_order"><span>16:15</span> - Order n° #00003</div>
            <div class="dashboard_item dashbord_order"><span>23:20</span> - Order n° #00004</div>
            <div class="dashboard_item dashbord_order"><span>17:10</span> - Order n° #00005</div>
          </div>
        </li>
        <li class="dashboard_middle_card">
          <div class="dashboard_middle_card_icon">
            <p>Ultimi aggiornamenti menù</p>
          </div>
          <div class="dashboard_container_plates">
            <p class="dashboard_item">Pasta al Pomodoro</p>
            <p class="dashboard_item">Pasta al Pomodoro</p>
            <p class="dashboard_item">Pasta al Pomodoro</p>
            <p class="dashboard_item">Pasta al Pomodoro</p>
            <p class="dashboard_item">Pasta al Pomodoro</p>
            <p class="dashboard_item">Pasta al Pomodoro</p>
            <p class="dashboard_item">Pasta al Pomodoro</p>
          </div>
        </li>

      </ul>
    </div>

  </div>

@endsection
