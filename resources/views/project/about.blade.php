
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
            <div class="page-header-bg" style="background-image: url({{asset('resp/images/backgrounds/page-header-bg.jpg')}})">
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
                        <li><a href="#">Home</a></li>
                        <li><span>/</span></li>
                        <li>About</li>
                    </ul>
                    <h2>About</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--About Two Start-->
        <section class="about-two">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="about-two__left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">our introduction</span>
                                <h2 class="section-title__title">Get to Know About Qrowd Platform</h2>
                            </div>
                            <p class="about-two__text-1">We empower people to unite around ideas that matter.</p>
                            <p class="about-two__text-2">There are many variations of passages of Lorem Ipsum available,
                                but the majority have suffered alteration in some form, by injected humour, or
                                randomised words which don't look.</p>
                            <div class="about-two__progress">
                                <div class="about-two__progress-single">
                                    <h4 class="about-two__progress-title">Crowdfunding</h4>
                                    <div class="bar">
                                        <div class="bar-inner count-bar" data-percent="70%">
                                            <div class="count-text">70%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="about-one__person">
                                <div class="about-one__person-img">
                                    <img src="{{asset('resp/images/resources/about-1-3.jpg')}}" alt="">
                                </div>
                                <div class="about-one__person-content">
                                    <p class="about-one__person-name">tahamajdoub</p>
                                    <p class="about-one__person-foundation">CEO Foundation</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="about-two__right">
                            <div class="about-two__img-box">
                                <div class="about-two__img">
                                    <img src="{{asset('resp/images/resources/about-two-img-1.jpg')}}" alt="">
                                </div>
                                <div class="about-two__img-two">
                                    <img src="{{asset('resp/images/resources/about-two-img-2.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--About Two End-->

        <!--Brand One Start-->
        <section class="brand-one">
            <div class="container">
                <div class="brand-one__title"></div>
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, 
                "slidesPerView": 5,
                "loop": true, 
                "navigation": {
                    "nextEl": "#brand-one__swiper-button-next",
                    "prevEl": "#brand-one__swiper-button-prev"
                }, 
                "autoplay": { "delay": 5000 }, 
                "breakpoints": {
                    "0": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "375": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "575": {
                        "spaceBetween": 30,
                        "slidesPerView": 3
                    },
                    "767": {
                        "spaceBetween": 50,
                        "slidesPerView": 4
                    },
                    "991": {
                        "spaceBetween": 50,
                        "slidesPerView": 5
                    },
                    "1199": {
                        "spaceBetween": 100,
                        "slidesPerView": 5
                    }
                }}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-1-1.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-1-2.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-1-3.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-1-4.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-1-5.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-1-1.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-1-2.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-1-3.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-1-4.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-1-5.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                    </div>
                </div>
                <!-- If we need navigation buttons -->
                <div class="brand-one__nav">
                    <div class="swiper-button-prev" id="brand-one__swiper-button-next">
                        <i class="fas fa-angle-left"></i>
                    </div>
                    <div class="swiper-button-next" id="brand-one__swiper-button-prev">
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </section>
        <!--Brand One End-->

        <!--Changing One Start-->
        <section class="changing-one changing-two">
            <div class="changing-one__bg" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url({{asset('resp/images/backgrounds/changing-bg.jpg')}});"></div>
            <div class="container">
                <div class="changing-one__inner">
                    <p class="changing-one__sub-title">Roundup of Standout Projects</p>
                    <h2 class="changing-one__title">Qrowd is Changing the Way <br> New Ideas Come to Life</h2>
                    <a href="{{ route('login') }}" class="thm-btn">Start a Project</a>
                </div>
            </div>
        </section>
        <!--Changing One End-->

        <!--Testimonial Two Start-->
        <section class="testimonial-two testimonial-three">
            <div class="testimonial-two-bg"
                style="background-image: url({{asset('resp/images/backgrounds/testimonial-two-bg.png')}});"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="testimonial-two__left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Our Testimonials</span>
                                <h2 class="section-title__title">Client Reviews Directly from the Qrowd</h2>
                            </div>
                            <p class="testimonial-two__text">Nunc eleifend eget nunc eget quis not consequat. Etiam sed
                                varius est. Proin et lacus odio.</p>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="testimonial-two__right">
                            <div class="testimonial-two__carousel owl-carousel owl-theme thm-owl__carousel"
                                data-owl-options='{
                                "loop": true,
                                "autoplay": true,
                                "margin": 30,
                                "nav": true,
                                "dots": false,
                                "smartSpeed": 500,
                                "autoplayTimeout": 10000,
                                "navText": ["<span class=\"icon-right-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"],
                                "responsive": {
                                    "0": {
                                        "items": 1
                                    },
                                    "768": {
                                        "items": 2
                                    },
                                    "992": {
                                        "items": 2
                                    },
                                    "1200": {
                                        "items": 2
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

                                <!--Testimonial Two Single End-->
                                <!--Testimonial Two Single Start-->
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonial Two End-->

        <!--Team One Start-->
        <section class="team-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Meet our experts</span>
                    <h2 class="section-title__title">We can Advice & Help <br> you to Grow</h2>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <!--Team One Single Start-->
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <img src="{{asset('resp/images/team/team-1-1.jpg')}}" alt="">
                            </div>
                            <div class="team-one__content">
                                <h3 class="team-one__name"><a href="#">Mike Hardson</a></h3>
                                <p class="team-one__sub-title">Consultant</p>
                                <div class="team-one__social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--Team One Single End-->
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <!--Team One Single Start-->
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <img src="{{asset('resp/images/team/team-1-2.jpg')}}" alt="">
                            </div>
                            <div class="team-one__content">
                                <h3 class="team-one__name"><a href="team.html">Sarah Albert</a></h3>
                                <p class="team-one__sub-title">Manager</p>
                                <div class="team-one__social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--Team One Single End-->
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                        <!--Team One Single Start-->
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <img src="{{asset('resp/images/team/team-1-3.jpg')}}" alt="">
                            </div>
                            <div class="team-one__content">
                                <h3 class="team-one__name"><a href="team.html">Kevin Martin</a></h3>
                                <p class="team-one__sub-title">Director</p>
                                <div class="team-one__social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--Team One Single End-->
                    </div>
                </div>
            </div>
        </section>
        <!--Team One End-->

        <!--Ready One Start-->
        <section class="ready-one">
            <div class="container">
                <div class="ready-one__inner">
                    <div class="ready-one-shape-1 float-bob-x">
                        <img src="{{asset('resp/images/shapes/ready-one-shape-1.png')}}" alt="">
                    </div>
                    <div class="ready-one__big-icon float-bob-y-2">
                        <span class="icon-fundraiser"></span>
                    </div>
                    <div class="ready-one__left">
                        <div class="icon">
                            <span class="icon-fundraiser"></span>
                        </div>
                        <div class="content">
                            <p>Your story starts from here</p>
                            <h3>Ready to raise funds for idea?</h3>
                        </div>
                    </div>
                    <div class="ready-one__right">
                        <a href="{{ route('login') }}" class="thm-btn ready-one__btn">Make it Happen</a>
                    </div>
                </div>
            </div>
        </section>
        <!--Ready One End-->

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
