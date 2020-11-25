<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ApprofonLire | Accueil</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- jvectormap -->
    <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">


    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('plugins/datatables/dataTables.bootstrap.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>Li</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Approfon</b>Lire</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">0</span>
                            </a>

                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">0</span>
                            </a>

                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">0</span>
                            </a>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('dist/img/user2-160x160.jpg') }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa  fa-sign-out text-red"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </li>
                        @endguest
                        <li>
                            <!-- Control Sidebar Toggle Button -->
                            @can('edit-users')
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">NAVIGATION PRINCIPALE</li>
                    <li class="active treeview">
                        <a href="{{ url('/home') }}">
                            <i class="fa fa-dashboard"></i> <span>TABLEAU DE BORD</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="{{ url('/home') }}"><i class="fa fa-circle-o text-yellow"></i> ACCUEIL</a></li>
                        </ul>
                    </li>
                    <li class="header">MENUS</li>
                    <li><a href="{{ route('books.index') }}"><i class="fa fa-book text-red"></i> <span>LIVRES</span></a></li>
                    <li><a href="{{ route('bookstores.index') }}"><i class="fa fa-home text-yellow"></i> <span>LIBRAIRIES</span></a></li>
                    <li><a href="{{ route('peoples.index') }}"><i class="fa fa-user text-blue"></i> <span>PERSONNALITES</span></a></li>
                    <li><a href="#"><i class="fa fa-inbox text-pink"></i> <span>SOURCES MEDIAS</span></a></li>
                    <!--<li><a href="#"><i class="fa fa-thumbs-up text-aqua"></i> <span>SUGGESTIONS</span></a></li>-->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa  fa-bell-o text-red"></i> <span>SUGGESTIONS</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{route('livres.index')}}"><i class="fa fa-circle-o"></i> Livres</a></li>
                            <li><a href="{{route('interview.index')}}"><i class="fa fa-circle-o"></i> Medias</a></li>
                        </ul>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> ACCUEIL</a></li>
                    <li class="active">TABLEAU DE BORD</li>
                </ol>
            </section>
            </br>

            <!-- Main content -->
            <section class="content">
                <main class="py-4">
                    @yield('content')
                </main>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 0.7.20
            </div>
            <strong>Copyright &copy; 2020 <a href="#">ApprofonLire</a>.</strong> Tous les droits
            réservé.
        </footer>

        <!-- Control Sidebar -->

        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->

            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Informations d'un utilisateur</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">E-mail</h4>

                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Compte crée </h4>

                                    <p>{{ Auth::user()->created_at }}</p>
                                </div>
                            </a>
                        </li>

                    </ul>
                    <!-- /.control-sidebar-menu -->
                </div>
                <!-- /.tab-pane -->

                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">Réglages Généraux</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
                                Liste des utilisateur
                                <a href="{{route('admin.users.index')}}" class="text-red pull-right"><i class="fa fa-list"></i></a>
                            </label>
                        </div>

                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>

        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="{{asset('plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('plugins/fastclick/fastclick.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{asset('plugins/chartjs/Chart.min.js')}}"></script>



    <!-- DataTables -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

</body>

</html>