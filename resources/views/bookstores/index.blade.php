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
        <h3 class="box-title"><span class="glyphicon glyphicon-book"></span> LIBRAIRIE</h3>
    </div>
    <div class="box-title">
        <a style="margin: 19px;" href="{{ route('bookstores.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Complement</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Telephone</th>
                    <th>Edit</th>
                    <th>Delete</th>


                </tr>
            </thead>
            <tbody>
                @foreach($bookstores as $bookstore)
                <tr>
                    <td>{{$bookstore->nom}}</td>
                    <td>{{$bookstore->complement}}</td>
                    <td>{{$bookstore->adresse}}</td>
                    <td>{{$bookstore->ville}}</td>
                    <td>{{$bookstore->telephone}}</td>
                    <td><a href="{{ route('bookstores.edit',$bookstore->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td>

                        <form id="delete-form-{{$bookstore->id}}" method="POST" action="{{ route('bookstores.destroy',$bookstore->id)}}" style="display: none;">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                        </form>
                        <a href="" onclick="if(confirm('Vous voulais, supprimer ?')){event.preventDefault();document.getElementById('delete-form-{{$bookstore->id}}').submit();}
                        else
                        {event.preventDefault();}"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Complement</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Telephone</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

@endsection