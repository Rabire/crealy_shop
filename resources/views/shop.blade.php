@extends('layout')

@section('content')

@inject('ShopControllerProvider', 'App\Http\Controllers\ShopController')


<style>
    .textWithBlurredBg{
        width: 500px;
        height: 500px;
        display: inline-block;
        position: relative;
        margin: 4px;
    }

    .textWithBlurredBg img{
        width:100%;
        height:100%;
        transition:.3s;
    }

    .textWithBlurredBg:hover img{
        filter:blur(2px) brightness(60%);
    }

    .textWithBlurredBg :not(img){
        position:absolute;
        z-index:1;
        top:30px;
        width:100%;
        text-align:center;
        color:#fff;
        opacity:0;
        transition:.3s;
    }

    .textWithBlurredBg p{
        top: 110px;
        width: 450px;
        margin-left: 25px;
        text-align: center;
    }

    .textWithBlurredBg a{
        top: 400px;
        width: 450px;
        margin-left: -475px;
        text-align: center;
    }

    .textWithBlurredBg i{
        top: 450px;
        width: 450px;
        margin-left: -475px;
        text-align: center;
    }

    .textWithBlurredBg h3{
        top: 360px;
        width: 450px;
        text-align: center;
    }

    .textWithBlurredBg:hover :not(img){
        opacity:1;
    }
</style>

<div style="text-align: center; justify-content: center;">
@foreach ($articles as $article)
    <div class="textWithBlurredBg">
        <img src="{{ $article['img'] }}">
        <h2>{{ $article['name'] }}</h2>
        <p>{{ $article['description'] }}</p>
        <h3 class="text-right align-text-bottom">{{ $article['price'] }} €</h3>
        <a class="btn btn-success" href="contact-existing_creation?article={{ $article['id'] }}" role="button">Commander le même !</a>
        <i>Recevez-le le {{ $ShopControllerProvider::availiableDate($article['id']) }}</i>
    </div>
@endforeach
</div>

@endsection

