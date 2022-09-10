@extends('project/lil')
@section('content')
<div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>





    <div class="preloader">
        <div class="preloader__image"></div>
    </div>
    <!-- /.preloader -->


    <div class="page-wrapper">
        <header class="main-header-three">
            <div class="main-header-three__top">
                <div class="container">
                    <div class="main-header-three__inner">
                        <div class="main-header-three__top-left">
                            <ul class="list-unstyled main-header-three__contact-list">
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="text">
                                        <p>30 Commercial road fratton, Australia</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="text">
                                        <p><a href="mailto:needhelp@company.com">needhelp@company.com</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="main-header-three__top-right">
                            <div class="main-header-three__login">
                                <ul class="list-unstyled main-header-three__login-list">
                                    <li> <p><a href=" #"> USER: {{ Auth::user()->name }}</a></a></p></li>
                                    <li> <p><a href=" #">
                                        <x-dropdown align="right" width="48">
                                              <x-slot name="trigger">

                                         <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </x-slot>
                                        <x-slot name="content">
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-responsive-nav-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-responsive-nav-link>
                                    </form>
                                    </li>
                                </ul>
                            </div>
                            <div class="main-header-three__btn-box">
                                <a href="project-details.html" class="thm-btn main-header-three__btn"><i
                                        class="icon-plus-symbol"></i>Add a Project</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="main-menu main-menu-three">
                <div class="container">
                    <div class="main-menu-three__wrapper">
                        <div class="main-menu-three__left">
                            <div class="main-menu-three__logo">
                                <a href="#"><img src="{{asset('resp/images/resources/logo-1.png')}}" alt=""></a>
                            </div>
                        </div>
                        <div class="main-menu-three__right">
                            <div class="main-menu-three__main-menu-box">
                                <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                                <ul class="main-menu__list">
                                    <li class="dropdown current megamenu">
                                        <a href="#">Home </a>






                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ route('about') }}">About</a>

                                    </li>
                                    <li class="dropdown">
                                        <a href="#">FAQs</a>

                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Gallery</a>

                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ route('teams') }}">Team</a>

                                    </li>
                                    <li class="dropdown">
                                        <a href="{{ route('testimonial') }}">Testimonials</a>

                                    </li>
                                    <li class="dropdown">
                                        <a href="#">Partners</a>

                                    </li>


                                </ul>
                            </div>
                            <div class="main-menu-three__search-box">
                                <a href="#" class="main-menu-three__search search-toggler icon-magnifying-glass"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <div class="stricky-header stricked-menu main-menu main-menu-three">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->
  <!--Page Header Start-->
   <section class="page-header">
    <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg)">
    </div>
    <div class="page-header-shape-1 float-bob-x">
        <img src="{{asset('resp/images/shapes/page-header-shape-1.png')}}" alt="">
    </div>
    <div class="page-header-shape-2 float-bob-y">
        <img src="{{asset('resp/images/shapes/page-header-shape-2.png')}}" alt="">
    </div>
    <div class="page-header-shape-3 float-bob-x">
        <img src="{{asset('resp/images/shapes/page-header-shape-3.png')}}" alt="">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="index.html">Home</a></li>
                <li><span>/</span></li>
                <li>Testimonials</li>
            </ul>
            <h2>Testimonials Carousel</h2>
        </div>
    </div>
</section>
<!--Page Header End-->

