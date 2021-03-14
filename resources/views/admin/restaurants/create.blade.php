@extends('layouts.app')

@section("page-script")
  {{ asset("js/partials/restaurants/create.js") }}
@endsection

@section('content')

  <section id="restaurant_form">
          
    <div class="container">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form class="" action="{{ route('admin.restaurants.store') }}" method="post">
      @csrf
      @method('POST')

        <div class="box animate__animated animate__slideInRight" v-for="(question, index) in questions" v-if="question.active">
          <div class="input_container">
            <i :class="question.icon"></i>
            <input type="text" :name="question.name" value="" :placeholder="question.placeholder" v-model="question.userInput" required>
            <button type="button" @click="activeNextQuestion(index)"><i class="fab fa-angellist"></i></button>
            <i class="fas fa-check mx-3" :style="question.checked ? 'opacity: 1' : 'opacity: 0'"></i>
          </div>
        </div>

        <select class="" id="categories" name="categories[]" multiple>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
          @endforeach
        </select>

        <button type="submit" name="button">Registrati</button>
      </form>
    </div>
  </section>
 {{-- v-if="question != questions[questions.length - 1]"  --}}
@endsection
