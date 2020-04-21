@extends('layout')

@section('content')
@inject('EditControllerProvider', 'App\Http\Controllers\EditController')

<form action="edit/article?id={{ $article['id'] }}" method="post">
    {{ csrf_field() }}
    <div class="row">
        <div class="col cels txt-center" >
            Titre
        </div>
        <div class="col cels">

            <input class="form-control" type="text" name="name" value="{{ $article['name'] }}" >
        </div>

        <div class="col cels txt-center">
            Etat
        </div>
        <div class="col cels">
            <select name="status" class="custom-select my-1 mr-sm-2">
                <option selected value="{{ $article['status'] }}">
                    {{ $EditControllerProvider::actualStatusName($article['status']) }}
                </option>
                <option value="{{ $EditControllerProvider::otherStatus($article['status']) }}">
                        {{ $EditControllerProvider::otherStatusName($article['status']) }}
                </option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col cels txt-center">
            Image
        </div>
        <div class="col cels">
            <input class="form-control" type="text" name="image" value="{{ $article['img'] }}" >
        </div>
    </div>

    <div class="row">
        <div class="col cels txt-center">
            Description
        </div>
        <div class="col cels">
            <textarea class="form-control" name="description" rows="3">{{ $article['description'] }}</textarea>
        </div>
    </div>

    <div class="row">
        <div class="col cels txt-center">
            Prix
        </div>
        <div class="col cels">
            <input class="form-control" type="number" min="1" step="any" name="price" min="-999999" max="999999" value="{{ $article['price'] }}"placeholder="Nombre décimal"/>
        </div>
        <div class="col cels txt-center">
            Temps de confection
        </div>
        <div class="col cels">
            <input class="form-control"  type="number" name="manufacture_time" min="-999999" max="999999"  value="{{ $article['manufacture_time'] }}" placeholder="Nombre entier" >
        </div>
    </div>

    <div class="row">
        <div class="col cels ">
            <button type="submit" class="btn btn-success btn-100">Mettre à jour</button>
        </div>
    </div>

</form>


@endsection
