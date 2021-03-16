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

    {{-- <form action="{{ route('admin.restaurants.products.store') }}" method="post" enctype="multipart/form-data">
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
    </form> --}}
    <div class="form_box">
      <div class="product_create_img">
        <img src="{{ asset("img/create-food.png") }}" alt="create-img">
      </div>

      <form class="" action="{{ route('admin.restaurants.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")

        <label for="image" class="create_add_image" title="add photo">
          <input type="file" accept="image/*" name="image" id="image">
          <i class="fas fa-pen"></i>
        </label>

        <div class="create_product_input">
          <i class="fas fa-hamburger"></i>
          <label for="name" class="mx-1 my-0">Nome</label>
          <input type="text" name="name" id="name" value="{{ old('name')}}" placeholder="Inserisci il nome del prodotto">
        </div>

        <div class="create_product_input">
          <i class="fas fa-align-left"></i>
          <label for="description" class="mx-1 my-0">Descrizione</label>
          <textarea name="description" id="description" placeholder="Descrizione prodotto">{{ old('description')}}</textarea>
        </div>

        <div class="create_product_input">
          <i class="fas fa-dollar-sign"></i>
          <label for="price" class="mx-1 my-0">Prezzo</label>
          <input type="text" name="price" id="price" value="{{ old('price') }}" placeholder="Prezzo (€)">
        </div>

        <div class="create_product_input">
          <div class="check_option">
            <i class="fas fa-carrot"></i>
            <label for="is_vegetarian" class="mx-1 my-0">Vegetariano</label>
            <input {{ old('is_vegetarian') == 1 ? 'checked' : '' }} type="checkbox" name="is_vegetarian" id="is_vegetarian" value="1">
          </div>

          <div class="check_option">
            <i class="fas fa-bread-slice"></i>
            <label for="is_glutenfree" class="mx-1 my-0">Gluten Free</label>
            <input {{ old('is_glutenfree') == 1 ? 'checked' : '' }} type="checkbox" name="is_glutenfree" id="is_glutenfree" value="1">
          </div>
        </div>

        <input type="submit" id="submit" value="ADD" class="btn-submit">
      </form>
    </div>
  </section>
@endsection
