
@extends('admin.restaurants.dashboard')
@section('central-content-dashboard')
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <img class="card-img-top" src="{{$product->image ? $product->image : "https://p.kindpng.com/picc/s/79-798754_hoteles-y-centros-vacacionales-dish-placeholder-hd-png.png"}}" alt="{{$product->name}}">
    <h5 class="card-title"> {{$product->name}}</h5>
    <p class="card-text">{{$product->description}}</p>
    <p class="card-text">prezzo: {{$product->price}} €</p>
    <p class="card-text">vegetariano: {{$product->is_vegetarian ? "si" : "no"}}</p>
    <p class="card-text">Senza Glutine: {{$product->is_glutenfree ? "si" : "no"}}</p>
    <div class="card-body">
      <a href="{{route('admin.restaurants.products.edit', $product->id)}}" class="btn btn-warning card-link">Modifica</a>
    </div>
  </div>
 
</div>
@endsection