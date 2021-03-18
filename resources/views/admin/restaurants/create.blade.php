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
        <i class="fas fa-store"></i>
      </div>

      <form class="" action="{{ route('admin.restaurants.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")

        <label for="logo" class="create_add_image" title="aggiungi logo">
          <input type="file" accept="image/*" name="logo" id="logo">
          <i class="fas fa-file-image"></i>
        </label>

        <div class="create_product_input">
          <i class="fas fa-store"></i>
          <label for="name" class="mx-1 my-0">Nome</label>
          <input type="text" name="name" id="name" value="{{ old('name')}}" placeholder="Inserisci il nome del prodotto">
        </div>

        <div class="create_product_input">
          <i class="fas fa-id-card"></i>
          <label for="p_iva" class="mx-1 my-0">partia iva</label>
          <textarea name="p_iva" id="p_iva" placeholder="partita iva">{{ old('p_iva')}}</textarea>
        </div>

        <div class="create_product_input">
          <i class="fas fa-map-marker-alt"></i>
          <label for="address" class="mx-1 my-0">Indirizzo</label>
          <input type="text" name="address" id="address" value="{{ old('address') }}" placeholder="Inserisci l'indirizzo del tuo locale">
        </div>
        <div class="create_product_input">
          <i class="fas fa-phone"></i>
          <label for="phone" class="mx-1 my-0">Telefono</label>
          <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Inserisci il numero del tuo locale">
        </div>
        <div class="create_product_input">
          <select style=" width:100%" class="select_form_category" id="categories" name="categories[]" multiple>
            @foreach ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>  
        </div>  
        <input type="submit" id="submit" value="ADD" class="btn-submit">
      </form>
      
       
    </div>
  </section>
@endsection
