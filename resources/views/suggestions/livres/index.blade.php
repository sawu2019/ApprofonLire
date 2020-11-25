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
        <h3 class="box-title"><span class="glyphicon glyphicon-tasks"></span> SUGGESTIONS DES MEDIAS</h3>
    </div>
    @can('edit-users')
    <div class="box-title">
        <a style="margin: 19px;" href="{{ route('livres.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span></a>
    </div>
    @endcan
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Auteur</th>
                    <th>Email</th>
                    @can('delete-users')
                    <th>Delete</th>
                    @endcan


                </tr>
            </thead>
            <tbody>
                @foreach($sublivrees as $sublivre)
                <tr>
                    <td>{{$sublivre->nom_livre}}</td>
                    <td>{{$sublivre->auteur}}</td>
                    <td>{{$sublivre->mail}}</td>
                    @can('delete-users')
                    <td>

                        <form id="delete-form-{{$sublivre->id}}" method="POST" action="{{ route('livres.destroy',$sublivre->id)}}" style="display: none;">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                        </form>
                        <a href="" onclick="if(confirm('Vous voulais, supprimer ?')){event.preventDefault();document.getElementById('delete-form-{{$sublivre->id}}').submit();}
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
                    <th>Email</th>
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