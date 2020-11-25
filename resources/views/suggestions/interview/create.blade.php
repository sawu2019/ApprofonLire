@extends('layouts.app')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">SUGGESTION</h3>
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
        <form method="post" action="{{ route('interview.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer le nom de la personne" />
                </div>
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" class="form-control" name="url" id="url" placeholder="Entrer le lien de l'interview" />
                </div>
                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input type="text" class="form-control" name="mail" id="mail" placeholder="Votre adresse mail" />
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ENVOYEZ</button>
            </div>
        </form>
    </div>
    @endsection