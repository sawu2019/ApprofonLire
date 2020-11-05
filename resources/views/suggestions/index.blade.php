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
        <h3 class="box-title"><span class="glyphicon glyphicon-tasks"></span> SUGGESTIONS</h3>
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
                    <th>Image</th>
                    <th>Intervew Link</th>
                    <th>Book auteur</th>
                    <th>Type</th>
                    <th>mail</th>
                    @can('edit-users')
                    <th>Edit</th>
                    @endcan
                    @can('delete-users')
                    <th>Delete</th>
                    @endcan


                </tr>
            </thead>
            <tbody>
                @foreach($suggestions as $suggestion)
                <tr>
                    <td>{{$suggestion->nom}}</td>
                    <td class="attachment-block clearfix"><img src="{{asset('storage'). '/'. $suggestion->image}}" class="attachment-img" alt="Attachment Image"></td>
                    <td><a href="{{$suggestion->int_link}}" target="_blank"><i class="glyphicon glyphicon-new-window text-yellow" aria-hidden="true"></i> Liens d'Interview</a></td>
                    <td>{{$suggestion->book_aut}}</td>
                    <td>{{$suggestion->type}}</td>
                    <td>{{$suggestion->user_mail}}</td>
                    @can('edit-users')
                    <td><a href="{{ route('suggestions.edit',$suggestion->id)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                    @endcan
                    @can('delete-users')
                    <td>

                        <form id="delete-form-{{$suggestion->id}}" method="POST" action="{{ route('suggestions.destroy',$suggestion->id)}}" style="display: none;">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}

                        </form>
                        <a href="" onclick="if(confirm('Vous voulais, supprimer ?')){event.preventDefault();document.getElementById('delete-form-{{$suggestion->id}}').submit();}
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
                    <th>Image</th>
                    <th>Intervew Link</th>
                    <th>Book auteur</th>
                    <th>Type</th>
                    <th>mail</th>
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