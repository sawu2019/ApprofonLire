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
        <h3 class="box-title"><span class="glyphicon glyphicon-user"></span> PERSONNALITES</h3>
    </div>
    @can('edit-users')
    <div class="box-title">
        <a style="margin: 19px;" href="{{ route('peoples.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span></a>
        <div class="btn-group">
            <button type="button" class="btn btn-info">Action</button>
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <li><a href="#"> <i class="fa fa-file-excel-o"></i> Import</a></li>
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
                    <th>Nom</th>
                    <th>Titre</th>
                    <th>Categorie</th>
                    <th>Source media</th>
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
                @foreach($peoples as $people)
                <tr>
                    <td>{{$people->nom}}</td>
                    <td>{{$people->title}}</td>
                    <td>{{$people->categorie->nom}}</td>
                    <td>{{$people->ed_source}}</td>
                    <td><a href="{{ route('peoples.show',$people )}}"><span class="glyphicon glyphicon-user"></span></a></td>
                    @can('edit-users')
                    <td><a href="{{ route('peoples.edit',$people->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                    @endcan
                    @can('delete-users')
                    <td>

                        <form id="delete-form-{{$people->id}}" method="POST" action="{{ route('peoples.destroy',$people->id)}}" style="display: none;">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                        </form>
                        <a href="" onclick="if(confirm('Vous voulais, supprimer ?')){event.preventDefault();document.getElementById('delete-form-{{$people->id}}').submit();}
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
                    <th>Titre</th>
                    <th>Categorie</th>
                    <th>Source media</th>
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