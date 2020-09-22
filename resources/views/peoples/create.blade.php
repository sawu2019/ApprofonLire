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
    <form method="post" action="{{ route('peoples.store') }}">
    @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer un nom"/>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label>
                <input type="text" class="form-control" name="photo" id="photo" placeholder="Entrer Photo"/>
            </div>
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Entrer Titre"/>
            </div>
            <div class="form-group">
                <label for="ed_source">Editeur Source</label>
                <input type="text" class="form-control" name="ed_source" id="ed_source" placeholder="Entrer Editeur Source"/>
            </div>
            <div class="form-group">
                <label for="int_link">Interview Link</label>
                <input type="text" class="form-control" name="int_link" id="int_link" placeholder="Entrer Interview Link"/>
            </div>
            <div class="form-group">
                <label for="int_categ">Interview Categorie</label>
                <input type="text" class="form-control" name="int_categ" id="int_categ" placeholder="Entrer Interview Categorie"/>
            </div>
            <div class="form-group">
                <label for="int_sub_categ">Interview Sub Categorie</label>
                <input type="text" class="form-control" name="int_sub_categ" id="int_sub_categ" placeholder="Entrer Interview Sub Categorie"/>
            </div>
            <div class="form-group">
                <label for="int_share_text">Interview Share Text</label>
                <input type="text" class="form-control" name="int_share_text" id="int_share_text" placeholder="Entrer Interview Share Text"/>
            </div>
            
        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection