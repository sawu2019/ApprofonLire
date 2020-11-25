@extends('layouts.app')

@section('content')
<section class="news-box top-margin">
    <div class="container">
        <h2><span><span class="glyphicon glyphicon-book text-primary"></span> LES LIVRES</span></h2>
        <div class="row">
            @foreach($books as $book)
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <div class="newsBox">
                    <div class="thumbnail">
                        <a href="{{ route('books.show',$book )}}" class="btn-inline">
                            <figure><img src="{{asset($book->photo) }}" height="230px" width="250px" alt=""></figure>
                        </a>
                        <div class="caption maxheight2">
                            <div class="box_inner">
                                <div class="box">
                                    <p class="title"><strong><span class="glyphicon glyphicon-book text-primary"></span> {{$book->nom}}</strong></p>
                                </div>
                                <div>
                                    <p class="title"><strong><span class="glyphicon glyphicon-user text-yellow"></span> {{$book->editeur}}</strong></p>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <small>Posté le {{$book->created_at->format('d/m/Y à H:m') }}</small>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            @endforeach
        </div>

        {{$books->links()}}

    </div>
</section>
@endsection