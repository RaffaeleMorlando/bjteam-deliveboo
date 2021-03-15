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
      <div class="row">

        {{-- parte sinistra del layout --}}
        <main class="col-xs-12 col-lg-10">
        </main>

        {{-- parte destra del layout --}}
        <aside class="col-lg-2">
          <header>
            <div class="left">
              <a href="#"><i class="far fa-user-circle"></i></a>
              <p>Nome utente</p>
            </div>

            <div class="right">
              <i class="fas fa-bars"></i>
            </div>

          </header>
        </aside>

      </div>
    </div>
  </div>


  <script src="{{ asset("js/partials/layouts/backend.js") }}" charset="utf-8"></script>
</body>
</html>
