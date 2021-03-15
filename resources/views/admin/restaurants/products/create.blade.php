@extends('layouts.backend')

@section('main')
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

    <form action="{{ route('admin.restaurants.products.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('POST')

      <div class="form-group">
        <label for="name">NOME</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name')}}">
      </div>
      
      <div class="form-group">
          <label for="image">IMMAGINE</label>
          <input accept="image/*" type="file" name="image" class="form-control" id="image" placeholder="aggiungi immagine">
      </div>

      <div class="form-group">
        <label for="description">DESCRIZIONE</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description')}}</textarea>
      </div>

      <div class="form-group">
        <label for="price">PRICE</label>
        <input class="form-control" type="text" name="price" id="price" value="{{ old('price') }}">
      </div>

      <div class="form-group">
        <label for="is_vegetarian">VEGETARIANO</label>
        <select class="form-control" name="is_vegetarian" id="is_vegetarian">
          <option {{ old('is_vegetarian') == 0  ? 'selected' : '' }} value="0">No</option>
          <option {{ old('is_vegetarian') == 1  ? 'selected' : '' }} value="1">Si</option>
        </select>
      </div>

      <div class="form-group">
        <label for="is_glutenfree">SENZA GLUTINE</label>
        <select class="form-control" name="is_glutenfree" id="is_glutenfree">
          <option {{ old('is_glutenfree') == 0 ? 'selected' : '' }} value="0">No</option>
          <option {{ old('is_glutenfree') == 1 ? 'selected' : '' }} value="1">Si</option>
        </select>
      </div>
      
      <button type="submit" class="btn btn-primary">SALVA</button>
    </form>
  </section>
@endsection

