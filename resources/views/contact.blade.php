@extends('layout')

@section('content')


@if (\Session::has('success'))
    <br>
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
      </div>
@endif

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link @if($tab == 'custom_creation') active @endif" href="contact-custom_creation">Création sur mesure</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($tab == 'existing_creation') active @endif" href="contact-existing_creation">Création déjà existante</a>
    </li>
    <li class="nav-item">
      <a class="nav-link @if($tab == 'informations') active @endif" href="contact-informations">Renseignements</a>
    </li>
</ul>

@if($tab == 'custom_creation')
<!-- custom_creation -->
  <div class="container">
    <br>
    <form method="post" action="contact-custom_creation-submit" enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group form-inline justify-content-center">
        <label>Vous êtes :</label>
        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Nom complet">
        <label>Joignable au :</label>
        <input type="text" name="phonenumber" class="form-control @error('phonenumber') is-invalid @enderror" placeholder="Numéro de téléphone">
      </div>

      <div class="form-group">
        <label>Titre de la commande</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="" placeholder="Nom du produit">
        @error('title') <span class="invalid-feedback">Veuillez indiquer le titre de la commande</span> @enderror
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="déscription déraillée du produit" rows="3"></textarea>
        @error('description') <span class="invalid-feedback"> Veuillez décrir le produit voullu </span> @enderror
      </div>

      <div class="input-group">
        <input type="file" name="uploaded_file" />
      </div>

      @if (\Session::has('file_error'))
        <div class="alert alert-danger" role="alert">
          {{ Session::get('file_error') }}
        </div>
      @endif

      <br>
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
  </div>

@elseif($tab == 'existing_creation')
<!-- existing_creation -->
  <div class="container">
    <br>
    <form method="post" action="contact-existing_creation-submit">
      {{ csrf_field() }}

      <div class="form-group form-inline justify-content-center">
        <label>Vous êtes :</label>
        <input type="text" name="fullname" class="form-control @error('fullname') is-invalid @enderror" placeholder="Nom complet">
        <label>Joignable au :</label>
        <input type="text" name="phonenumber" class="form-control @error('phonenumber') is-invalid @enderror" placeholder="Numéro de téléphone">
      </div>

      <div class="form-group">
        <label>Titre de la commande</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="Nom du produit">
        @error('title') <span class="invalid-feedback"> Veuillez indiquer le titre de la commande </span> @enderror
      </div>

      <div class="form-group">
        <label>Article existant</label>
        <select name="article" class="form-control @error('article') is-invalid @enderror">
          <option value="" selected>Choisir...</option>
          @foreach ($produits as $produit)
            <option value="{{ $produit['id'] }}">{{ $produit['name'] }}</option>
          @endforeach
        </select>
        @error('article') <span class="invalid-feedback"> Veuillez choisir un article existant </span> @enderror
      </div>

      <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="déscription déraillée du produit" rows="3"></textarea>
        @error('description') <span class="invalid-feedback"> Veuillez décrir le produit voullu </span> @enderror
      </div>

      <div class="input-group">
        <input type="file" name="uploaded_file" />
      </div>

      @if (\Session::has('file_error'))
        <div class="alert alert-danger" role="alert">
          {{ Session::get('file_error') }}
        </div>
      @endif

      <br>
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
  </div>

@elseif($tab == 'informations')
<!-- informations -->
  <div class="container">
    <br>
    <form method="post" action="contact-submit">
      <div class="form-group form-inline justify-content-center">
        <label>Vous êtes :</label>
        <input type="text" name="fullname" class="form-control" placeholder="Nom complet">
        <label>Joignable au :</label>
        <input type="text" name="phonenumber" class="form-control" placeholder="Numéro de téléphone">
      </div>
      <div class="form-group">
        <label>Je vous écoute</label>
        <textarea class="form-control" name="description" placeholder="Demandez-moi ce que vous voullez !" rows="5"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
  </div>

@endif

@endsection

