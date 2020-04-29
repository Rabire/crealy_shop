@extends('administration\adminlayout')

@section('content')

@if (\Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
      </div>
@endif

<form action="submit_article" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col cels txt-center" >
            Titre
        </div>
        <div class="col cels">
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Nom de ta nouvelle création" >
        </div>
        @error('name') <span class="invalid-feedback">Tu ne donnes pas de nom à ton produit ?</span> @enderror
    </div>

    <div class="row">
        <div class="col cels txt-center">
            Image
        </div>
        <div class="col cels">
            <input class="form-control @error('image') is-invalid @enderror" type="text" name="image" placeholder="URL de l'image" >
        </div>
        @error('image') <span class="invalid-feedback">A quoi resemble ton produit</span> @enderror
    </div>

    <div class="row">
        <div class="col cels txt-center">
            Description
        </div>
        <div class="col cels">
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Décris ta création" ></textarea>
        </div>
        @error('description') <span class="invalid-feedback">Fais un effort, decris-moi ta création</span> @enderror
    </div>

    <div class="row">
        <div class="col cels txt-center">
            Prix
        </div>
        <div class="col cels">
            <input class="form-control @error('price') is-invalid @enderror" type="number" name="price" placeholder="Nombre décimal"/>
        </div>
        @error('price') <span class="invalid-feedback">Tu l'offre ?</span> @enderror

        <div class="col cels txt-center">
            Temps de confection
        </div>
        <div class="col cels">
            <input class="form-control @error('manufacture_time') is-invalid @enderror"  type="number" name="manufacture_time" placeholder="Nombre entier" >
        </div>
        @error('manufacture_time') <span class="invalid-feedback">Combien de temps met-tu as créer ce truc</span> @enderror
    </div>

    <div class="row">
        <div class="col cels ">
            <button type="submit" class="btn btn-success btn-100">Créer et mettre en ligne !</button>
        </div>
    </div>

</form>


@endsection
