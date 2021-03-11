@extends('layouts.app')

@section('page-script')
  {{ asset("js/partials/questions.js") }}
@endsection


@section('content')
<section id="questions">
  <div class="container text-center">

    <form action="{{ route("customer.questions") }}" method="post">
      @csrf
      @method("POST")


      <div class="form-group animate__animated animate__slideInRight" v-for="(question, index) in customerQuestions" v-if="question.active" :class="question.classes" @keyup.enter="nextQuestion(index)">

        <div class="question">
          <h2 class="text-uppercase">@{{ question.text }}</h2>
          <input class="form-control text-center mb-3" type="text" name="address" id="address" v-model="userInput">
        </div>

        <transition name="fade">
          <div class="buttons" v-if="userInput != ''">
            <button v-if="question != customerQuestions[customerQuestions.length - 1]" type="button" name="button" @click="nextQuestion(index)">Avanti</button>
            <button v-else type="submit" name="button">Fine</button>
          </div>
        </transition>
      </div>

      {{-- <div class="form-group">
        <h2>Carta di credito</h2>
        <input class="form-control" type="text" name="credit_card" class="form-control" id="credit_card">
        <button type="submit" class="my-4">salva</button>
      </div> --}}

    </form>

  </div>
</section>
@endsection
