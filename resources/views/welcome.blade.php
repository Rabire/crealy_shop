@extends('layout')

@section('content')

<style>
    .presentation {
        display: flex;
    }

</style>

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
                <img class="d-block w-100" src="https://placehold.it/600x200" alt="2ème slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://placehold.it/600x200" alt="3ème slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://placehold.it/600x200" alt="4ème slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://placehold.it/600x200" alt="5ème slide">
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

    <br>

    <div class="container" >
        <h1>Qui suis-je ?</h1>
        <br>
        <div class="row">
            <div class="col bg-light" style="padding: 2%; margin: auto; text-align: justify;">
                <p>
                    Ut sed eros id urna porta ullamcorper quis ut purus. Fusce posuere mi a sapien convallis, ac semper urna accumsan. Quisque euismod efficitur sem, quis accumsan enim viverra fermentum. Aenean fringilla, ipsum sit amet fermentum posuere, neque tortor lacinia ex, placerat fermentum nibh libero a felis. Nam rhoncus facilisis dui at gravida. Maecenas gravida tellus ante, at tincidunt risus viverra dapibus. Phasellus ligula quam, iaculis id lorem porta, fermentum pretium arcu. Suspendisse lobortis orci sed ex venenatis, id iaculis erat varius. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce pulvinar metus ac mauris venenatis maximus. Nam tincidunt nulla a auctor rutrum.
                </p>
            </div>
            <div class="col bg-light" style="padding: 2%; width: 50%;">
                <img style="width: 100%; height: auto;" src="..." alt="portrait de Lydia">
            </div>
        </div>
        <br>

        <h1>Le crochet</h1>
        <br>
        <div class="row">
            <div class="col bg-light" style="padding: 2%; width: 50%;">
                <img style="width: 100%; height: auto;" src="..." alt=" Lydia qui fait du crochet">
            </div>
            <div class="col bg-light" style="padding: 2%; margin: auto; text-align: justify;">
                <p>
                    Ut sed eros id urna porta ullamcorper quis ut purus. Fusce posuere mi a sapien convallis, ac semper urna accumsan. Quisque euismod efficitur sem, quis accumsan enim viverra fermentum. Aenean fringilla, ipsum sit amet fermentum posuere, neque tortor lacinia ex, placerat fermentum nibh libero a felis. Nam rhoncus facilisis dui at gravida. Maecenas gravida tellus ante, at tincidunt risus viverra dapibus. Phasellus ligula quam, iaculis id lorem porta, fermentum pretium arcu. Suspendisse lobortis orci sed ex venenatis, id iaculis erat varius. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce pulvinar metus ac mauris venenatis maximus. Nam tincidunt nulla a auctor rutrum.
                </p>
            </div>
        </div>
        <br>
    </div>
    
@endsection
