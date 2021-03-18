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
          <i class="fas fa-camera-retro"></i>
        </label>

        <div class="create_product_input">
           <div class="orange_icon_box">
            <i class="fas fa-store"></i>
        </div>
        <div class="small_green_box">
          <label for="name" class="mx-1 my-0">Nome</label>
        </div>  
          <input type="text" name="name" id="name" value="{{ old('name')}}" placeholder="Inserisci il nome del prodotto">
        </div>

        <div class="create_product_input">
          <div class="orange_icon_box">
            <i class="fas fa-id-card"></i>
          </div>  
          <div class="small_green_box">  
            <label for="p_iva" class="mx-1 my-0">partia iva</label>
          </div>  
          <input type="text" name="p_iva" id="p_iva" placeholder="partita iva" value="{{ old('p_iva')}}">
        </div>

        <div class="create_product_input">
           <div class="orange_icon_box">
              <i class="fas fa-map-marker-alt"></i>
           </div> 
          <div class="small_green_box">   
            <label for="address" class="mx-1 my-0">Indirizzo</label>
          </div>  
          <input type="text" name="address" id="address" value="{{ old('address') }}" placeholder="Inserisci l'indirizzo del tuo locale">
        </div>
        <div class="create_product_input">
          <div class="orange_icon_box">
            <i class="fas fa-phone"></i>
          </div>  
          <div class="small_green_box">   
            <label for="phone" class="mx-1 my-0">Telefono</label>
          </div>  
          <input type="text" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Inserisci il numero del tuo locale">
        </div>
        <div class="create_product_input">
          <select style=" width:100%; height:25px" class="select_form_category" id="categories" name="categories[]" multiple>
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
