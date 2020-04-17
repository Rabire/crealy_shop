<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Créaly</title>
  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      
    </head>

<body>
    <br />
    <div class="container box">
        <h3 text-align="center">Connectez-vous</h3><br />

        @if(isset(Auth::user()->email))
            <script>window.location="/main/successlogin";</script>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        <form method="post" action="{{ url('/main/checklogin') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleDropdownFormEmail2">Adresse Email</label>
                <input type="email" class="form-control" name="email" placeholder="email@example.com">
            </div>

            <div class="form-group">
                <label for="exampleDropdownFormPassword2">Mot de passe</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <button type="submit" name="login" class="btn btn-primary">Se connecter</button>
        </form>

    </div>
</body>

</html>

