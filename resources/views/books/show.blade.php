@extends('layouts.app')

@section('content')
<h2 class="page-header">TITRE DU LIVRE : <span class="glyphicon glyphicon-book text-primary"></span> {{$book->nom}} </h2>
<small>AUTEUR DU LIVRE : <span class="glyphicon glyphicon-user text-yellow"></span><strong> {{$book->auteur}} </strong></small></br>
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab"><strong>INFORMATION DU LIVRE</strong></a></li>
                <li><a href="#tab_2" data-toggle="tab"><strong>PERSONNALITE DU LIVRE</strong></a></li>
                <li><a href="#tab_3" data-toggle="tab"><strong>TEXT DE PARTAGE</strong></a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Action <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa  fa-credit-card"></i> Acheter</a></li>
                        <li role="presentation" class="divider"></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-thumbs-up"></i> Aimer</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="#"><i class="fa fa-share"></i> Partager</a></li>
                    </ul>
                </li>
                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <b>Editeur :</b>

                    <p>{{$book->editeur}}.</p>
                    <b>Notes :</b>
                    <p>{{$book->notes}}.</p>
                    <b>Lien D'achat :</b>
                    <p>{{$book->purch_link}}.</p>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <b>Personnalité :</b>
                    @if($book->people)

                    <p><span class="glyphicon glyphicon-user text-yellow"></span> {{$book->people->nom}}.</p>
                    @endif
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <b>Text :</b>

                    <p>{{$book->sharetext}}.</p>
                    <b>Date :</b>
                    {{$book->created_at}}.
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
</div>
@endsection