@extends('layouts.backend')

@section('main')
  <h1 class="title-products">Il mio menù</h1>
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


  <div class="container-fluid">
    <div class="row">
      @foreach ($products as $product)
        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card">
            <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p>{{ substr($product->description, 0, 20).'...' }}</p>
              <a href="{{ route('admin.restaurants.products.show', $product->slug) }}" class="btn btn-primary">Dettaglio</a>
            </div>
          </div>
        </div>
        
      @endforeach
    </div>
  </div>

    



    <a class="btn btn-primary" href="{{ route('admin.restaurants.products.create') }}">Aggiungi un nuovo piatto</a>
    <a class="btn btn-danger" href="{{ route('admin.restaurants.dashboard') }}">BACK</a>

@endsection
