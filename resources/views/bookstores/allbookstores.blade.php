@extends('layouts.app')

@section('content')
<section class="news-box top-margin">
    <div class="container">
        <h2><span><i class="fa fa-home text-yellow"></i> LES LIBRAIRIES</span></h2>
        <div class="row">
            @foreach($bookstores as $bookstore)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div class="newsBox">
                    <div class="thumbnail">
                        <a href="{{ route('bookstores.show',$bookstore )}}" class="btn-inline">
                            <figure><i class="fa fa-home text-yellow"></i></figure>
                        </a>
                        <div class="caption maxheight2">
                            <div class="box_inner">
                                <div class="box">
                                    <p class="title"><strong><span class="glyphicon glyphicon-user text-primary"></span> {{$bookstore->nom}}</strong></p>
                                </div>
                                <div>
                                    <p class="title"><strong><i class="fa fa-map-signs"></i> {{$bookstore->adresse}}</strong></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <small>Posté le {{$bookstore->created_at->format('d/m/Y à H:m') }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
        {{$bookstores->links()}}

    </div>
</section>
@endsection