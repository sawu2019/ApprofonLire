@extends('layouts.app')

@section('content')
<!-- Info boxes -->
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-bookmark-o" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CULTURE</span>
              <span class="info-box-number ">{{ $culture->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-ticket" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ECONOMIE</span>
              <span class="info-box-number">{{ $economie->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-home" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">HABITAT</span>
              <span class="info-box-number">{{ $habitat->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">SANTE</span>
              <span class="info-box-number">{{ $sante->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">SOCIAL</span>
              <span class="info-box-number">{{ $social->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-black"><i class="fa fa-futbol-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">SPORT</span>
              <span class="info-box-number">{{ $sport->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-rose"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">POLITIQUE</span>
              <span class="info-box-number">{{ $politique->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-orange"><i class="fa fa-tasks" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ALL</span>
              <span class="info-box-number">{{ $data->count() }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endsection
