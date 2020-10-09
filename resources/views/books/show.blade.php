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
                    <b><span class="glyphicon glyphicon-user text-yellow"></span> Editeur :</b>

                    <p>{{$book->editeur}}.</p>
                    <b><i class="glyphicon glyphicon-book text-yellow" aria-hidden="true"></i> Notes :</b>
                    <p>{{$book->notes}}.</p>
                    <div class="attachment-block clearfix">
                    <b>Couverture du Livre :</b>
                    <p><img src="{{asset($book->photo) }}" class="attachment-img" alt="Attachment Image"></p>
                    </div>
                    <b>Lien D'achat :</b>
                    <p><a href="{{$book->purch_link}}" target="_blank"><i class="glyphicon glyphicon-new-window text-yellow" aria-hidden="true"></i> Liens d'achat</a>.</p>
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
                    <b><span class="glyphicon glyphicon-bullhorn text-yellow"></span> Text :</b>

                    <p>{{$book->sharetext}}.</p>
                    <b><span class="glyphicon glyphicon-calendar text-yellow"></span> Date :</b>
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