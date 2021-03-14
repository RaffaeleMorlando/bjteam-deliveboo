<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>

  <div id="dashboard">
    <aside class="">

    </aside>

    <main>
      <header>
        @if (!Auth::user()->restaurant->logo)
          <img src="{{ asset("img/default-avatar.jpg") }}" alt="avatar" style="width: 50px; height: 50px; border-radius: 50%">
        @else
          <img style="width: 50px; height: 50px; border-radius: 50%" src="{{ asset("storage/".Auth::user()->restaurant->logo) }}" alt="">
        @endif

        <form class="" action="{{ route("admin.restaurants.dashboard.logo", Auth::user()->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method("PUT")

          <input type="file" name="logo" accept="image/*">

          <input type="submit" value="save">
        </form>

        <h1>{{ $restaurant->name }}</h1>
        @foreach ($restaurant->categories as $category)
            <span class="badge badge-info">{{ $category->name }}</span>
        @endforeach
      </header>

      <section class="bottom">
        <div class="left">
          <a class="btn btn-primary" href="{{ route('admin.restaurants.products.index') }}">PRODOTTI</a>
        </div>
        <div class="right">

        </div>
      </section>

    </main>
  </div>

</body>
</html>
