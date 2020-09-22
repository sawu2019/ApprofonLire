@extends('layouts.app')

@section('content')

<div class="box">
    <div class="col-sm-12">

        @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
    </div>
    <div class="box-header">
        <h3 class="box-title">PEOEPLE</h3>
    </div>
    <div class="box-title">
        <a style="margin: 19px;" href="{{ route('peoples.create')}}" class="btn btn-primary">Add</a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Photo</th>
                    <th>Titre</th>
                    <th>Editeur Source</th>
                    <th>Interview Link</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peoples as $people)
                <tr>
                    <td>{{$people->nom}}</td>
                    <td>{{$people->photo}}</td>
                    <td>{{$people->title}}</td>
                    <td>{{$people->ed_source}}</td>
                    <td>{{$people->int_link}}</td>
                    <td><a href="{{ route('peoples.edit',$people->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('peoples.destroy', $people->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nom</th>
                    <th>Photo</th>
                    <th>Titre</th>
                    <th>Editeur Source</th>
                    <th>Interview Link</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.box-body -->
</div>

@endsection