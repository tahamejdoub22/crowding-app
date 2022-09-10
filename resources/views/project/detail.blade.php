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
                        <li>Project</li>
                    </ul>
                    <h2>Project Details</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Project Details Top Start-->
        <section class="project-details-top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-6">
                        <div class="project-details-top__left">
                            <div class="project-details-top__img">
                                <img style="max-width: 100%;
                                max-height: 100%;" class="d-none d-sm-block" src="/Image/{{ $projects->image }}" alt="">                                <div class="project-details-top__icon">
                                    <i class="far fa-heart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6">
                        <div class="project-details-top__right">
                            <div class="project-details-top__tag-address">
                                <div class="project-details-top__tag">
                                    <p>Technology</p>
                                </div>
                                <div class="project-details-top__address">
                                    <p><i class="fas fa-map-marker"></i>ShenZhen, China</p>
                                </div>
                            </div>
                            <h3 class="project-details-top__title">{{$projects->project_name}}</h3>
                            <ul class="list-unstyled project-details-top__list">
                                <li>
                                    <div class="project-details-top__list-content">
                                        <h3>${{ $projects->pledged }}</h3>
                                        <p>Pledged</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="project-details-top__list-content">
                                        <h3> {{ $projects->investors }}</h3>
                                        <p>Backers</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="project-details-top__list-content">
                                        <h3>{{ Carbon\Carbon::parse($projects->end_date)->diffForHumans()}}
                                        </h3>
                                    </div>
                                </li>
                            </ul>
                            <div class="progress-levels">
                                <!--Skill Box-->
                                <div class="progress-box">
                                    <div class="inner count-box">
                                        <div class="text">Raised</div>
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="skill-percent">
                                                    <span class="count-text" data-speed="3000" data-stop="70">0</span>
                                                    <span class="percent">%</span>
                                                </div>
                                                <div class="bar-fill" data-percent="70"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="project-details-top__goal"><span>Goal:</span> {{ $projects->goal }} USD</p>
                            <p class="project-details-top__text">{{ $projects->project_description }}</p>
                            <div class="project-details-top__person">
                                <div class="project-details-top__person-img">
                                    <img src="{{asset('resp/images/project/project-details-top-person-img-1.jpg')}}" alt="">
                                </div>
                                <div class="project-details-top__person-content">
                                    <h5><span>by</span>{{ $projects->user->name }}</h5>
                                </div>
                            </div>
                           
                            <div class="project-details-top__quantity-btn-social">
                              
                                <div class="project-details-top__btn-box">
                                    <a href="{{ route('stripe') }}" class="thm-btn project-details-top__btn">invest project</a>
                                </div>
                                <div class="project-details-top__social">
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
        </section>
        <!--Project Details Top End-->

        <!--Project Details Bottom Start-->
        <section class="project-details-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-5">
                        <div class="project-details__tab-box tabs-box">
                            <ul class="tab-buttons clearfix list-unstyled clearfix">
                                <li data-tab="#updates" class="tab-btn"><span>Updates</span></li>
                                <li data-tab="#reviews" class="tab-btn"><span>Reviews (2)</span></li>
                            </ul>
                            <div class="tabs-content">
                                <!--tab-->
                                <!--tab-->
                                <div class="tab " id="updates">
                                    <div class="project-details__updates">
                                        @foreach($projects->updates as $item)

                                        <div class="project-details__updates-single">


                                            <div class="project-details__updates-title-box">
                                                <p class="project-details__updates-sub-title">{{ $item->updated_at }}</p>
                                                <h5 class="project-details__updates-title">{{ $item->name }}</h5>
                                            </div>
                                            <p class="project-details__updates-text-1">{{ $item->text }}</p>
                                            <div class="project-details__updates-img">
                                                <img src="/Image/{{ $item->image }}"
                                                alt="">
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach

                                </div>

                                <div class="tab " id="reviews">

                                    <div class="project-details__reviews">

                                        <div class="project-details__review-one">
                                            <h3 class="project-details__review-title">
                                                {{ count($projects->comment) }}
                                                comments</h3>
                                                @foreach($projects->comment as $item)

                                            <div class="project-details__review-single">

                                                <div class="project-details__review-image">

                                                    <img src="/Image/{{ $item->image }}" alt="">                                                      
                                                </div>
                                                <div class="project-details__review-content">
                                                    <h3>{{ $item->name }}</h3>
                                                    <p>{{$item->text}}</p>
                                                  
                                                </div>

                                            </div>
                                            @endforeach


                                            </div>
                                           
                                        </div>
                                       
                                    </div>
                               
                                                        
                                </div>
                              
                            </div>
                            <form action="{{ url('/detail/' . $projects->id) }}" method="post"
                                class="project-details__review-form-one contact-form-validate">
                                {{ csrf_field() }}                                        <div class="row">
                                    <div class="col-xl-12">
                                        <div
                                            class="project-details__review-form-input-box text-message-box">
                                            <textarea name="text"
                                                placeholder="Write a Comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="project-details__review-form-input-box">
                                            <input type="text" placeholder="name" name="name">

                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
                                            <input type="hidden" name="project_id" value="{{ $projects->id }}" />

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div
                                                class="project-details__review-form-input-box text-message-box">
                                                <input name="image" type="file"
                                                    placeholder="IMAGE">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="project-details__review-form-btn-box">
                                            <button type="submit"
                                                class="thm-btn project-details__review-form-btn">Submit
                                                Review</button>
                                        </div>
                                    </div>

                                </div>
                                
                            </form>  
                        </div>
                        <div class="col-xl-4 col-lg-1">
                            <div class="project-details__right">
                                <div class="project-details__rewards">
                
                                    <h5 class="project-details__rewards-title">Rewards</h5>
                                    @foreach($projects->reward as $item)
                
                                    <p class="project-details__rewards-price"><span>${{$item->discount}}</span> or More</p>
                                    <div class="project-details__rewards-img">
                                        <img src="{{asset('resp/images/project/project-details-rewards-img.jpg')}}" alt="">
                                    </div>
                                    <p class="project-details__rewards-text-1">{{$item->description}}</p>
                                    <p class="project-details__rewards-date">{{$item->updated_at}}</p>
                                    <p class="project-details__rewards-delivery">{{$item->name}}</p>
                                    <ul class="list-unstyled project-details__rewards-bottom">
                                    </ul>
                                  
                                    @endforeach
                
                                </div>
                            </div>
                
                        </div>   

                    </div>
                    
                  
            </div>
        
        </section>
       
        <!--Project Details Bottom End-->


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
                                <p class="site-footer__bottom-text">© Copyright 2022 by <a href="#"></a></p>
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
