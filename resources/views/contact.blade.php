@extends('layout')

@section('content')

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
    <form method="post" action="contact-submit">
      <div class="form-group form-inline justify-content-center">
        <label>Vous êtes :</label>
        <input type="text" name="fullname" class="form-control" placeholder="Nom complet">
        <label>Joignable au :</label>
        <input type="text" name="phonenumber" class="form-control" placeholder="Numéro de téléphone">
      </div>
      <div class="form-group">
        <label>Titre de la commande</label>
        <input type="text" name="title" class="form-control" placeholder="Nom du produit">
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" placeholder="déscription déraillée du produit" rows="3"></textarea>
      </div>
      <div class="input-group mb-3">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Ajouter une photo</label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
  </div>

@elseif($tab == 'existing_creation')
<!-- existing_creation -->
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
        <label>Titre de la commande</label>
        <input type="text" name="title" class="form-control" placeholder="Nom du produit">
      </div>
      <div class="form-group">
        <label>Article existant</label>
        <select id="inputState" class="form-control">
          <option value="0" selected>Choisir...</option>
          @foreach ($produits as $produit)
            <option value="{{ $produit['id'] }}">{{ $produit['name'] }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Description</label>
        <textarea class="form-control" name="description" placeholder="déscription déraillée du produit" rows="3"></textarea>
      </div>
      <div class="input-group mb-3">
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Ajouter une photo</label>
        </div>
      </div>
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

