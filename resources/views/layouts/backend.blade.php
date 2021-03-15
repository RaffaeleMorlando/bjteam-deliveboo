<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- bootstrap --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  {{-- my style --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
  <div id="background">
    <div id="backend" class="container-fluid">
        {{-- parte sinistra del layout --}}
        <main>
          <h2>titolo della main</h2>
        </main>

        {{-- parte destra del layout --}}
        <aside :class=" activeAside ? '' : 'slide-right' ">
          <header>
            <a href="#"><i class="far fa-user-circle"></i></a>
            <span>name utente</span>        
          </header>
        </aside>
       {{-- burgericon --}}
      <a id="burgerIcon" @click="toggleShow" :class="activeAside ? 'active' : '' "><i></i></a>
    </div>
  </div>


  <script src="{{ asset("js/partials/layouts/backend.js") }}" charset="utf-8"></script>
</body>
</html>
