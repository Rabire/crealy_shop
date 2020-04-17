@extends('layout')

@section('content')

    <div id="carouselAppdev" class="carousel slide" data-ride="carousel">

        <ol class="carousel-indicators">
        <li data-target="#carouselAppdev" data-slide-to="0" class="active"></li>
        <li data-target="#carouselAppdev" data-slide-to="1"></li>
        <li data-target="#carouselAppdev" data-slide-to="2"></li>
        <li data-target="#carouselAppdev" data-slide-to="3"></li>
        <li data-target="#carouselAppdev" data-slide-to="4"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://placehold.it/600x200" alt="1ère slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://placehold.it/600x250" alt="2ème slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://placehold.it/600x300" alt="3ème slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://placehold.it/600x250" alt="4ème slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://placehold.it/600x300" alt="5ème slide">
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselAppdev" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselAppdev" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    
@endsection