<!--Testimonials Page Start-->
<section class="testimonials-carousel-page">
    <div class="container">
        <div class="testimonials-carousel-box thm-owl__carousel owl-theme owl-carousel carousel-dot-style"
            data-owl-options='{
            "items": 3,
            "margin": 30,
            "smartSpeed": 700,
            "loop":true,
            "autoplay": 6000,
            "nav":false,
            "dots":true,
            "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
            "responsive":{
                "0":{
                    "items":1
                },
                "768":{
                    "items":2
                },
                "992":{
                    "items": 3
                }
            }
        }'>
            <!--Testimonial Two Single Start-->
            @foreach($testimonials as $item)

            <div class="item">
                <div class="testimonial-two__single">
                    <div class="testimonial-two__client-info">

                        <div class="testimonial-two__client-img">

                            <img src="/Image/{{ $item->image }}" alt="">
                        </div>
                        <div class="testimonial-two__client-content">
                            <h4 class="testimonial-two__client-name">                            
                         {{ $item->name }}
                            </h4>
                            <p class="testimonial-two__client-sub-title">{{ $item->displayname }}</p>
                        </div>
                    </div>
                    <p class="testimonial-two__text-2">{{ $item->text }}</p>
                    <div class="testimonial-two__quote">
                        <span class="icon-quotes"></span>
                    </div>
                    <div class="testimonial-two__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!--Testimonials Page End-->

  <!--Site Footer Start-->
  <footer class="site-footer">
    <div class="site-footer__top">
        <div class="site-footer__shape-1 float-bob-x">
            <img src="{{asset('resp/images/shapes/site-footer-shape-1.png')}}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget__column footer-widget__about">
                        <div class="footer-widget__logo">
                            <a href="#"><img src="{{asset('resp/images/resources/footer-logo.png')}}" alt=""></a>
                        </div>
                        <div class="footer-widget__about-text-box">
                            <p class="footer-widget__about-text">Lorem quas utamur delicata qui, vix ei prima
                                mentitum omnesque. Duo corrumpit
                                cotidieque ne.</p>
                        </div>
                        <form class="footer-widget__subscribe-box">
                            <div class="footer-widget__subscribe-input-box">
                                <input type="email" placeholder="Email address" name="email">
                                <button type="submit" class="footer-widget__subscribe-btn"><img
                                        src="{{asset('resp/images/icon/paper-plan.png')}}" alt=""></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="footer-widget__column footer-widget__Explore">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Explore</h3>
                        </div>
                        <ul class="footer-widget__Explore-list list-unstyled">
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('about') }}">How it Works</a></li>
                            <li><a href="{{ route('about') }}">Knowledge Hub</a></li>
                            <li><a href="#">Success Stories</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="footer-widget__column footer-widget__Fundraising">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Fundraising</h3>
                        </div>
                        <ul class="footer-widget__Explore-list list-unstyled">
                            <li><a href="{{ route('about') }}">Design</a></li>
                            <li><a href="{{ route('about') }}">Education</a></li>
                            <li><a href="{{ route('about') }}">Technology</a></li>
                            <li><a href="{{ route('about') }}">Games</a></li>
                            <li><a href="{{ route('about') }}">Film & Video</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="footer-widget__column footer-widget__Contact">
                        <div class="footer-widget__title-box">
                            <h3 class="footer-widget__title">Contact</h3>
                        </div>
                        <ul class="footer-widget__Contact-list list-unstyled">
                            <li>
                                <div class="icon">
                                    <span class="icon-telephone"></span>
                                </div>
                                <div class="text">
                                    <p><a href="tel:+9288006780">+92 ( 8800 ) - 6780</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-email"></span>
                                </div>
                                <div class="text">
                                    <p><a href="mailto:needhelp@company.com">needhelp@company.com</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <span class="icon-pin"></span>
                                </div>
                                <div class="text">
                                    <p>30 broklyn golden street line. New York</p>
                                </div>
                            </li>
                        </ul>
                        <div class="site-footer__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer__bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="site-footer__bottom-inner">
                        <p class="site-footer__bottom-text">© Copyright 2022 by <a href="#">Qrowd.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--Site Footer End-->


</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
<div class="mobile-nav__overlay mobile-nav__toggler"></div>
<!-- /.mobile-nav__overlay -->
<div class="mobile-nav__content">
    <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

    <div class="logo-box">
        <a href="index.html" aria-label="logo image"><img src="{{asset('resp/images/resources/logo-2.png')}}" width="143"
                alt="" /></a>
    </div>
    <!-- /.logo-box -->
    <div class="mobile-nav__container"></div>
    <!-- /.mobile-nav__container -->

    <ul class="mobile-nav__contact list-unstyled">
        <li>
            <i class="fa fa-envelope"></i>
            <a href="mailto:needhelp@packageName__.com">needhelp@qrowd.com</a>
        </li>
        <li>
            <i class="fa fa-phone-alt"></i>
            <a href="tel:666-888-0000">666 888 0000</a>
        </li>
    </ul><!-- /.mobile-nav__contact -->
    <div class="mobile-nav__top">
        <div class="mobile-nav__social">
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-facebook-square"></a>
            <a href="#" class="fab fa-pinterest-p"></a>
            <a href="#" class="fab fa-instagram"></a>
        </div><!-- /.mobile-nav__social -->
    </div><!-- /.mobile-nav__top -->



</div>
<!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<div class="search-popup">
<div class="search-popup__overlay search-toggler"></div>
<!-- /.search-popup__overlay -->
<div class="search-popup__content">
    <form action="#">
        <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
        <input type="text" id="search" placeholder="Search Here..." />
        <button type="submit" aria-label="search submit" class="thm-btn">
            <i class="icon-magnifying-glass"></i>
        </button>
    </form>
</div>
<!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>
@endsection