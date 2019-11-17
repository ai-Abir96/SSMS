<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>

  <meta charset="utf-8">


  <title>Admin Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="{{ asset('dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="{{ asset('dashboard/css/admin.css') }}" rel="stylesheet">
  <link href="{{ asset('css/form-snippet.css') }}" rel="stylesheet">



</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="">Admin</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- Navbar Search end -->


    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">


      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
          </div>
      </li>

    </ul>
    <!-- Navbar end -->
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <!-- roles -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('role_index') }}"><i class="fas fa-fw fa-folder"></i><span>User Roles</span></a>
      </li>
      <!-- roles end -->
      <!-- Users -->
      <li class="nav-item">
        <a class="nav-link" href="{{ route('user_index') }}"><i class="fas fa-fw fa-folder"></i><span>User</span></a>
      </li>
      <!-- Users end -->

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Employee</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="{{ route('emp_nameinfo') }}"><i class="fas fa-fw fa-folder"></i><span>Personal Information</span></a>
          <a class="dropdown-item" href="{{ route('emp_contactinfo') }}"><i class="fas fa-fw fa-folder"></i><span>Contact Information</span></a>
          <a class="dropdown-item" href="{{ route('emp_emergancyinfo') }}"><i class="fas fa-fw fa-folder"></i><span>Emergacy Information</span></a>
          <a class="dropdown-item" href="{{ route('emp_jobinfo') }}"><i class="fas fa-fw fa-folder"></i><span>Job Information</span></a>
          <a class="dropdown-item" href="{{ route('jobstatus') }}"><i class="fas fa-fw fa-folder"></i><span>Status Information</span></a>
          <a class="dropdown-item" href="{{ route('Ejob_index') }}"><i class="fas fa-fw fa-folder"></i><span>Salary Information</span></a>
        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Others</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">

          <a class="dropdown-item" href="{{ route('Eposition_index') }}"><i class="fas fa-fw fa-folder"></i><span>Job Position</span></a>
        </div>
      </li>



      <li class="nav-item">
        <a class="nav-link" href=""><i class="fas fa-fw fa-folder"></i><span>Product</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href=""><i class="fas fa-fw fa-folder"></i><span>Categories</span></a>
      </li>
    </ul>
<!-- Sidebar end -->



  <div id="content-wrapper">


      <div class="container-fluid">
        <div class="container">
            @yield('content')
        </div>
      <!--  Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright BB ©  2019</span>
          </div>
        </div>
      </footer>
      <!--  Footer end-->

    </div>
    <!-- /.content-wrapper -->

  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('dashboard/vendor/jquery/jquery.min.js') }}" defer></script>
  <script src="{{ asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('dashboard/vendor/jquery-easing/jquery.easing.min.js') }}" defer></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('dashboard/js/admin.min.js') }}" defer></script>
  <script src="{{ asset('js/form_snippet.js') }}" defer></script>

</body>

</html>
