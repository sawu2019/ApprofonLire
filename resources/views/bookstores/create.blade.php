@extends('layouts.app')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">AJOUT LIBRAIRIE</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('bookstores.store') }}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer un nom" />
                </div>
                <div class="form-group">
                    <label for="complement">Complement</label>
                    <input type="text" class="form-control" name="complement" id="complement" placeholder="Entrer Complement" />
                </div>
                <div class="form-group">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" name="adresse" id="adresse" placeholder="Entrer Adresse" />
                </div>
                <div class="form-group">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" name="ville" id="ville" placeholder="Entrer Ville" />
                </div>
                <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Entrer latitude" />
                </div>
                <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Entrer Longitude" />
                </div>
                <div class="form-group">
                    <label for="coordinates">Coordinates</label>
                    <input type="text" class="form-control" name="coordinates" id="coordinates" placeholder="Entrer Coordinates" />
                </div>
                <div class="form-group">
                    <label for="code_insee">Code Insee</label>
                    <input type="text" class="form-control" name="code_insee" id="code_insee" placeholder="Entrer Code Insee" />
                </div>
                <div class="form-group">
                    <label for="adresse_complet">Adresse Complet</label>
                    <input type="text" class="form-control" name="adresse_complet" id="adresse_complet" placeholder="Entrer Adresse Complet" />
                </div>
                <div class="form-group">
                    <label for="siret">Siret</label>
                    <input type="text" class="form-control" name="siret" id="siret" placeholder="Entrer Siret" />
                </div>
                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input type="mail" class="form-control" name="mail" id="mail" placeholder="Entrer Mail" />
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" class="form-control" name="telephone" id="telephone" placeholder="Entrer Telephone" />
                </div>
                <div class="form-group">
                    <label for="site">Site</label>
                    <input type="text" class="form-control" name="site" id="site" placeholder="Entrer Site" />
                </div>
                <div class="form-group">
                    <label for="nom_city_ver">Nom et ville de verification</label>
                    <input type="text" class="form-control" name="nom_city_ver" id="nom_city_ver" placeholder="Entrer Nom et ville de verification" />
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ENVOYEZ</button>
            </div>
        </form>
    </div>
    @endsection