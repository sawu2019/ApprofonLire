@extends('layouts.app')

@section('content')
<h2 class="page-header">NOM DE LIBRAIRIE : <i class="fa fa-home text-yellow"></i> {{$bookstore->nom}} </h2>
<small>ADRESSE : <i class="fa fa-map-signs text-yellow"></i><strong> {{$bookstore->adresse_complet}} </strong></small></br>
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab"><strong>INFORMATION  DE LIBRAIRIE</strong></a></li>
                <li><a href="#tab_2" data-toggle="tab"><strong>INFORMATION ADMINISTRATIF</strong></a></li>
                <li><a href="#tab_3" data-toggle="tab"><strong>GEOLOCALISATION</strong></a></li>
                
                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <b><i class="fa fa-home text-yellow"></i> Librairie :</b>

                    <p>{{$bookstore->nom}}.</p>

                    <b><i class="fa fa-map-signs text-yellow"></i> Adresse:</b>
                    <p>{{$bookstore->adresse}}</p>

                    <b><i class="fa fa-map-o text-yellow"></i> Ville:</b>
                    <p>{{$bookstore->ville}}</p>

                    <b><i class="fa fa-phone text-yellow"></i> Téléphone:</b>
                    <p>{{$bookstore->telephone}}</p>

                    <b><i class="fa  fa-envelope-o text-yellow"></i> Adresse Mail:</b>
                    <p>{{$bookstore->mail}}</p>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <b><i class="fa  fa-sort-numeric-asc text-yellow"></i> N° siret :</b>
                    <p>{{$bookstore->siret}}</p>

                    <b><i class="fa  fa-sort-numeric-asc text-yellow"></i> N° INSEE :</b>
                    <p>{{$bookstore->code_insee}}</p>

                    <b><i class="fa fa-info text-yellow"></i> Complement</b>
                    <p>{{$bookstore->complement}}</p>
                    
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    
                    <b><span class="glyphicon glyphicon-calendar text-yellow"></span> Date :</b>
                    {{$bookstore->created_at}}.
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
</div>
@endsection