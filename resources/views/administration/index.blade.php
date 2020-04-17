@extends('layout')

@section('content')


    @if(isset(Auth::user()->email))

    <div style="margin: 1%; ">
        <div class="row">
            <a href="coach_space.php" class="col-sm btn btn-danger" style="padding: 50px 0 50px 0;">
                Modifier le contenu du shop
            </a>
        </div>

        <br>

        <form>
            <div class="row">
                <div class="col">
                    Jours avant production
                </div>
                <div class="col">
                    <input class="form-control" type="number" name="registrationlimit" value="0" placeholder="Nombre entier" >
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </div>

            <hr>
            <a href="{{ url('/main/logout') }}">Se déconnecter</a>
        </div>
    </form>

    @else
        <script>window.location = "/login";</script>
    @endif

@endsection
