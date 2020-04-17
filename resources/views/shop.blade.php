@extends('layout')

@section('content')

@inject('ShopControllerProvider', 'App\Http\Controllers\ShopController')

<div class="container">
    @foreach ($articles as $article)
        <div class="row" style="border-bottom: 1px solid #CCC;">
            <div class="col-8">
                <img width="100%" class="fit-picture" src="{{ $article['img'] }}" alt="{{ $article['name'] }} img">
            </div>
            <div class="col-4 bg-light text-center">
                <br>
                <h3 class="text-center">{{ $article['name'] }}</h3>
                <p class="text-justify">{{ $article['description'] }}</p>
                <h3 class="text-right align-text-bottom">{{ $article['price'] }} €</h3>
                <br>
                <button type="button" class="btn btn-success">Commander tout de suite !</button><br>
                <i>Disponible à partir du {{ $ShopControllerProvider::availiableDate($article['id']) }}</i>
                <br>
                <br>
            </div>
        </div>
        <br>
    @endforeach
</div>


@endsection

