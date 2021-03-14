@extends('layouts.app')
@section('content')
  <div class="mt-5 container">
    <table class="table table-dark table-striped table-bordered">
      <tbody>
        <tr>
          <th scope="row">Immagine</th>
          <td><img height="180px" src="{{$product->image ? $product->image : "https://www.food4fuel.com/wp-content/uploads/woocommerce-placeholder-600x600.png"}}" alt="{{$product->name}}"></td>
        </tr>
        <tr>
          <th scope="row">Nome piatto</th>
          <td>{{$product->name}}</td>
        </tr>
        <tr>
          <th scope="row">Ingredienti</th>
          <td>{{$product->description}}</td>
        </tr>
        <tr>
          <th scope="row">Prezzo</th>
          <td>{{number_format($product->price, 2). ' €'}}</td>
        </tr>
        <tr>
          <th>Vegetariano</th>
          <td>{{$product->is_vegetarian ? "SI" : "NO"}}</td>
        </tr>
        <tr>
          <th>Senza Glutine</th>
          <td>{{$product->is_glutenfree ? "SI" : "NO"}}</td>
        </tr>
        <tr>
          <th>Creato il</th>
          <td>{{$product->created_at->format('d-m-Y')}}</td>
        </tr>
        <tr>
          <td><a class="btn btn-warning" href="{{route('admin.restaurants.products.edit', $product->id)}}">Modifica</a></td>
          <td><a class="btn btn-info" href="{{route('admin.restaurants.products.index')}}">Tutti i prodotti</a></td>
        </tr>
        
      
      </tbody>
    </div> 

@endsection