@extends('layout')

@section('content')


    @if(isset(Auth::user()->email))

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

        <hr>

        <br><br>

        <div class="row">
            <div class="col-9" style="padding: 1%;">
                <h1 class="txt-center">Liste de produits du Shop</h1><br>
            </div>

            <div class="col-2" style="padding: 1%;">
                    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
                        <option selected value="1">Actifs</option>
                        <option value="2">Inactifs</option>
                        <option value="3">Tous</option>
                    </select>
                </div>
            </div>
            

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
                {{ $article['id'] }}
            </div>
            <div class="col bg-light text-dark cels">
                {{ $article['name'] }}
            </div>
            <div class="col-3 bg-light text-dark cels">
                {{ $article['price'] }}
            </div>
            <div class="col-3 bg-light text-dark cels">
                <button type="button" class="btn btn-success btn-100">Modifier cette ligne</button>
            </div>
        </div>
        @endforeach


        
        <br><br><hr>
        <a  style="color: red;" href="{{ url('/main/logout') }}">Se déconnecter</a>

    @else
        <script>window.location = "/login";</script>
    @endif

@endsection
