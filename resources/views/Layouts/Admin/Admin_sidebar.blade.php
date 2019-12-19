        <!-- Left Panel -->

        <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route('AdminDashboard')}}"><img src="/Admin/images/logo1.png"></a>
                <a class="navbar-brand hidden" href="./">Gold store   </a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{route('AdminDashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title"> </h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-square fa-lg"></i>Categories</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fas fa fa-square-o"></i><a href="{{route('Category.Index')}}">View Categories</a></li>
                            <li><i class="fas fa fa-square-o"></i><a href="{{route('Category.Add')}}">Add</a></li>
                              
                        </ul>
                    </li>
					
					
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-square fa-lg"></i>Products</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fas fa fa-square-o"></i><a href="{{route('Product.Index')}}">View Products</a></li>
                            <li><i class="fas fa fa-square-o"></i><a href="{{route('Product.Add')}}">Add</a></li>
                        </ul>
                    </li>
					
					
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-square fa-lg"></i>Orders</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fas fa fa-square-o"></i><a href="{{route('Admin.Orders')}} ">View Orders</a></li>
                         </ul>
                    </li>
 
                    <h3 class="menu-title"> </h3><!-- /.menu-title -->   
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-square fa-lg"> </i>  Users</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fas fa fa-square-o"></i><a href="{{route('Admin.Users')}}">Registerd Users</a></li>
                          </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->