@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hello CUSTOMER, You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
<form action="{{ route("customer.questions") }}" method="post">
  @csrf
  @method("POST")

  <div class="form-group">
    <h2>Indirizzo di casa?</h2>
    <input class="form-control" type="text" name="address" class="form-control" id="address">
  </div>

  <div class="form-group">
    <h2>Carta di credito</h2>
    <input class="form-control" type="text" name="credit_card" class="form-control" id="credit_card">
    <button type="submit">salva</button>
  </div>

</form>
@endsection
