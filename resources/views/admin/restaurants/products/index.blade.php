@extends('layouts.backend')

@section('main')
  <h1>Dashboard Products</h1>
    {{--
      Message = Creazione con successo
      Success = Edit con successo
     --}}

    @if (session('message'))
      <div class="alert alert-success">
          {{ session('message') }}
      </div>
    @endif

    <h1>{{ Auth::user()->restaurant->name }}</h1>
    @foreach (Auth::user()->restaurant->categories as $category)
      <span class="badge badge-info">{{ $category->name }}</span>
    @endforeach


    <table class="table table-dark table-striped table-bordered">
      <thead>
        <th>Nome piatto</th>
        <th>Descrizione</th>
        <th>Immagine</th>
        <th>Prezzo</th>
        <th>Vegetariano</th>
        <th>Senza glutine</th>
        <th colspan="3"></th>
      </thead>

      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td><img src="{{ $product->image }}" alt="" style="width: 100px"></td>
            <td>{{ number_format($product->price, 2). ' €' }}</td>
            <td>{{ $product->is_vegetarian == 0 ? 'No' : 'Si' }}</td>
            <td>{{ $product->is_glutenfree == 0 ? 'No' : 'Si' }}</td>
            <td>
              <a class="btn btn-primary" href="{{ route('admin.restaurants.products.show', $product->slug) }}">Dettaglio</a>
            </td>
            <td>
              <a class="btn btn-primary" href="{{ route('admin.restaurants.products.edit', $product->id) }}">Modifica</a>
            </td>
            <td>
              <form action="{{ route('admin.restaurants.products.destroy',$product) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" onclick="return confirm('Sei sicuro di voler cancellare: {{ $product->name}}?')">Elimina</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <a class="btn btn-primary" href="{{ route('admin.restaurants.products.create') }}">CREA</a>
    <a class="btn btn-danger" href="{{ route('admin.restaurants.dashboard') }}">BACK</a>

@endsection
