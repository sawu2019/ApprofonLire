@extends('layouts.app')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">AJOUT PERSONNALITE</h3>
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
        <form method="post" action="{{ route('peoples.store') }}">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="nom">Personnalite</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer un nom" />
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="text" class="form-control" name="photo" id="photo" placeholder="Entrer Photo" />
                </div>
                <div class="form-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Entrer Titre" />
                </div>
                <div class="form-group">
                    <label for="ed_source">Editeur Source</label>
                    <input type="text" class="form-control" name="ed_source" id="ed_source" placeholder="Entrer Editeur Source" />
                </div>
                <div class="form-group">
                    <label for="int_link">Interview Link</label>
                    <input type="text" class="form-control" name="int_link" id="int_link" placeholder="Entrer Interview Link" />
                </div>
                <div class="form-group">
                    <label for="int_categ">Interview Categorie</label>
                    <select class="form-control @error('categorie_id') is-invalid @enderror" name="categorie_id">
                        @foreach ( $categories as $categorie )
                        <option value="{{$categorie->id }}">{{ $categorie->nom }}</option>
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
                    <select class="form-control int_sub_categ" name="int_sub_categ" ></select>
                </div>
                <div class="form-group">
                    <label for="int_share_text">Interview Share Text</label>
                    <input type="text" class="form-control" name="int_share_text" id="int_share_text" placeholder="Entrer Interview Share Text" />
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ENVOYEZ</button>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        $('.int_sub_categ').select2({
            placeholder: 'Entrer Interview Sub Categories',
            ajax: {
                url: "{{ route('search') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
    @endsection