@extends('layouts.app')

@section('content')

<div class="box">
    <div class="col-sm-12"></br>

        @if(session()->get('success'))
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i> Alert!</h4>
            {{ session()->get('success') }}.
        </div>
        @endif
    </div>
    <div class="box-header">
        <h3 class="box-title"><span class="glyphicon glyphicon-book"></span> LIVRES</h3>
    </div>
    <div class="box-title">
        <a style="margin: 19px;" href="{{ route('books.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Photo</th>
                    <th>Auteur</th>
                    <th>Editeur</th>
                    <th>Personnalite</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>


                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{$book->nom}}</td>
                    <td>{{$book->photo}}</td>
                    <td>{{$book->auteur}}</td>
                    <td>{{$book->editeur}}</td>
                    <td>{{$book->people->nom}}</td>
                    <td><a href="{{ route('books.show',$book )}}"><span class="glyphicon glyphicon-book"></span></a></td>
                    <td><a href="{{ route('books.edit',$book->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td>

                        <form id="delete-form-{{$book->id}}" method="POST" action="{{ route('books.destroy',$book->id)}}" style="display: none;">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                        </form>
                        <a href="" onclick="if(confirm('Vous voulais, supprimer ?')){event.preventDefault();document.getElementById('delete-form-{{$book->id}}').submit();}
                        else
                        {event.preventDefault();}"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Photo</th>
                    <th>Auteur</th>
                    <th>Editeur</th>
                    <th>Personnalite</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

@endsection