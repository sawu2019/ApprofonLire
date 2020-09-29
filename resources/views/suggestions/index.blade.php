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
        <h3 class="box-title">SUGGESTIONS</h3>
    </div>
    <div class="box-title">
        <a style="margin: 19px;" href="{{ route('suggestions.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Intervew Link</th>
                    <th>Book auteur</th>
                    <th>Type</th>
                    <th>mail</th>
                    <th>Edit</th>
                    <th>Delete</th>


                </tr>
            </thead>
            <tbody>
                @foreach($suggestions as $suggestion)
                <tr>
                    <td>{{$suggestion->nom}}</td>
                    <td>{{$suggestion->int_link}}</td>
                    <td>{{$suggestion->book_aut}}</td>
                    <td>{{$suggestion->type}}</td>
                    <td>{{$suggestion->user_mail}}</td>
                    <td><a href="{{ route('suggestions.edit',$suggestion->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td>

                        <form id="delete-form-{{$suggestion->id}}" method="POST" action="{{ route('suggestions.destroy',$suggestion->id)}}" style="display: none;">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                        </form>
                        <a href="" onclick="if(confirm('Vous voulais, supprimer ?')){event.preventDefault();document.getElementById('delete-form-{{$suggestion->id}}').submit();}
                        else
                        {event.preventDefault();}"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>

                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Intervew Link</th>
                    <th>Book auteur</th>
                    <th>Type</th>
                    <th>mail</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

@endsection