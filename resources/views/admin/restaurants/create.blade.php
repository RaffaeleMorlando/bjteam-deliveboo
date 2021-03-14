@extends('layouts.app')

@section("page-script")
  {{ asset("js/partials/restaurants/create.js") }}
@endsection

@section('content')

  <section id="restaurant_form">
      {{-- @if ($errors->any())
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
          <input type="email" name="address" required>
          <h3>p.iva</h3>
          <input type="text" name="p_iva" required>
          <h3>phone (123-123-1234)</h3>
          <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
          <h3>category</h3>
          <select name="category" id="category">
            @foreach ($categories as $category)
                <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          <button type="submit">SALVA</button>
        </div>

      </form> --}}
      <div class="container">
        <form class="" action="{{ route('admin.restaurants.store') }}" method="post">
        @csrf
        @method('POST')

          <div class="box animate__animated animate__slideInRight" v-for="(question, index) in questions" v-if="question.active">
            <div class="input_container">
              <i :class="question.icon"></i>
              <input type="text" :name="question.name" value="" :placeholder="question.placeholder" v-model="question.userInput" required>
              <button v-if="question != questions[questions.length - 1]" type="button" @click="activeNextQuestion(index)"><i class="fab fa-angellist"></i></button>
              <button v-else type="submit">Fine</button>
              <i class="fas fa-check mx-3" :style="question.checked ? 'opacity: 1' : 'opacity: 0'"></i>
            </div>
          </div>

          {{-- <div class="box"></div>
          <div class="box"></div>
          <div class="box"></div>
          <div class="box"></div>
          <div class="box"></div> --}}

        </form>
      </div>
  </section>

@endsection
