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

        <title>Laravel</title>

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
                    <a class="navbar-brand">
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
                        <li class="nav-item mr-lg-4">
                            <a class="nav-link scroll" href="#about">about</a>
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
                                    <a href="#fotos" class="nav-link scroll">Fotos</a>
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
                                        <i class="fa fa-user"></i> {{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">
                                            <i class="fa fa-plus"></i> {{ __('Cadastrar-se') }}</a>
                                    </li>
                                @endif
                            </ul>

                        @else

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

    <!-- banner -->
    <section class="banner">
        <div class="banner-layer">
            <div class="container">
                <div class="row agile_banner_info">
                    <div class="col-md-7 agile_banner_margin">
                        <h2>Filhos Benditos</h2>
                        <p>
                            Ministério Filhos Benditos tem como objetivo levar o <br> 
                            ensinamento a uma geração inteira, com a missão de <br> 
                            adotar, treinar e ensinar uma multidão de órfãos <br> 
                            espirituais, a conhecerem a Deus e sua Paternidade, <br> 
                            para que  se tornem filhos de Deus e assim,  manifestem <br>
                            o caráter e as atitudes do verdadeiro Filho Bendito chamado: <br> 
                            Jesus Cristo.
                        </p>
                        <a target="_blank" href="http://www.filhosbenditos.com.br/"> Saiba mais </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //banner -->	

    <!-- about -->
    <section class="about py-5" id="about">
        <div class="container py-3">
            <h3 class="heading">Hope Church</h3>
            <div class="row about-grids">
                <div class="col-lg-4">
                    <h4>Nulla viverra pharetra sem, eget pulvinar neque pharetra ac int.</h4>
                    <p>Nulla viverra pharetra sem, eget pulvinar neque pharetra ac int. lorem ipsum Vestibulum. placerat placerat dolor. Vestibulum at dui nunc. Nullam eu elit neque lectus. Aliquam erat volutpat. Nullam ac mattis mi. Donec tincidunt leoelit dictum viverra luctus.</p>
                </div>
                <div class="col-lg-4">
                    <h4>Nulla viverra pharetra sem, eget pulvinar neque pharetra ac int.</h4>
                    <p>Nulla viverra pharetra sem, eget pulvinar neque pharetra ac int. lorem ipsum Vestibulum. placerat placerat dolor. Vestibulum at dui nunc. Nullam eu elit neque lectus. Aliquam erat volutpat. Nullam ac mattis mi. Donec tincidunt leoelit dictum viverra luctus.</p>
                </div>
                <div class="col-lg-4">
                    <h4>Nulla viverra pharetra sem, eget pulvinar neque pharetra ac int.</h4>
                    <p>Nulla viverra pharetra sem, eget pulvinar neque pharetra ac int. lorem ipsum Vestibulum. placerat placerat dolor. Vestibulum at dui nunc. Nullam eu elit neque lectus. Aliquam erat volutpat. Nullam ac mattis mi. Donec tincidunt leoelit dictum viverra luctus.</p>	
                </div>
            </div>
        </div>
    </section>
    <!-- about -->

    <!-- services -->
    <section class="services py-5" id="services">
        <div class="container py-3">
            <h3 class="heading">Cultos</h3>
            <div class="row service-grids">
                <div class="col-lg-4 col-md-6 agile w3-icon-grid1">
                    <h3> Terça-Feira</h3>
                    <p>Culto de louvor e adoração a Deus.</p>
                    <p>
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        Início as 20:00 horas.
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 agile mt-md-0 mt-sm-5 mt-4 w3-icon-grid1">
                    <h3>Quinta-feira</h3>
                    <p>
                        Culto de oração.
                    </p>
                    <p>
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        Início as 20:00 horas.
                    </p>
                </div>
                <div class="col-lg-4 col-md-6 agile mt-lg-0 mt-sm-5 mt-4 w3-icon-grid1">
                    <h3></i>Domingo</h3>
                    <p>
                        Culto de louvor e adoração a Deus.
                    </p>
                    <p>
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        Início as 18:00 horas.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- //services -->

    <!-- gallery -->
	<div class="gallery py-5" id="projects">
		<div class="container py-3">
            <h3 class="heading">Fotos</h3>
            <div class="row gallery_grid-more project-grids w3ls">
            <div class="col-md-4 p-0 pr-2 col-sm-3 col-6 agileits_w3layouts_gallery_grid1 hover14 column">
                <div class="w3_agile_gallery_effect">
                    <a href="images/salao3.jpg" data-lightbox="example-set" data-title="olá">
                        <figure>
                        <img src="images/salao3.jpg" alt=" " class="img-responsive" />
                        </figure>
                    </a>
                </div>
            </div>
            <div class="col-md-4 p-0 pr-2 col-sm-3 col-6 agileits_w3layouts_gallery_grid1 hover14 column">
                <div class="w3_agile_gallery_effect">
                    <a href="images/salao2.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                        <figure>
                        <img src="images/salao2.jpg" alt=" " class="img-responsive" />
                        </figure>
                    </a>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-4 p-0 col-sm-3 col-6 pt-sm-0 pt-2 agileits_w3layouts_gallery_grid1 hover14 column">
                <div class="w3_agile_gallery_effect">
                    <a href="images/salao1.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                        <figure>
                        <img src="images/salao1.jpg" alt=" " class="img-responsive" />
                        </figure>
                    </a>
                </div>
            </div>
            </div>
            <div class="row gallery_grid-more">
            <div class="col-md-4 p-0 col-sm-6 col-12 pt-sm-0 pt-2 agileits_w3layouts_gallery_grid1 w3layouts_gallery_grid1 hover14 column">
                <div class="w3_agile_gallery_effect">
                    <a href="images/culto1.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                        <figure>
                        <img src="images/culto1.jpg" alt=" " class="img-responsive" />
                        </figure>
                    </a>
                </div>
            </div>
            <div class="col-md-4 pt-2 pl-2 p-0 col-sm-3 col-6 agileits_w3layouts_gallery_grid1 hover14 column">
                <div class="w3_agile_gallery_effect">
                    <a href="images/teatrojeovanissi.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                        <figure>
                        <img src="images/teatrojeovanissi.jpg" alt=" " class="img-responsive" />
                        </figure>
                    </a>
                </div>
            </div>
            <div class="col-md-4 pt-2 pl-2 p-0 col-sm-3 col-6 agileits_w3layouts_gallery_grid1 hover14 column">
                <div class="w3_agile_gallery_effect">
                    <a href="images/workshopcacau.jpg" data-lightbox="example-set" data-title="Lorem Ipsum is simply dummy the when an unknown galley of type and scrambled it to make a type specimen.">
                        <figure>
                        <img src="images/workshopcacau.jpg" alt=" " class="img-responsive" />
                        </figure>
                    </a>
                </div>
            </div>
            <div class="clearfix"> </div>
            </div>
	    </div>
    </div>
    <!-- //gallery -->

    <!-- contact -->
    <section class="contact py-5" id="contact">
        <div class="container py-3">
            <h3 class="heading">Contact</h3>
            <div class="row contact-grids">
                <div class="col-lg-5 contact-left">
                    <h4 class="mb-4">Address Info</h4>
                    <div class="row">
                        <div class="col-1 pr-0 icon">
                            <i class="fa fa-envelope-open" aria-hidden="true"></i>
                        </div>
                        <div class="col-11">
                            <h5>Email</h5>
                            <p><a href="mailto:example@email.com"> mail@example.com</a></p>
                            <p><a href="mailto:example1@email.com"> mail@example1.com</a></p>
                        </div>
                        <div class="col-1 pr-0 icon mt-4">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div>
                        <div class="col-11 mt-4">
                            <h5>Phone</h5>
                            <p> +112 367 896 2449</p>
                            <p> +112 367 896 2449</p>
                        </div>
                        <div class="col-1 pr-0 icon mt-4">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <div class="col-11 mt-4">
                            <h5>Address</h5>
                            <p>24H Main Block, 4th cross, California,</p>
                            <p> California - 94203</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mt-lg-0 mt-5 contact-right">
                    <h4 class="mb-4">Get In Touch</h4>
                    <form action="#" method="post">
                        <label><i class="fa mr-2 fa-user" aria-hidden="true"></i> Name</label>
                        <input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                        <div class="clearfix"></div>
                        <label><i class="fa mr-2 fa-envelope-open" aria-hidden="true"></i>Email</label>
                        <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                        <div class="clearfix"></div>
                        <label><i class="fa mr-2 fa-phone" aria-hidden="true"></i>Phone</label>
                        <input type="text" name="Phone" value="Phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Phone';}" required="">
                        <div class="clearfix"></div>
                        <label><i class="fa mr-2 fa-edit" aria-hidden="true"></i>Message</label>
                        <textarea name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- //contact -->

    <!-- map -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3678.2626712288697!2d-43.291455385036414!3d-22.792728885070012!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x997af4bf489177%3A0xb61ba396b5cad5ec!2sHope%20Church!5e0!3m2!1spt-BR!2sbr!4v1583882201677!5m2!1spt-BR!2sbr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe><br>
    </div>
    <!-- //map -->

    <!-- footer -->
    <footer class="py-5">
        <div class="container">
            <div class="agileinfo-grids">
                <div class="agile-grid-left agile-grid-right text-center">
                    <div class="social mb-4">
                        <ul>
                            <li><a target="_blank" href="https://www.facebook.com/hopefilhosbenditos/"><i class="fa mr-2 fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa mr-2 fa-twitter"></i></a></li>
                            <li><a target="_blank" href="https://www.instagram.com/igrejahope/"><i class="fa mr-2 fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright text-center">
                <p>© 2020 Todos os direitos reservados | Design by <a target="_blank" href="https://jospcode.dev/"> < Josp.Code /></a> </p>
            </div>
        </div>
    </footer>
    <!-- //footer -->

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

        
    </body>
</html>
