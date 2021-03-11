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
        <h2>@{{ question.text }}</h2>
        <input class="form-control" type="text" name="address" class="form-control" id="address">

        <button v-if="question != customerQuestions[customerQuestions.length - 1]" type="button" name="button" @click="nextQuestion(index)">Avanti</button>
        <button v-else type="submit" name="button">Fine</button>
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
