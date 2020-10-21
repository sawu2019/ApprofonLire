@extends('layouts.app')

@section('content')
<h2 class="page-header">PERSONNAGE : <span class="glyphicon glyphicon-user text-primary"></span> {{$people->nom}} </h2>
<small>TITRE DU LIVRE : <span class="glyphicon glyphicon-book text-yellow"></span><strong> {{$people->title}} </strong></small></br>
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab"><strong>INFORMATION DE LA PERSONNE</strong></a></li>
                <li><a href="#tab_2" data-toggle="tab"><strong>AUTRES INFORMATIONS</strong></a></li>
                <li><a href="#tab_3" data-toggle="tab"><strong>TEXT DE PARTAGE</strong></a></li>
                
                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <b><span class="glyphicon glyphicon-user text-yellow"></span> Nom :</b>

                    <p>{{$people->nom}}.</p>

                    <div class="attachment-block clearfix">
                        <b>Photo :</b>
                        <p><img src="{{asset($people->photo) }}" class="attachment-img" alt="Attachment Image"></p>

                    </div>
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                    <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                    <span class="pull-right text-muted">0 likes - 0 comments</span></br>
                    <b>Lien D'Interview :</b>
                    <p><a href="{{$people->int_link}}" target="_blank"><i class="glyphicon glyphicon-new-window text-yellow" aria-hidden="true"></i> Liens d'achat</a>.</p>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <b>Categorie:</b>
                    @if($people->categorie)
                    <p><span class="glyphicon glyphicon-list text-yellow"></span> {{$people->categorie->nom}}.</p>
                    @endif
                    <b>Sous categorie :</b>
                    <p><span class="glyphicon glyphicon-list text-yellow"></span>  {{$people->int_sub_categ}}</p>
                    <b>Editeur Source :</b>
                    <p><a href="{{$people->ed_source}}" target="_blank"><i class="glyphicon glyphicon-new-window text-yellow" aria-hidden="true"></i> Liens d'achat</a>.</p>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <b><span class="glyphicon glyphicon-bullhorn text-yellow"></span> Text :</b>

                    <p>{{$people->int_share_text}}.</p>
                    <b><span class="glyphicon glyphicon-calendar text-yellow"></span> Date :</b>
                    {{$people->created_at}}.
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
</div>
@endsection