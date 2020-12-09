@extends('layouts.app')

@section('content')
<h2 class="page-header">TITRE DU LIVRE : <span class="glyphicon glyphicon-book text-primary"></span> {{$book->nom}} </h2>
<small>AUTEUR DU LIVRE : <span class="glyphicon glyphicon-user text-yellow"></span><strong> {{$book->auteur}} </strong></small></br>
<div class="row">
    <div class="col-md-12">
        <!-- shared core -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5fb907bfccd8e328"></script>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab"><strong>INFORMATION DU LIVRE</strong></a></li>
                <li><a href="#tab_2" data-toggle="tab"><strong>PERSONNALITE DU LIVRE</strong></a></li>
                <li><a href="#tab_3" data-toggle="tab"><strong>TEXT DE PARTAGE</strong></a></li>

                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <b><span class="glyphicon glyphicon-user text-yellow"></span> Editeur :</b>

                    <p>{{$book->editeur}}.</p>

                    <div class="attachment-block clearfix">
                        <p><img src="{{asset($book->photo) }}" class="attachment-img" alt="Attachment Image"></p>

                        <div class="attachment-pushed">
                            <h4 class="attachment-heading"><a href="#">Notes :</a></h4>

                            <div class="attachment-text">
                                {{$book->notes}}. <a href="#">Lire plus</a>
                            </div>
                            <!-- /.attachment-text -->
                        </div>
                    </div>
                    <!-- shared button -->
                    <div class="addthis_inline_share_toolbox"></div>
                    </br>
                    <b><i class="fa fa-dollar"></i> Lien D'achat :</b>
                    <p><a href="{{$book->purch_link}}" target="_blank"><i class="glyphicon glyphicon-new-window text-yellow" aria-hidden="true"></i> Liens d'achat</a>.</p>
                    <b><i class="fa fa-shopping-cart"></i><a href="{{ route('login') }}"> Passer la commande </a></b>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <b>Personnalité :</b>
                    @if($book->people)
                    <p><span class="glyphicon glyphicon-user text-yellow"></span> {{$book->people->nom}}.</p>
                    <div class="attachment-block clearfix">
                        <p><img src="{{asset($book->people->photo) }}" class="attachment-img" alt="Attachment Image"></p>
                    </div>
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
        <hr>
        <h5>Les commandes</h5>
        <form action="{{ route('commandes.store', $book) }}" method="POST" class="mt-3">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="tlivre">Titre du livre</label>
                    <input type="text" class="form-control @error('tlivre') is-invalid @enderror" name="tlivre" id="tlivre" placeholder="Titre du livre" />
                    @error('tlivre')
                    <div class="invalid-feedback">{{ $errors->first('tlivre')}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" id="telephone" placeholder="Entrer Téléphone" />
                    @error('telephone')
                    <div class="invalid-feedback">{{ $errors->first('telephone')}}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <textarea class="form-control @error('notes') is-invalid @enderror" rows="3" name="notes" id="notes" placeholder="Entrer Notes"></textarea>
                    @error('notes')
                    <div class="invalid-feedback">{{ $errors->first('notes')}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Soumettre la commande</button>

            </div>
        </form>
    </div>

</div>
@endsection