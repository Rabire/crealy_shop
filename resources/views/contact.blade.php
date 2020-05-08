@extends('layout')

@section('content')

<style>
  .borders {
    border-bottom: 1px solid rgb(222, 226, 230);
    border-left: 1px solid rgb(222, 226, 230);
    border-right: 1px solid rgb(222, 226, 230);
  }
</style>

@if (\Session::has('success'))
    <br>
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
      </div>
@endif

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link @if($tab == 'custom_creation') active @endif" href="contact?type=custom_creation">Création sur mesure</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($tab == 'existing_creation') active @endif" href="contact?type=existing_creation">Création déjà existante</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($tab == 'informations') active @endif" href="contact?type=informations">Renseignements</a>
    </li>
</ul>

  <div class="container borders">
    <br>
    <form method="post" action="contact-submit" enctype="multipart/form-data">
      {{ csrf_field() }}

      <input name="type" type="hidden" value="{{ $tab }}">

      <div class="form-group">
        <label>Vos informations</label>

        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Nom complet">
        @error('fullname') <span class="invalid-feedback">Veuillez renseigner votre nom.</span> @enderror
        <br>

        <input type="text" name="phonenumber" class="form-control @error('phonenumber') is-invalid @enderror" placeholder="Numéro de téléphone">
        @error('phonenumber') <span class="invalid-feedback">Comment pouvons-nous nous contacter ?</span> @enderror
      </div>

      <div class="form-group">
        <label>Votre demande</label>

        @if($tab == 'custom_creation' || $tab == 'existing_creation')
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Titre de la commande">
          @error('title') <span class="invalid-feedback">Veuillez indiquer le titre de la commande.</span> @enderror
          <br>
        @endif

        @if($tab == 'existing_creation')
          <select name="article" class="form-control @error('article') is-invalid @enderror">
            <option value="" selected>Choisir un article existant...</option>
            @foreach ($produits as $produit)
              <option value="{{ $produit['id'] }}">{{ $produit['name'] }}</option>
            @endforeach
          </select>
          @error('article') <span class="invalid-feedback">Veuillez choisir un article existant.</span> @enderror
          <br>
        @endif

      
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Commentaire" rows="5"></textarea>
        @error('description') <span class="invalid-feedback">Merci de détailler votre demande.</span> @enderror
      </div>

      @if($tab == 'custom_creation' || $tab == 'existing_creation')
        <div class="input-group">
          <input type="file" name="uploaded_file" />
          <br><br>
        </div>
    
        @if (\Session::has('file_error'))
          <div class="alert alert-danger" role="alert">
            {{ Session::get('file_error') }}
          </div>
        @endif
      @endif

      <button type="submit" name="submit" class="btn btn-primary w-100">Envoyer</button>
      <br><br>

    </form>
  </div>




@endsection

