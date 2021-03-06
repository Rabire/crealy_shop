<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Créaly</title>
  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        

    </head>

    <body class="bg">
        <div class="container">
            <br>

            <div class="text-center">
                <img src="img/crealy_floquage.png"  height=200px alt="Logo">
            </div>
            <br>
            <ul class="nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link" href="/welcome">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/shop">Shop</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/about">À propos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/contact">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/admin">Admin</a>
              </li>
            </ul>
            <br>

              @if(isset(Auth::user()->email))
                @yield('content')
              @else
                <script>window.location = "/login";</script>
              @endif

        </div>
    </body>
</html>
