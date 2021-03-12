@extends('layouts.app')

@section('content')

  <section id="restaurant_form">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('admin.restaurants.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="container">
          <h3>nome</h3>
          <input type="text" name="name" required>
          <h3>address</h3>
          <input type="text" name="address" required>
          <h3>p.iva</h3>
          <input type="text" name="p_iva" required>
          <h3>phone (123-123-1234)</h3>
          <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>

          <button type="submit">SALVA</button>
        </div>

      </form>
  </section>

@endsection