@extends('layouts.app')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">PEOPLES</h3>
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
        <form method="post" action="{{ route('peoples.update', $people->id) }}">
            @method('PATCH')
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer un nom" value={{ $people->nom }} />
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="text" class="form-control" name="photo" id="photo" placeholder="Entrer Photo" value={{ $people->photo }} />
                </div>
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Entrer Titre" value={{ $people->title }} />
                </div>

                <div class="form-group">
                    <label for="ed_source">Editeur Source</label>
                    <input type="text" class="form-control" name="ed_source" id="ed_source" placeholder="Entrer Editeur Source" value={{ $people->ed_source }} />
                </div>
                <div class="form-group">
                    <label for="int_link">Interview Link</label>
                    <input type="text" class="form-control" name="int_link" id="int_link" placeholder="Entrer Interview Link" value={{ $people->int_link }} />
                </div>
                <div class="form-group">
                    <label for="int_categ">Interview Categorie</label>
                    <select class="form-control @error('categorie_id') is-invalid @enderror" name="categorie_id">
                        @foreach ( $categories as $categorie )
                        <option value="{{$categorie->id }}" {{ $people->categorie_id == $categorie->id ? 'selected' : '' }}>{{ $categorie->nom }}</option>
                        @endforeach
                    </select>
                    @error('categorie_id')
                    <div class="invalid-feedback">
                        {{ $errors->first('categorie_id') }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="int_sub_categ">Interview Sub Categorie</label>
                    <input type="text" class="form-control" name="int_sub_categ" id="int_sub_categ" placeholder="Entrer Interview Sub Categorie" value={{ $people->int_sub_categ }} />
                </div>
                <div class="form-group">
                    <label for="int_share_text">Interview Share Text</label>
                    <input type="text" class="form-control" name="int_share_text" id="int_share_text" placeholder="Entrer Interview Share Text" value={{ $people->int_share_text }} />
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ENVOYEZ</button>
            </div>
        </form>
    </div>
    @endsection