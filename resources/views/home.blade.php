@extends('layouts.app')

@section('content')
<!-- Info boxes -->
<div class="row">
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua"><a href="{{ route('books.all') }}"><i class="fa fa-book text-white"></i></a></span>

      <div class="info-box-content">
        <span class="info-box-text">LES LIVRES</span>
        <span class="info-box-number ">{{ $livre->count() }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-pink"><a href="{{ route('bookstores.allbookstores') }}"><i class="fa fa-home text-white"></i></a></span>

      <div class="info-box-content">
        <span class="info-box-text">LES LIBRAIRIES</span>
        <span class="info-box-number">{{ $librairie->count() }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow"><a href="{{ route('peoples.allpeoples') }}"><i class="fa fa-users text-white"></i></a></span>

      <div class="info-box-content">
        <span class="info-box-text">LES PERSONNALITES</span>
        <span class="info-box-number">{{ $personnalite->count() }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

  <!-- /.col -->

  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green"><a href="#"><i class="fa fa-inbox text-pink"></i></a></span>

      <div class="info-box-content">
        <span class="info-box-text">SOURCES MEDIAS</span>
        <span class="info-box-number">{{ $suggestion->count() }}</span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <!-- /.col -->

  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix visible-sm-block"></div>
</div>
<!-- /.row -->
@endsection