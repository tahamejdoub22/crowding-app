<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title> Home Three || Qrowd || Qrowd HTML 5 Template </title>
        <!-- favicons Icons -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('resp/images/favicons/apple-touch-icon.png')}}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('resp/images/favicons/favicon-32x32.png')}}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('resp/images/favicons/favicon-16x16.png')}}" />
        <link rel="manifest" href="{{asset('resp/images/favicons/site.webmanifest')}}" />
        <meta name="description" content="Qrowd HTML 5 Template " />
    
        <!-- fonts -->
        <link rel="preconnect" href="{{asset('https://fonts.googleapis.com')}}">
    
        <link rel="preconnect" href="{{asset('https://fonts.gstatic.com')}}" crossorigin>
    
        <link href="{{asset('https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap')}}"
            rel="stylesheet">
    
        <link rel="stylesheet" href="{{asset('resp/vendors/bootstrap/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/animate/animate.min.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/animate/custom-animate.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/fontawesome/css/all.min.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/jarallax/jarallax.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/jquery-magnific-popup/jquery.magnific-popup.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/nouislider/nouislider.min.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/nouislider/nouislider.pips.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/odometer/odometer.min.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/swiper/swiper.min.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/qrowd-icons/style.css')}}">
        <link rel="stylesheet" href="{{asset('resp/vendors/tiny-slider/tiny-slider.min.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/reey-font/stylesheet.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/owl-carousel/owl.carousel.min.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/owl-carousel/owl.theme.default.min.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/bxslider/jquery.bxslider.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/bootstrap-select/css/bootstrap-select.min.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/vegas/vegas.min.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/jquery-ui/jquery-ui.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/vendors/timepicker/timePicker.css')}}" />
    
        <!-- template styles -->
        <link rel="stylesheet" href="{{asset('resp/css/qrowd.css')}}" />
        <link rel="stylesheet" href="{{asset('resp/css/qrowd-responsive.css')}}" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="custom-cursor">
        <div class="custom-cursor__cursor"></div>
        <div class="custom-cursor__cursor-two"></div>   
        <div class="preloader">
            <div class="preloader__image"></div>
        </div>
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
                            <div class="hidden fixed top-0 right-0 sm:block">

                            <div class="main-header-three__login">
                                    @if (Route::has('login'))

                                        <ul class="list-unstyled main-header-three__login-list">

                                        @auth
                                         <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ Auth::user()->name }}</a>
                                        @else
                                        <li>  <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a> </li>
                    
                                            @if (Route::has('register'))
                                            <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                                            @endif
                                        @endauth
                                    </ul>


                                @endif
                            </div>
                        </div>

                            <div class="main-header-three__btn-box">
                                <a href="{{ route('login') }}" class="thm-btn main-header-three__btn"><i
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

        <!--Main Slider Start-->
        <section class="main-slider-three clearfix">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 5000
                }}'>
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="image-layer-three"
                            style="background-image: url({{asset('resp/images/backgrounds/main-slider-3-1.jpg')}});"></div>
                        <!-- /.image-layer -->
                        <div class="main-slider-three-shape"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <div class="main-slider-three__content">
                                        <p class="main-slider-three__sub-title">Ultimate Crowdfunding Platform</p>
                                        <h2 class="main-slider-three__title">Change the way <br>
                                            art is valued</h2>
                                        <p class="main-slider-three__text">Qrowd is where early adopters and innovation
                                            seekers find lively, <br>
                                            imaginative tech before it hits the mainstream.</p>
                                        <div class="main-slider-three__btn-box">
                                            <a href="{{ route('login') }}" class="thm-btn main-slider__btn"> Start a
                                                Project</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image-layer-three"
                            style="background-image: url({{asset('resp/images/backgrounds/main-slider-3-2.jpg')}});"></div>
                        <!-- /.image-layer -->
                        <div class="main-slider-three-shape"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <div class="main-slider-three__content">
                                        <p class="main-slider-three__sub-title">Ultimate Crowdfunding Platform</p>
                                        <h2 class="main-slider-three__title">Change the way <br>
                                            art is valued</h2>
                                        <p class="main-slider-three__text">Qrowd is where early adopters and innovation
                                            seekers find lively, <br>
                                            imaginative tech before it hits the mainstream.</p>
                                        <div class="main-slider-three__btn-box">
                                            <a href="{{ route('login') }}" class="thm-btn main-slider__btn"> Start a
                                                Project</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="image-layer-three"
                            style="background-image: url({{asset('resp/images/backgrounds/main-slider-3-3.jpg')}});"></div>
                        <!-- /.image-layer -->
                        <div class="main-slider-three-shape"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-8">
                                    <div class="main-slider-three__content">
                                        <p class="main-slider-three__sub-title">Ultimate Crowdfunding Platform</p>
                                        <h2 class="main-slider-three__title">Change the way <br>
                                            art is valued</h2>
                                        <p class="main-slider-three__text">Qrowd is where early adopters and innovation
                                            seekers find lively, <br>
                                            imaginative tech before it hits the mainstream.</p>
                                        <div class="main-slider-three__btn-box">
                                            <a href="{{ route('login') }}" class="thm-btn main-slider__btn"> Start a
                                                Project</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- If we need navigation buttons -->
                <div class="main-slider__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                        <i class="icon-right-arrow"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                        <i class="icon-right-arrow"></i>
                    </div>
                </div>

            </div>
        </section>
        <!--Main Slider End-->

        <!--Welcome One Start-->
        <section class="welcome-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="welcome-one__left wow slideInLeft" data-wow-delay="100ms"
                            data-wow-duration="2500ms">
                            <div class="welcome-one__img-one">
                                <img src="{{asset('resp/images/resources/welcome-1-1.jpg')}}" alt="">
                            </div>
                            <div class="welcome-one__img-two">
                                <img src="{{asset('resp/images/resources/welcome-1-2.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="welcome-one__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Crowdfunding platform</span>
                                <h2 class="section-title__title">Raising Money has Never Been Easy</h2>
                            </div>
                            <h3 class="welcome-one__sub-title">We empower people to unite around ideas that matter.</h3>
                            <p class="welcome-one__text">There are many variations of passages of Lorem Ipsum available,
                                but the majority have suffered alteration in some form, by injected humour, or
                                randomised words which don't look.</p>
                            <ul class="welcome-one__points list-unstyled">
                                <li>
                                    <div class="icon">
                                        <span class="icon-success"></span>
                                    </div>
                                    <div class="content">
                                        <h3>Highest Success Rates</h3>
                                        <p>Magna aliqa enim sed ipsum nisi ainy veniam quis</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-money-bag"></span>
                                    </div>
                                    <div class="content">
                                        <h3>Millions in Funding</h3>
                                        <p>Lorem ipsum dolor sit ametys consectet elit</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="welcomw-one__bottom">
                                <a href="{{ route('about') }}" class="thm-btn">Discover More</a>
                                <a href="#" class="welcome-one__expert">Speak with Expert</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Welcome One End-->


        <!--Creator Funded Start-->
        <section class="creator-funded">
            <div class="creator-funded-bg jarallax" data-jarallax data-speed="0.2" data-imgPosition="50% 0%"
                style="background-image: url({{asset('resp/images/backgrounds/creator-funded-bg.jpg')}});"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="creator-funded__left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">our platform benefits</span>
                                <h2 class="section-title__title">Helping Our Creators to Build a Memebership Businesses
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="creator-funded__right">
                            <ul class="list-unstyled creator-funded__points">
                                <li>
                                    <div class="icon">
                                        <span class="icon-check-mark"></span>
                                    </div>
                                    <div class="text">
                                        <p>Raise funds with a crowdfunding campaign</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-check-mark"></span>
                                    </div>
                                    <div class="text">
                                        <p>Extend your campaign with Indemand</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-check-mark"></span>
                                    </div>
                                    <div class="text">
                                        <p>Fast track to the global market</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Creator Funded End-->

        <!--Brand One Start-->
        <section class="brand-two">
            <div class="container">
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
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
                            <img src="{{asset('resp/images/brand/brand-2-1.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-2-2.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('respassets/images/brand/brand-2-3.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-2-4.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-2-5.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-2-1.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-2-2.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-2-3.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-2-4.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{asset('resp/images/brand/brand-2-5.png')}}" alt="">
                        </div><!-- /.swiper-slide -->
                    </div>
                </div>
            </div>
        </section>
        <!--Brand One End-->

        
                       

        <!--Services One Start-->
        <section class="services-one">
            <div class="services-one-shape-1 float-bob-x"
                style="background-image: url({{asset('resp/images/shapes/services-one-shape-1.png')}});"></div>
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Services we’re offering</span>
                    <h2 class="section-title__title">Our Highlighted Services <br> for Creative People</h2>
                </div>
                <div class="row">
                    <!--Services One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                        <div class="services-one__single">
                            <div class="services-one__single-inner">
                                <div class="services-one__single-bg"
                                    style="background-image: url({{asset('resp/images/backgrounds/services-one-single-bg.jpg')}});">
                                </div>
                                <div class="services-one__icon">
                                    <span class="icon-document"></span>
                                </div>
                                <h3 class="services-one__title"><a href="#">Backer Reports</a></h3>
                                <p class="services-one__text">Nunc eleifend eget nunc eget consequat. Etiam sed varius
                                    est.
                                    Proin et lacus odio.</p>
                            </div>
                        </div>
                    </div>
                    <!--Services One Single End-->
                    <!--Services One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                        <div class="services-one__single">
                            <div class="services-one__single-inner">
                                <div class="services-one__single-bg"
                                    style="background-image: url({{asset('resp/images/backgrounds/services-one-single-bg.jpg')}});">
                                </div>
                                <div class="services-one__icon">
                                    <span class="icon-dashboard"></span>
                                </div>
                                <h3 class="services-one__title"><a href="#">Creator Dashboard</a></h3>
                                <p class="services-one__text">Nunc eleifend eget nunc eget consequat. Etiam sed varius
                                    est.
                                    Proin et lacus odio.</p>
                            </div>
                        </div>
                    </div>
                    <!--Services One Single End-->
                    <!--Services One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                        <div class="services-one__single">
                            <div class="services-one__single-inner">
                                <div class="services-one__single-bg"
                                    style="background-image: url({{asset('resp/images/backgrounds/services-one-single-bg.jpg')}});">
                                </div>
                                <div class="services-one__icon">
                                    <span class="icon-deadline"></span>
                                </div>
                                <h3 class="services-one__title"><a href="about.html">Set a Deadline</a></h3>
                                <p class="services-one__text">Nunc eleifend eget nunc eget consequat. Etiam sed varius
                                    est.
                                    Proin et lacus odio.</p>
                            </div>
                        </div>
                    </div>
                    <!--Services One Single End-->
                    <!--Services One Single Start-->
                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                        <div class="services-one__single">
                            <div class="services-one__single-inner">
                                <div class="services-one__single-bg"
                                    style="background-image: url({{asset('resp/images/backgrounds/services-one-single-bg.jpg')}});">
                                </div>
                                <div class="services-one__icon">
                                    <span class="icon-benchmark"></span>
                                </div>
                                <h3 class="services-one__title"><a href="#">Google Analysis</a></h3>
                                <p class="services-one__text">Nunc eleifend eget nunc eget consequat. Etiam sed varius
                                    est.
                                    Proin et lacus odio.</p>
                            </div>
                        </div>
                    </div>
                    <!--Services One Single End-->
                </div>
            </div>
        </section>
        <!--Services One End-->

        <!--Testimonial Two Start-->
        <section class="testimonial-two">
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
                                <div class="item">
                                    <div class="testimonial-two__single">
                                        <div class="testimonial-two__client-info">
                                            <div class="testimonial-two__client-img">
                                                <img src="{{asset('resp/images/testimonial/testimonial-two-client-img-1.jpg')}}"
                                                    alt="">
                                            </div>
                                            <div class="testimonial-two__client-content">
                                                <h4 class="testimonial-two__client-name">Sarah Albert</h4>
                                                <p class="testimonial-two__client-sub-title">CO Founder</p>
                                            </div>
                                        </div>
                                        <p class="testimonial-two__text-2">Exercitation ullamco laboris nisi ut aliquip
                                            ex ea ex commodo consequat duis aute aboris nisi ut aliquip irure
                                            reprehederit in voluptate velit esse .</p>
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
                                <!--Testimonial Two Single End-->
                                <!--Testimonial Two Single Start-->
                                <div class="item">
                                    <div class="testimonial-two__single">
                                        <div class="testimonial-two__client-info">
                                            <div class="testimonial-two__client-img">
                                                <img src="{{asset('resp/images/testimonial/testimonial-two-client-img-2.jpg')}}"
                                                    alt="">
                                            </div>
                                            <div class="testimonial-two__client-content">
                                                <h4 class="testimonial-two__client-name">Kevin Martin</h4>
                                                <p class="testimonial-two__client-sub-title">CO Founder</p>
                                            </div>
                                        </div>
                                        <p class="testimonial-two__text-2">Exercitation ullamco laboris nisi ut aliquip
                                            ex ea ex commodo consequat duis aute aboris nisi ut aliquip irure
                                            reprehederit in voluptate velit esse .</p>
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
                                <!--Testimonial Two Single End-->
                                <!--Testimonial Two Single Start-->
                                <div class="item">
                                    <div class="testimonial-two__single">
                                        <div class="testimonial-two__client-info">
                                            <div class="testimonial-two__client-img">
                                                <img src="{{asset('resp/images/testimonial/testimonial-two-client-img-3.jpg')}}"
                                                    alt="">
                                            </div>
                                            <div class="testimonial-two__client-content">
                                                <h4 class="testimonial-two__client-name">Kevin Coper</h4>
                                                <p class="testimonial-two__client-sub-title">CO Founder</p>
                                            </div>
                                        </div>
                                        <p class="testimonial-two__text-2">Exercitation ullamco laboris nisi ut aliquip
                                            ex ea ex commodo consequat duis aute aboris nisi ut aliquip irure
                                            reprehederit in voluptate velit esse .</p>
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
                                <!--Testimonial Two Single End-->
                                <!--Testimonial Two Single Start-->
                                <div class="item">
                                    <div class="testimonial-two__single">
                                        <div class="testimonial-two__client-info">
                                            <div class="testimonial-two__client-img">
                                                <img src="{{asset('resp/images/testimonial/testimonial-two-client-img-4.jpg')}}"
                                                    alt="">
                                            </div>
                                            <div class="testimonial-two__client-content">
                                                <h4 class="testimonial-two__client-name">Jessica Brown</h4>
                                                <p class="testimonial-two__client-sub-title">CO Founder</p>
                                            </div>
                                        </div>
                                        <p class="testimonial-two__text-2">Exercitation ullamco laboris nisi ut aliquip
                                            ex ea ex commodo consequat duis aute aboris nisi ut aliquip irure
                                            reprehederit in voluptate velit esse .</p>
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
                                <!--Testimonial Two Single End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonial Two End-->

        <!--Tabs Box One Start-->
        <section class="tabs-box-one">
            <div class="container">
                <div class="tabs-box-one__main-tab-box tabs-box">
                    <ul class="tab-buttons clearfix list-unstyled">
                        <li data-tab="#crowdfunding" class="tab-btn active-btn"><span>What is Crowdfunding?</span></li>
                        <li data-tab="#invest-one" class="tab-btn"><span>How can I Invest?</span></li>
                        <li data-tab="#invest-two" class="tab-btn"><span>Where can I Invest?</span></li>
                    </ul>
                    <div class="tabs-content">
                        <!--tab-->
                        <div class="tab active-tab" id="crowdfunding">
                            <div class="tabs-content__inner">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 wow slideInLeft" data-wow-duration="1500ms"
                                        data-wow-delay="200ms">
                                        <div class="tabs-content__inner-left">
                                            <div class="tabs-content__inner-img">
                                                <img src="{{asset('resp/images/resources/tabs-content-inner-img-1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tabs-content__inner-right">
                                            <h3 class="tabs-content__inner-title-one">Crowdfunding is an entirely new
                                                way of business finance</h3>
                                            <h4 class="tabs-content__inner-title-two">Many entrepreneurs are turning to
                                                crowdfunding to connect with the community and raise money for new
                                                ventures.</h4>
                                            <p class="tabs-content__inner-text">There are many variations of passages of
                                                available, but the majority have suffered alteration in some form, by
                                                injected or randomised words which don't look even slightly. If you are
                                                going to use a passage of you need to be sure there isn't hidden in the
                                                middle of text.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--tab-->
                        <div class="tab " id="invest-one">
                            <div class="tabs-content__inner">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 wow slideInLeft" data-wow-duration="1500ms"
                                        data-wow-delay="200ms">
                                        <div class="tabs-content__inner-left">
                                            <div class="tabs-content__inner-img">
                                                <img src="{{asset('resp/images/resources/tabs-content-inner-img-2.jpg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tabs-content__inner-right">
                                            <h3 class="tabs-content__inner-title-one">Crowdfunding is an entirely new
                                                way of business finance</h3>
                                            <h4 class="tabs-content__inner-title-two">Many entrepreneurs are turning to
                                                crowdfunding to connect with the community and raise money for new
                                                ventures.</h4>
                                            <p class="tabs-content__inner-text">There are many variations of passages of
                                                available, but the majority have suffered alteration in some form, by
                                                injected or randomised words which don't look even slightly. If you are
                                                going to use a passage of you need to be sure there isn't hidden in the
                                                middle of text.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--tab-->
                        <div class="tab " id="invest-two">
                            <div class="tabs-content__inner">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 wow slideInLeft" data-wow-duration="1500ms"
                                        data-wow-delay="200ms">
                                        <div class="tabs-content__inner-left">
                                            <div class="tabs-content__inner-img">
                                                <img src="{{asset('resp/images/resources/tabs-content-inner-img-3.jpg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <div class="tabs-content__inner-right">
                                            <h3 class="tabs-content__inner-title-one">Crowdfunding is an entirely new
                                                way of business finance</h3>
                                            <h4 class="tabs-content__inner-title-two">Many entrepreneurs are turning to
                                                crowdfunding to connect with the community and raise money for new
                                                ventures.</h4>
                                            <p class="tabs-content__inner-text">There are many variations of passages of
                                                available, but the majority have suffered alteration in some form, by
                                                injected or randomised words which don't look even slightly. If you are
                                                going to use a passage of you need to be sure there isn't hidden in the
                                                middle of text.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Tabs Box One End-->

        <!--Gallery One Start-->
        <section class="gallery-one">
            <div class="container">
                <ul class="list-unstyled gallery-one__list">
                    <!--Gallery One Single Start-->
                    <li class="gallery-one__single wow fadeInUp" data-wow-delay="100ms">
                        <div class="gallery-one__img">
                            <img src="assets/images/gallery/gallery-1-1.jpg" alt="">
                            <div class="gallery-one__icon">
                                <a class="img-popup" href="{{asset('resp/images/gallery/gallery-1-1.jpg')}}"><span
                                        class="icon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </li>
                    <!--Gallery One Single End-->
                    <!--Gallery One Single Start-->
                    <li class="gallery-one__single wow fadeInUp" data-wow-delay="200ms">
                        <div class="gallery-one__img">
                            <img src="assets/images/gallery/gallery-1-2.jpg" alt="">
                            <div class="gallery-one__icon">
                                <a class="img-popup" href="{{asset('resp/images/gallery/gallery-1-2.jpg')}}"><span
                                        class="icon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </li>
                    <!--Gallery One Single End-->
                    <!--Gallery One Single Start-->
                    <li class="gallery-one__single wow fadeInUp" data-wow-delay="300ms">
                        <div class="gallery-one__img">
                            <img src="assets/images/gallery/gallery-1-3.jpg" alt="">
                            <div class="gallery-one__icon">
                                <a class="img-popup" href="{{asset('resp/images/gallery/gallery-1-3.jpg')}}"><span
                                        class="icon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </li>
                    <!--Gallery One Single End-->
                    <!--Gallery One Single Start-->
                    <li class="gallery-one__single wow fadeInUp" data-wow-delay="400ms">
                        <div class="gallery-one__img">
                            <img src="assets/images/gallery/gallery-1-4.jpg" alt="">
                            <div class="gallery-one__icon">
                                <a class="img-popup" href="{{asset('resp/images/gallery/gallery-1-4.jpg')}}"><span
                                        class="icon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </li>
                    <!--Gallery One Single End-->
                    <!--Gallery One Single Start-->
                    <li class="gallery-one__single wow fadeInUp" data-wow-delay="500ms">
                        <div class="gallery-one__img">
                            <img src="assets/images/gallery/gallery-1-5.jpg" alt="">
                            <div class="gallery-one__icon">
                                <a class="img-popup" href="{{asset('resp/images/gallery/gallery-1-5.jpg')}}"><span
                                        class="icon-plus-symbol"></span></a>
                            </div>
                        </div>
                    </li>
                    <!--Gallery One Single End-->
                </ul>
            </div>
        </section>
        <!--Gallery One End-->

        <!--Events One Start-->
        <section class="events-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="events-one__left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Upcoming projects</span>
                                <h2 class="section-title__title">Ready to invest our New Upcoming project</h2>
                            </div>
                            <p class="events-one__text">Every man must decide whether he will walk in the light
                                of creative
                                altruism or in the darkness of eritdestructive selfishness. Ut porttitor et lectus ut
                                tempus. Aliquam lacinia justo.</p>
                            <a href="#" class="thm-btn events-one__btn">View All projects</a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!--Events One End-->

        <!--Ready Two Start-->
        <section class="ready-two">
            <div class="ready-two-shape-1 float-bob-x">
                <img src="{{asset('resp/images/shapes/ready-two-shape-1.png')}}" alt="">
            </div>
            <div class="container">
                <div class="ready-two__inner">
                    <div class="ready-two__big-icon float-bob-y-2">
                        <span class="icon-fundraiser"></span>
                    </div>
                    <div class="ready-two__left">
                        <div class="ready-two__icon">
                            <span class="icon-fundraiser"></span>
                        </div>
                        <div class="ready-two__content">
                            <p>Your story starts from here</p>
                            <h3>Ready to raise funds for idea?</h3>
                        </div>
                    </div>
                    <div class="ready-two__right">
                        <a href="#" class="thm-btn ready-two__btn">Make it Happen</a>
                    </div>
                </div>
            </div>
        </section>
        <!--Ready Two End-->

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
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="about.html">How it Works</a></li>
                                    <li><a href="about.html">Knowledge Hub</a></li>
                                    <li><a href="news.html">Success Stories</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                            <div class="footer-widget__column footer-widget__Fundraising">
                                <div class="footer-widget__title-box">
                                    <h3 class="footer-widget__title">Fundraising</h3>
                                </div>
                                <ul class="footer-widget__Explore-list list-unstyled">
                                    <li><a href="#">Design</a></li>
                                    <li><a href="#">Education</a></li>
                                    <li><a href="#">Technology</a></li>
                                    <li><a href="#">Games</a></li>
                                    <li><a href="#">Film & Video</a></li>
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

       
    <script src="{{asset('resp/vendors/jquery/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('resp/vendors/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('resp/vendors/jarallax/jarallax.min.js')}}"></script>
    <script src="{{asset('resp/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('resp/vendors/jquery-appear/jquery.appear.min.js')}}"></script>
    <script src="{{asset('resp/vendors/jquery-circle-progress/jquery.circle-progress.min.js')}}"></script>
    <script src="{{asset('resp/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('resp/vendors/jquery-validate/jquery.validate.min.js')}}"></script>
    <script src="{{asset('resp/vendors/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('resp/vendors/odometer/odometer.min.js')}}"></script>
    <script src="{{asset('resp/vendors/swiper/swiper.min.js')}}"></script>
    <script src="{{asset('resp/vendors/tiny-slider/tiny-slider.min.js')}}"></script>
    <script src="{{asset('resp/vendors/wnumb/wNumb.min.js')}}"></script>
    <script src="{{asset('resp/vendors/wow/wow.js')}}"></script>
    <script src="{{asset('resp/vendors/isotope/isotope.js')}}"></script>
    <script src="{{asset('resp/vendors/countdown/countdown.min.js')}}"></script>
    <script src="{{asset('resp/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('resp/vendors/bxslider/jquery.bxslider.min.js')}}"></script>
    <script src="{{asset('resp/vendors/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('resp/vendors/vegas/vegas.min.js')}}"></script>
    <script src="{{asset('resp/vendors/jquery-ui/jquery-ui.js')}}"></script>
    <script src="{{asset('resp/vendors/timepicker/timePicker.js')}}"></script>
    <script src="{{asset('resp/vendors/circleType/jquery.circleType.js')}}"></script>
    <script src="{{asset('resp/vendors/circleType/jquery.lettering.min.js')}}"></script>




    <!-- template js -->
    <script src="{{asset('resp/js/qrowd.js')}}"></script>    
    </body>
</html>
