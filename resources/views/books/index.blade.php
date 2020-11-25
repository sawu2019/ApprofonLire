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
    @can('edit-users')
    <div class="box-title">
        <a style="margin: 19px;" href="{{ route('books.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span></a>
        <div class="btn-group">
            <button type="button" class="btn btn-info">Action</button>
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('import') }}"> <i class="fa fa-file-excel-o"></i> Import</a></li>
                <li class="divider"></li>
                <li><a href="{{ url('export') }}"> <i class="fa fa-file-excel-o"></i> Export</a></li>
            </ul>
        </div>
    </div>
    @endcan
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Editeur</th>
                    <th>Personnalite</th>
                    <th>Show</th>
                    @can('edit-users')
                    <th>Edit</th>
                    @endcan
                    @can('delete-users')
                    <th>Delete</th>
                    @endcan


                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{$book->nom}}</td>
                    <td>{{$book->auteur}}</td>
                    <td>{{$book->editeur}}</td>
                    <td>{{$book->people->nom}}</td>
                    <td><a href="{{ route('books.show',$book )}}"><span class="glyphicon glyphicon-book"></span></a></td>
                    @can('edit-users')
                    <td><a href="{{ route('books.edit',$book->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                    @endcan
                    @can('delete-users')
                    <td>

                        <form id="delete-form-{{$book->id}}" method="POST" action="{{ route('books.destroy',$book->id)}}" style="display: none;">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                        </form>
                        <a href="" onclick="if(confirm('Vous voulais, supprimer ?')){event.preventDefault();document.getElementById('delete-form-{{$book->id}}').submit();}
                        else
                        {event.preventDefault();}"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                    @endcan

                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Auteur</th>
                    <th>Editeur</th>
                    <th>Personnalite</th>
                    <th>Show</th>
                    @can('edit-users')
                    <th>Edit</th>
                    @endcan
                    @can('delete-users')
                    <th>Delete</th>
                    @endcan
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

@endsection