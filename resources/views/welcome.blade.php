
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>SSMS</title>
    <!-- Latest compiled and minified CSS -->
    
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/homepagecss.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

   


</head>

<body data-spy="scroll" data-target="#myScrollspy">

  <nav class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="205">
          <div class="container-fluid">
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="#">SSMS</a> </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                  <ul class="nav navbar-nav navbar-right">

                    @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/denied') }}">Denied</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth
                    @endif
                  </ul>
              </div>
          </div>
      </nav>
    <header style="background-image:url('{{asset('Images/home.jpg')}}');">
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Super Shop Management System</h1>
                <p>...Please Log In To Continue...</p>
            </div>
        </div>
    </header>


    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                    <h3>Let's Get In Touch!</h3>
                    <p>Developed By ai.Abir</p>
                    <div class="gap">
                    <div class="col-sm-6 col-xs-12">
                        <span class="glyphicon glyphicon-earphone"></span>
                        <a>Contact No: 01515297427</a>
                    </div>
                     <div class="col-sm-6 col-xs-12">
                        <span class="glyphicon glyphicon-envelope"></span>
                        <a>Email: azizulabir1610@gmail.com</a>
                    </div>
                    </div>

                </div>
            </div>
        </div>

    </footer>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>


  <script type="text/javascript">
  $(document).ready(function () {
           $(document).on("scroll", onScroll);
           //smoothscroll
           $('.navbar-nav li a[href^="#"]').on('click', function (e) {
               e.preventDefault();
               $(document).off("scroll");
               $('.navbar-nav li a').each(function () {
                   $(this).removeClass('active');
               })
               $(this).addClass('active');
               var target = this.hash
                   , menu = target;
               target = $(target);
               $('html, body').stop().animate({
                   'scrollTop': target.offset().top + 2
               }, 1000, 'swing', function () {
                   window.location.hash = target;
                   $(document).on("scroll", onScroll);
               });
           });
       });

       function onScroll(event) {
           var scrollPos = $(document).scrollTop();
           $('.navbar-nav li a').each(function () {
               var currLink = $(this);
               var refElement = $(currLink.attr("href"));
               if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
                   $('.navbar-nav li a').removeClass("active");
                   currLink.addClass("active");
               }
               else {
                   currLink.removeClass("active");
               }
           });
       }

  </script>
</body>

</html>
