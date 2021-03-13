@extends('layouts.app')

@section('content')
  <section id="product_create" class="container my-3">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.restaurants.products.update', $product->id) }}" method="post">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">NOME</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}">
      </div>
      
      <div class="form-group">
        <label for="image">IMMAGINE</label>
        <input class="form-control" type="text" name="image" id="image" value="{{ $product->image }}">
      </div>

      <div class="form-group">
        <label for="description">DESCRIZIONE</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{  $product->description }}</textarea>
      </div>

      <div class="form-group">
        <label for="price">PRICE</label>
        <input class="form-control" type="text" name="price" id="price" value="{{ $product->price }}">
      </div>

      <div class="form-group">
        <label for="is_vegetarian">VEGETARIANO</label>
        <select class="form-control" name="is_vegetarian" id="">
          <option {{ $product->is_vegetarian === 0 ? 'selected' : '' }}  value="0">No</option>
          <option {{ $product->is_vegetarian === 1 ? 'selected' : '' }} value="1">Si</option>
        </select>
      </div>

      <div class="form-group">
        <label for="is_glutenfree">SENZA GLUTINE</label>
        <select class="form-control" name="is_glutenfree" id="">
          <option {{ $product->is_glutenfree === 0 ? 'selected' : '' }} value="0">No</option>
          <option {{ $product->is_glutenfree === 1 ? 'selected' : '' }} value="1">Si</option>
        </select>
      </div>
      
      <button type="submit" class="btn btn-primary">SALVA</button>
      <a href="{{ route('admin.restaurants.products.index') }}" class="btn btn-secondary">BACK</a>

    </form>

  </section>
@endsection

