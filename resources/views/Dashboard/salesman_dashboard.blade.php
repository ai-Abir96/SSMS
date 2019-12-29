<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Dashboard</title>

    <link href="{{ asset('dashboard/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('dashboard/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('dashboard/js/plugins/gritter/jquery.gritter.css') }}" rel="stylesheet">

    <link href="{{ asset('dashboard/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">


                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img src="{{ asset('Images/Employee_Image') }}/"
                                  alt="" class="rounded-circle"
                                  style="width:100px;height:100px"/>

                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold"><big>
                                    {{ Auth::user()->personals->emp_fname}}
                                </big></span>
                                <span class="text-muted text-xs block">Admin<b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            Salesman
                        </div>
                    </li>


                    <li >
                        <a href="{{ route('pos_index') }}"><i class=" fa fa-shopping-cart"></i> <span class="nav-label">Order</span></a>
                    </li>


                    <!-- Products -->
                    <li>
                        <a href="{{ route('rp_index') }}"><i class="fa fa-folder"></i> <span class="nav-label">Refund</span>  </a>
                    </li>
                    <!-- Products end -->


                    <!-- Product Categories-->
                    <li>
                        <a href="#"><i class="fa fa-folder"></i> <span class="nav-label">Product Categories</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ route('cat_index') }}"> Category </a></li>
                            <li><a href="{{ route('scat_index') }}"> Sub Category </a></li>
                        </ul>
                    </li>
                    <!-- Product categories end -->

                    <!-- Products -->
                    <li>
                        <a href="{{ route('product_index') }}"><i class="fa fa-folder"></i> <span class="nav-label">Product Details</span>  </a>
                    </li>
                    <!-- Products end -->

                    <!-- Stock -->
                    <li>
                        <a href="{{ route('stock_index') }}"><i class="fa fa-folder"></i> <span class="nav-label">Stock Details</span>  </a>
                    </li>
                    <!-- Stock end -->



                    <!-- Others -->
                    <li>
                        <a href="#"><i class="fa fa-folder"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="{{ route('r_daily') }}"> Daily Sales Report </a></li>

                        </ul>
                    </li>
                    <!-- Others end -->



                </ul>

            </div>
        </nav>


        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-fabar " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="">
                <div class="form-group">
                    <input id="search" type="text" placeholder="Search for..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>



            <ul class="nav navbar-top-links navbar-right">
                <li style="padding: 20px">
                    <span class="m-r-sm text-muted welcome-message">Welcome  Admin.</span>
                </li>

                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>

        </nav>
        </div>


            <div class="wrapper wrapper-content">
              <div class="container">
                  @yield('content')
              </div>


            <div class="footer">

                <div>
                    <strong>Copyright</strong> sHaD0w_007 &copy; 2016-2019
                </div>
            </div>
        </div>


    </div>
  </div>



    <!-- Mainly scripts -->
    <script src="{{ asset('dashboard/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/bootstrap.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('dashboard/js/custom.js') }}"></script>
    <script src="{{ asset('dashboard/js/plugins/pace/pace.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-input-spinner.js') }}"></script>
    <!-- jQuery UI -->
    <script src="{{ asset('dash2/js/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script >

    $(document).ready(function(){

            $('#search').keyup(function(){
              search_table($(this).val());
            });
            function search_table(value){
              $('#_search tr').each(function(){
                var found = 'false';
                $(this).each(function(){
                  if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                  {
                    found = 'true';
                  }
                });
                if(found == 'true')
                {
                  $(this).show();
                }
                else
                {
                  $(this).hide();
                }
              });
          }
        });

    </script>

</body>

</html>
