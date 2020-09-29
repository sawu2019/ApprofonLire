@extends('layouts.app')

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">SUGGESTIONS</h3>
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
        <form method="post" action="{{ route('suggestions.update', $suggestion->id) }}">
            @method('PATCH')
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer un nom" value={{ $suggestion->nom }} />
                </div>
                <div class="form-group">
                    <label for="int_link">Interview Link</label>
                    <input type="text" class="form-control" name="int_link" id="int_link" placeholder="Entrer Photo" value={{ $suggestion->int_link }} />
                </div>
                <div class="form-group">
                    <label for="book_aut">Book Auteur</label>
                    <input type="text" class="form-control" name="book_aut" id="book_aut" placeholder="Entrer Titre" value={{ $suggestion->book_aut }} />
                </div>

                <div class="form-group">
                    <label for="type">Type</label>
                    <input type="text" class="form-control" name="type" id="type" placeholder="Entrer Editeur Source" value={{ $suggestion->type }} />
                </div>
                <div class="form-group">
                    <label for="user_mail">Mail</label>
                    <input type="mail" class="form-control" name="user_mail" placeholder="Entrer Interview Link" value={{ $suggestion->user_mail }} />
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">ENVOYEZ</button>
            </div>
        </form>
    </div>
    @endsection