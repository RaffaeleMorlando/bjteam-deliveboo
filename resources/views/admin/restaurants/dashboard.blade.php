@extends('layouts.app')

@section('content')
  <section id="dashboard">
    <div class="container">
      <table class="table table-dark table-striped table-bordered">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Indirizzo</th>
            <th>Telefono</th>
            <th>P.Iva</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{{$restaurant->name}}</td>
            <td>{{$restaurant->address}}</td>
            <td>{{$restaurant->phone}}</td>
            <td>{{$restaurant->p_iva}}</td>
          </tr>
        </tbody>
      </table>

      <h1>{{$restaurant->name}}</h1>
      <a href="{{route('admin.restaurants.products.index')}}">Link ai prodotti</a>
      <a href="{{route('admin.restaurants.order.index')}}">Link agli Ordini</a>

    </div>
  </section>    
@endsection