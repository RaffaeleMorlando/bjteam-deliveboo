@extends('layouts.backend')

@section("main")
  <div id="dashboard_index">
    <div class="top">
      <h1>{{ $restaurant->name }}</h1>
      <img style="width: 100%" src="https://www.b-eat.it/sites/default/files/styles/slider/public/home/logo-ristorante.jpg?itok=N11NFXSR" class="img-fluid" alt="Responsive image">
    </div>

    <div class="bottom">
      {{-- DA CANCELLARE --}}
      <div class="card mt-4" style="width: 18rem;">
        <img class="card-img-top" src="https://www.tavolartegusto.it/wp/wp-content/uploads/2019/12/Spaghetti-vongole-e-bottarga-Ricetta-Spaghetti-vongole-e-bottarga-1280x720.jpg" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      {{-- DA CANCELLARE --}}
      <div class="card mt-4" style="width: 18rem;">
        <img class="card-img-top" src="https://www.tavolartegusto.it/wp/wp-content/uploads/2019/12/Spaghetti-vongole-e-bottarga-Ricetta-Spaghetti-vongole-e-bottarga-1280x720.jpg" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      {{-- DA CANCELLARE --}}
      <div class="card mt-4" style="width: 18rem;">
        <img class="card-img-top" src="https://www.tavolartegusto.it/wp/wp-content/uploads/2019/12/Spaghetti-vongole-e-bottarga-Ricetta-Spaghetti-vongole-e-bottarga-1280x720.jpg" alt="Card image cap">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
    </div>
  </div>

@endsection
