<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="/Admin/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Admin/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Admin/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/Admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/Admin/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="/Admin/vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="/Admin/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <script src="/Admin/vendors/jquery/dist/jquery.min.js"></script>

</head>

<body>

  @include('Layouts.Admin.Admin_sidebar')



    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

    @include('Layouts.Admin.Admin_header')
    @if(Session::has('msg'))
    <div class="alert alert-success" role="alert" style="margin-top:10px;">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <h4> <i class="fa fa-check"></i>Success!</h4>
                                {{Session::get('msg')}}
    </div>
    @endif
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">

             
        <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="mb-0">
                            <span class="count">10468</span>
                        </h4>
                        <p class="text-light">Members online</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
                @yield('content')

            </div>
            <!--/.col-->


        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="/Admin/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/Admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/Admin/assets/js/main.js"></script>


    <script src="/Admin/vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="/Admin/assets/js/dashboard.js"></script>
    <script src="/Admin/assets/js/widgets.js"></script>
    <script src="/Admin/vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="/Admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="/Admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
