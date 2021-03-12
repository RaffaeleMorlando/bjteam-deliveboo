<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
    <h1>questa è la index dei prodotti</h1>

    @foreach ($products as $product)
      <div>Nome: {{ $product->name }}</div>
      <div>descrizione: {{ $product->description }}</div>
      <div>prezzo: {{ $product->price }}</div>
      <div>immagine: <img style="width: 150px" src="{{ $product->image }}" alt="{{ $product->name }}"></div>
      <a class="d-block" href="{{route('admin.restaurants.products.show', $product->slug)}}">questo link porta alla show del prodotto</a>
      <br><hr>
      
        
    @endforeach


    <a href="{{route('admin.restaurants.dashboard')}}">torna indietro</a>


  
</body>
</html>