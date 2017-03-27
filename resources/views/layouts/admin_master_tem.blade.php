<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GhMediaGroup Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('admin/css/bootstrap.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{URL::to('admin/css/metisMenu.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::to('admin/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{URL::to('admin/css/morris.css') }}" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="{{URL::to('admin/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{URL::to('admin/css/main.css') }}" rel="stylesheet">
    @yield('styles')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">GhMediaHouse Admin Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
          
            
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/en"><i class="fa fa-user fa-fw"></i> Visit Site </a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="/en/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Add <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('getadd_you_link')}}" id="add_you_link_menu">Add Youtube Link & Image</a>
                                </li>
                                <li>
                                    <a id="add_latest_work_menu" href="{{route('getlatest_work')}}">Add Latest Works</a>
                                </li>
                                <li>
                                    <a id="add_clients_menu" href="{{route('getadd_clietns')}}">Add Client Image</a>
                                </li>
                                <li>
                                    <a id="add_img_cat_menu" href="{{route('getadd_img_category')}}">Add Image by Category</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-table fa-fw"></i> Delete <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('delete_clients')}}">Delete Client Image</a>
                                </li>
                                <li>
                                    <a href="{{route('delete_works')}}">Delete Latest Works</a>
                                </li>
                                <li>
                                    <a href="{{route('delete_youtube')}}">Delete Youtube Link & Image</a>
                                </li>
                                <li>
                                    <a href="{{route('delete_category')}}">Delete Image by Category</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Update <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{route('update_aboutus')}}">Update About Us</a>
                                </li>
                                <li>
                                    <a href="{{route('getupdate_slider')}}">Update Slider Image & Text</a>
                                </li>
                                <li>
                                    <a href="#">Update Social Links</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            
            @yield('content')
            
        </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{URL::to('admin/js/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::to('admin/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{URL::to('admin/js/metisMenu.min.js') }}"></script>
   
   
    <!-- Custom Theme JavaScript -->
    <script src="{{URL::to('admin/js/sb-admin-2.min.js') }}"></script>
    
    <script src="{{URL::to('admin/js/script.js') }}"></script>
    @yield('scripts')

</body>

</html>
