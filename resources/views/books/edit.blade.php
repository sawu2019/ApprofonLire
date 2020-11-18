@extends('layouts.app')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">MODIFIER UN LIVRE</h3>
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
        <form method="post" action="{{ route('books.update', $book->id) }}">
            @method('PATCH')
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer un nom" value={{ $book->nom }} />
                </div>
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="text" class="form-control" name="photo" id="photo" placeholder="Entrer Photo" value={{ $book->photo }} />
                </div>
                <div class="form-group">
                    <label for="auteur">Auteur</label>
                    <input type="text" class="form-control" name="auteur" id="auteur" placeholder="Entrer Titre" value={{ $book->auteur }} />
                </div>

                <div class="form-group">
                    <label for="editeur">Editeur</label>
                    <input type="text" class="form-control" name="editeur" id="editeur" placeholder="Entrer Editeur" value={{ $book->editeur }} />
                </div>
                <div class="form-group">
                    <label for="purch_link">Purchase link</label>
                    <input type="text" class="form-control" name="purch_link" id="purch_link" placeholder="Entrer Purchase link" value={{ $book->purch_link }} />
                </div>
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <input type="text" class="form-control" name="notes" id="notes" placeholder="Entrer Notes" value={{ $book->notes }} />
                </div>
                <div class="form-group">
                    <label for="sharetext">Share Text</label>
                    <input type="text" class="form-control" name="sharetext" id="sharetext" placeholder="Entrer Share Text" value={{ $book->sharetext }} />
                </div>
                <div class="form-group">
                    <label for="person_name">Person Name</label>
                    <select class="form-control @error('people_id') is-invalid @enderror" name="people_id">
                        @foreach ( $peoples as $people)
                        <option value="{{$people->id }}" {{ $book->people_id == $people->id ? 'selected' : '' }}>{{ $people->nom }}</option>
                        @endforeach
                    </select>
                    @error('people_id')
                    <div class="invalid-feedback">
                        {{ $errors->first('people_id') }}
                    </div>
                    @enderror
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ENVOYEZ</button>
            </div>
        </form>
    </div>
    @endsection