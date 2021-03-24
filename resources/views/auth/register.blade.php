@extends('layouts.guest')

@section('header-content')
<div  class="container">
  <ul id="container_buttons_log_reg" class="ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="button_log_reg">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="button_log_reg">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
        @endguest
  @endsection
  @section('guest-main')      
    <div class="container_form_login">
                    
          <form method="POST" id="register_form"  class="container" action="{{ route('register') }}">
              @csrf
               <img src="{{asset("img/logo_green.svg")}}" alt="Comodo">
              <div class="wrapper_input">  
                 
                  <div class="form-group">
                      <label class="label_none_md" for="name">{{ __('Name') }}</label>
                      <div id="box_input_credential">  
                          <input id="name" type="text" class="input_credential form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                      </div>   

                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                  

              <div class="form-group">
                  <label class="label_none_md"for="email">{{ __('E-Mail Address') }}</label>
                      <input id="email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
              </div>

              <div class="form-group">
                  <label class="label_none_md" for="password">{{ __('Password') }}</label>
                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
              </div>

              <div class="form-group">
                  <label class="label_none_md" for="password-confirm">{{ __('Confirm Password') }}</label>
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>

              <div class="form-group">
                  <div>
                      <button type="submit" id="register_btn_form" class="btn">
                          {{ __('Register') }}
                      </button>
                  </div>
              </div>
            </div>  
          </form>
               
            
        
    </div>
</div>
@endsection
