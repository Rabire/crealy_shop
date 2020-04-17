@extends('layout')

@section('content')


    @if(isset(Auth::user()->email))

    <div style="margin: 1%; ">
        <hr>
        
        <form action="config/setdelay" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col">
                    Jours avant production
                </div>
                <div class="col">
                    <input class="form-control" type="number" name="delay" value="{{ $general_infos['delay'] }}" placeholder="Nombre entier" >
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
