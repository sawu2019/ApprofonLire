@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" ><strong>Liste des commandes éffectue</strong></div></br>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Client</th>
                                <th scope="col">Livre</th>
                                <th scope="col">Email cleint</th>
                                <th scope="col">Téléphone client</th>
                                <th scope="col">Avis</th>
                                <th scope="col">Approuver</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes as $commande)
                            <tr>
                                <th scope="row">{{$commande->id}}</th>
                                <td>{{$commande->user->name}}</td>
                                <td>{{$commande->tlivre}}</td>
                                <td>{{$commande->user->email}}</td>
                                <td>{{$commande->telephone}}</td>
                                <td>{{$commande->notes}}</td>
                                <td><a href="#"><button class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Approuver</button></a></td>
                                <td>
                                    <form action="#" method="POST" 
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-trash"></span> Supprimer</button>

                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection