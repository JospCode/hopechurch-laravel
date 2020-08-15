 <!DOCTYPE html>
<html lang="pt-br">
    <head>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <meta name="keywords" content="Personal View Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript">
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <!--// Meta tag Keywords -->
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Hope Church</title>

        <link rel="shortcut icon" type="image/x-png" href="../images/logo1.png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- bootstrap cdn --> 
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- fontawesome cdn --> 
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet">

    </head>
    <body>

    <header>	
        <div class="container">
            <!-- nav -->
            <nav class="navbar navbar-expand-lg navbar-light py-4">
                <!-- logo -->
                <h1>
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        Hope Church
                    </a>
                </h1>
                <!-- //logo -->
                <button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- main nav -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if (Route::has('login'))                    
                    <ul class="navbar-nav ml-lg-auto text-center">
                        @if(Auth::user()->admin == '1')
                        <li class="nav-item mr-lg-4">
                            <a class="nav-link" href="{{ route('administrativo') }}">Área Adm</a>
                        </li>
                        @endif
                        
                        <li class="nav-item mr-lg-4">
                            <a class="nav-link scroll" href="#about">Sobre</a>
                        </li>
                        <li class="nav-item mr-lg-4">
                            <a class="nav-link scroll" href="#services">Cultos</a>
                        </li>
                        <li class="dropdown nav-item mr-lg-4">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle ">
                                Pages
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="nav-item">
                                    <a href="#projects" class="nav-link scroll">Fotos</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#videos" class="nav-link scroll">Vídeos</a>
                                </li>
                                <li class="nav-item">  
                                    <a class="nav-link" href="{{ route('posts.index') }}">Forum</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="nav-item">
                                    <a href="#contact" class="nav-link scroll">Contato</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                        
                        <li class="dropdown nav-item mr-lg-4">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle ">
                                Entrar
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="fa fa-user" aria-hidden="true"></i>{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">
                                            <i class="fa fa-" aria-hidden="true"></i>{{ __('Cadastrar-se') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                            
                        @else

                        <li class="dropdown nav-item mr-lg-4">
                            <!-- <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle ">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                <b class="caret"></b>
                            </a> -->
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if (auth()->user()->image)
                                    <img src="{{ asset(auth()->user()->image) }}" style="width: 20px; height: 20px; border-radius: 50%;">
                                @endif
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            <ul class="dropdown-menu" role="menu">
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('profile') }}"><i class="fa fa-user-circle" aria-hidden="true"></i> Profile</a>
                                </li>
                                <div class="dropdown-divider"></div>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        
                                        @csrf

                                    </form>
                                </li>
                            </ul>
                        </li>
                            
                        @endguest
                        <!-- Authentication Links -->

                    </ul>

                @endif

                </div>
                <!-- //main nav -->
            </nav>
            <!-- //nav -->
        </div>
    </header>
    

    <main>
        @yield('content')
    </main>
        

    @section('scripts')
    <!-- js -->
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
    <!-- //js -->	
    
    <!--  light box js -->
    <script src="js/lightbox-plus-jquery.min.js"> </script> 
    <!-- //light box js-->
    <!-- for-Testimonials -->
    <!-- required-js-files-->
    <link href="css/owl.carousel.css" rel="stylesheet">
        <script src="js/owl.carousel.js"></script>
            <script>
        $(document).ready(function() {
        $("#owl-demo").owlCarousel({
            items : 1,
            lazyLoad : true,
            autoPlay : true,
            navigation : false,
            navigationText :  false,
            pagination : true,
        });
        });
        </script>
    <!--//required-js-files-->
    <!-- //for-Testimonials -->


    <!-- start-smoth-scrolling -->
    <script src="js/SmoothScroll.min.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){		
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
                var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
                };
            */
                                
            $().UItoTop({ easingType: 'easeOutQuart' });
                                
            });
    </script>
    <!-- //here ends scrolling icon -->
    <!-- start-smoth-scrolling -->
    @show

</body>
</html>
