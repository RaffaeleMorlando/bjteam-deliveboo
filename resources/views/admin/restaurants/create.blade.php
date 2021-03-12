@extends('layouts.app')

@section('content')
  
  <section id="restaurant_form">
      <form action="{{ route('admin.restaurants.store') }}" method="post">
        @csrf
        @method('POST')
        <input type="text" name="name">
        <input type="text" name="address">
        <input type="text" name="p_iva">
        <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
       required>

        <button type="submit">SALVA</button>
      </form>
  </section>

@endsection