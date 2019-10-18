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

   

    <!-- data table jquery-->
     <script src="/Admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>

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

             
         
                
                @yield('content')

           
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
    
   
     

  <!-- data table js -->
     <script src="/Admin/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="/Admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/Admin/assets/js/main.js"></script>


    <script src="/Admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/Admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/Admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="/Admin/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/Admin/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/Admin/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="/Admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/Admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/Admin/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="/Admin/assets/js/init-scripts/data-table/datatables-init.js"></script>
  
    <!-- validation js -->
   


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

    <script>
    
    $(document).ready(function(){
        alert("test"); 
    $("#delete_cat").click(functin(){
                      
         if(confirm("Are  you sure you want to delete this category?")){
           return true;
               }                  
           return false;                
                           
              });
    
          });
    </script>

</body>

</html>
