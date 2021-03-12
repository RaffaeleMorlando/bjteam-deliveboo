<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
 
  <div id="dashboard" class="container">
    <aside>
     <ul>
       <li><a href=""><i class="fas fa-home"></i></a></li>
       <li><a href=""><i class="fas fa-pizza-slice"></i>
       </a></li>
       <li><a href=""><i class="fas fa-chart-bar"></i>
       </a></li>
       <li><a href=""><i class="fas fa-cog"></i>
       </a></li>
       <li><a href=""><i class="fas fa-user-circle"></i>
       </a></li>
     </ul>
    </aside>

    <header>
      <h1>{{ $restaurant->name }}</h1>
    </header>
  </div> 

</body>
</html>l

