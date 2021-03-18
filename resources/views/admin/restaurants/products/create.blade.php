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

    <div class="form_box">
      <div class="product_create_img">
        {{-- <img src="{{ asset("img/create-food.png") }}" alt="create-img"> --}}
        <i class="fas fa-hotdog"></i>
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
