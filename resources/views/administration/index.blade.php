@extends('administration\adminlayout')

@section('content')


    @if (\Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <hr>
    
    <form action="config/setdelay" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col txt-center">
                <label class="txt-center">Jours avant production</label>
            </div>
            <div class="col">
                <input class="form-control" type="number" name="delay" value="{{ $general_infos['delay'] }}" placeholder="Nombre entier" >
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success btn-100">Mettre à jour</button>
            </div>
        </div>

    </form>

    <hr><br>
    
    <form action="adminlistefilter" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-9 txt-center">
                <h1 class="txt-center">Liste de produits du Shop</h1>
            </div>

            <div class="col" style="padding: 1%;">
                <select name="filter" class="custom-select my-1 mr-sm-2">
                    <option selected value="3">Tous</option>
                    <option value="0">Inactifs</option>
                    <option value="1">Actifs</option>
                </select>
            </div>
            
            <div class="col">
                <button type="submit" class="btn btn-success btn-100">!</button>
            </div>
        </div>

    </form>
    <br>

    <div class="col">
        <a href="add_article" class="btn btn-primary">Ajouter une création</a>
        <a href="messages" class="btn btn-primary">Liste des messages</a>
    </div>
    <br>

    <div class="row header-row">
        <div class="col-1 bg-dark text-white cels">
            #
        </div>
        <div class="col bg-dark text-white cels">
            Produit
        </div>
        <div class="col-3 bg-dark text-white cels">
            Prix
        </div>
        <div class="col-3 bg-dark text-white cels">
            Bouton
        </div>
    </div>
    @foreach ($articles as $article)
    <div class="row header-row">
        <div class="col-1 bg-light text-dark cels">
            <span class="txt-center">{{ $article['id'] }}</span>
        </div>
        <div class="col bg-light text-dark cels">
            <span class="txt-center">{{ $article['name'] }}</span>
        </div>
        <div class="col-3 bg-light text-dark cels">
            <span class="txt-center">{{ $article['price'] }} €</span>
        </div>
        <div class="col-3 bg-light text-dark cels">
            <a href="edit?id={{ $article['id'] }}"><button type="button" class="btn btn-outline-success btn-100">Modifier</button></a>
        </div>
    </div>
    @endforeach


    
    <br><br><hr>
    <a style="color: red;" href="{{ url('/main/logout') }}">Se déconnecter</a>



@endsection
