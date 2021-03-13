@extends('layouts.app')

@section('content')
  <section id="product_create" class="container my-3">
    <form action="{{ route('admin.restaurants.products.store') }}" method="post">
      @csrf
      @method('POST')

      <div class="form-group">
        <label for="name">NOME</label>
        <input class="form-control" type="text" name="name" id="name">
      </div>
      
      <div class="form-group">
        <label for="image">IMMAGINE</label>
        <input class="form-control" type="text" name="image" id="image">
      </div>

      <div class="form-group">
        <label for="description">DESCRIZIONE</label>
        <input class="form-control" type="text" name="description" id="description">
      </div>

      <div class="form-group">
        <label for="price">PRICE</label>
        <input class="form-control" type="text" name="price" id="price">
      </div>

      <div class="form-group">
        <label for="is_vegetarian">VEGETARIANO</label>
        <select class="form-control" name="is_vegetarian" id="">
          <option value="0">No</option>
          <option value="1">Si</option>
        </select>
      </div>

      <div class="form-group">
        <label for="is_glutenfree">SENZA GLUTINE</label>
        <select class="form-control" name="is_glutenfree" id="">
          <option value="0">No</option>
          <option value="1">Si</option>
        </select>
      </div>
      

      <button type="submit" class="btn btn-primary">SALVA</button>
    </form>
  </section>
@endsection

