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

        <link rel="icon" href="img/Crealy_Logo_Simple.ico" />

    </head>

    
    <style>
      .mainlogo {
        height: 80px;
      }

      .navbar-brand {
        padding-left: 5%;
      }

      .social-logo {
        height: 30px;
      }

      .navicon {
        height: 30px;
        padding-right: 5px;
        padding-left: 20px;
      }

      .allsocial {
        display: flex;
        justify-content: space-between;
        padding-right: 5%;
      }

      .navbar {
        display: flex;
        justify-content: space-between;
      }

      .nav-item:hover {
        text-decoration: underline;
      }


    </style>


    <body class="bg">
      
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="/"><img class="mainlogo" src="img\crealy_tipo.png" alt="Main logo"></a>
      
        <div class="navbar-nav">
          
            <div class="nav-item active">
              <a class="nav-link" href="/"><img class="navicon" src="img\icons8-niche-pour-chien-32.png" alt="navicon shop">Acceuil</a>
            </div>
            <div class="nav-item active">
              <a class="nav-link" href="shop"><img class="navicon" src="img\icons8-shopify-80.png" alt="navicon shop">Shop</a>
            </div>
            <div class="nav-item active">
              <a class="nav-link" href="contact"><img class="navicon" src="img\icons8-nouvelle-lettre-32.png" alt="navicon contact">Contact</a>
            </div>
        </div>

        <div class="allsocial">
          <div class="social">
            <a class="navbar-brand" href="https://www.instagram.com/crealy.handmade/"><img class="insta social-logo" src="img\icons8-instagram-26.png" alt="insta"></a>
          </div>

          <div class="social">
            <a class="navbar-brand" href="/"><img class="fb social-logo" src="img\icons8-facebook-24.png" alt="fb"></a>
          </div>
        </div>
          

      </nav>

      <br>

      <div class="container">
        @yield('content')
      </div>

    </body>
</html>
