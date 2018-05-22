@extends('page.layout.master')

@section('intro-header')
    @section('header-title', 'Service')
    @section('header-slogan', 'We Know The Secret Of Your Success')
@endsection

@section('content')
    @include('page.layout.intro-header')

    <!--=================================
    service section -->

    <section class="service-feature white-bg page-section-ptb">
        <div class="object-top-bottom">
            <div class="object-left">
                <img class="img-responsive" src="images/object/11.png" alt="">
            </div>
            <div class="object-right">
                <img class="img-responsive" src="images/object/04.png" alt="">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <div class="title-separator">
                            <i class="glyph-icon flaticon-food-27"></i>
                        </div>
                        <h2> <span class="text-orange">The Zayka</span> service</h2>
                        <p>This is what we do and we do it perfectly</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                    <div class="service active text-center">
                        <div class="service-content">
                            <i class="glyph-icon flaticon-cake-box"></i>
                            <h4>birthday party</h4>
                            <p>There are many variations of passages of Lorem Ipsum available majority have suffered.</p>
                        </div>
                        <div class="service-img" style="background-image: url('images/feature/01.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                    <div class="service text-center">
                        <div class="service-content">
                            <i class="glyph-icon flaticon-bottle"></i>
                            <h4>Private Dining</h4>
                            <p>There are many variations of passages of Lorem Ipsum available majority have suffered.</p>
                        </div>
                        <div class="service-img" style="background-image: url('images/feature/02.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                    <div class="service text-center">
                        <div class="service-content">
                            <i class="glyph-icon flaticon-kitchen-1"></i>
                            <h4>Charity Events</h4>
                            <p>There are many variations of passages of Lorem Ipsum available majority have suffered.</p>
                        </div>
                        <div class="service-img" style="background-image: url('images/feature/03.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                    <div class="service text-center">
                        <div class="service-content">
                            <i class="glyph-icon flaticon-chinese-rice-with-two-chopsticks"></i>
                            <h4>Film Shoots</h4>
                            <p>There are many variations of passages of Lorem Ipsum available majority have suffered.</p>
                        </div>
                        <div class="service-img" style="background-image: url('images/feature/04.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                    <div class="service text-center">
                        <div class="service-content">
                            <i class="glyph-icon flaticon-chinese-rice-with-two-chopsticks"></i>
                            <h4>Film Shoots</h4>
                            <p>There are many variations of passages of Lorem Ipsum available majority have suffered.</p>
                        </div>
                        <div class="service-img" style="background-image: url('images/feature/04.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                    <div class="service text-center">
                        <div class="service-content">
                            <i class="glyph-icon flaticon-kitchen-1"></i>
                            <h4>Charity Events</h4>
                            <p>There are many variations of passages of Lorem Ipsum available majority have suffered.</p>
                        </div>
                        <div class="service-img" style="background-image: url('images/feature/03.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                    <div class="service text-center">
                        <div class="service-content">
                            <i class="glyph-icon flaticon-bottle"></i>
                            <h4>Private Dining</h4>
                            <p>There are many variations of passages of Lorem Ipsum available majority have suffered.</p>
                        </div>
                        <div class="service-img" style="background-image: url('images/feature/02.jpg');"></div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-30">
                    <div class="service text-center">
                        <div class="service-content">
                            <i class="glyph-icon flaticon-cake-box"></i>
                            <h4>birthday party</h4>
                            <p>There are many variations of passages of Lorem Ipsum available majority have suffered.</p>
                        </div>
                        <div class="service-img" style="background-image: url('images/feature/01.jpg');"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
    service section -->

    <!--=================================
    testimonials -->

    <section class="testimonials parallax bg-overlay-black-90 page-section-ptb" style="background-image: url(images/bg/05.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <div class="title-separator">
                            <i class="glyph-icon flaticon-food-27 white"></i>
                        </div>
                        <h2 class="text-white"> <span class="text-orange">Our </span>testimonials</h2>
                        <p class="text-white">What Our Happy Clients say about us</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="owl-carousel" data-items="2" data-md-items="2" data-sm-items="1" data-nav-dots="true" data-dotcolor="white">
                        <div class="item">
                            <div class="testimonial-block white-text left">

                                <div class="testimonial-avatar">
                                    <img src="images/team/01.jpg" alt="">
                                </div>
                                <div class="testimonial-info clearfix">
                                    <strong>Alice Williams</strong>
                                    <span>Head Chef </span>
                                    <p>Success isn’t really that difficult. There is a significant portion of the population here in North America, that actually want and need success really no magic to be hard. </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-block white-text left">
                                <div class="testimonial-avatar">
                                    <img src="images/team/02.jpg" alt="">
                                </div>
                                <div class="testimonial-info clearfix">
                                    <strong>Anne Smith </strong>
                                    <span>Kitchen Manager</span>
                                    <p>For those of you who are serious about having more, doing more, giving more and being more, success is achievable with some understanding of what to do, discipline. </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-block white-text left">
                                <div class="testimonial-avatar">
                                    <img src="images/team/03.jpg" alt="">
                                </div>
                                <div class="testimonial-info clearfix">
                                    <strong>Felica Queen </strong>
                                    <span>Head Waiter </span>
                                    <p>He first thing to remember about success is that it is a process – nothing more, nothing less. There is really no magic to it and it’s not reserved only few people. </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-block white-text left">
                                <div class="testimonial-avatar">
                                    <img src="images/team/04.jpg" alt="">
                                </div>
                                <div class="testimonial-info clearfix">
                                    <strong>Anne Smith </strong>
                                    <span>Kitchen Manager</span>
                                    <p>For those of you who are serious about having more, doing more, giving more and being more, success is achievable with some understanding of what to do, discipline. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
    testimonials -->

    <!--=================================
     Pricing Grid -->

    <section class="pricing-grid page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <div class="title-separator">
                            <i class="glyph-icon flaticon-food-27"></i>
                        </div>
                        <h2> <span class="text-orange">The Zayka </span>Pricing Grid</h2>
                        <p>Choose your perfect pricing plan</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="pricing-table">
                        <div class="pricing-title">
                            <h2>BASIC plan</h2>
                            <strong>$10/<span>month</span></strong>
                            <p>Use this plan in 1 month</p>
                        </div>
                        <div class="pricing-list mb-30">
                            <ul>
                                <li class="text-light-gray">Starter Soup</li>
                                <li>Tomato Salad</li>
                                <li>Large 2 Chicken</li>
                                <li>Peri Peri Sousage</li>
                                <li class="text-light-gray">French Fry</li>
                                <li class="text-light-gray">Cocoa Brownies</li>
                            </ul>
                        </div>
                        <div class="pricing-button"><a class="button" href="#">Order Now</a></div>
                        <div class="pricing-icon">
                            <i class="glyph-icon flaticon-cake-piece-with-cream"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="pricing-table">
                        <div class="pricing-title">
                            <h2 class="text-orange">PREMIUM plan</h2>
                            <strong>$16/<span>month</span></strong>
                            <p>Use this plan in 1 month</p>
                        </div>
                        <div class="pricing-list mb-30">
                            <ul>
                                <li>Starter Soup</li>
                                <li>Tomato Salad</li>
                                <li class="text-light-gray">Large 2 Chicken</li>
                                <li>Peri Peri Sousage</li>
                                <li class="text-light-gray">French Fry</li>
                                <li>Cocoa Brownies</li>
                            </ul>
                        </div>
                        <div class="pricing-button"><a class="button" href="#">Order Now</a></div>
                        <div class="pricing-icon">
                            <i class="glyph-icon flaticon-foamy-beer-jar"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="pricing-table">
                        <div class="pricing-title">
                            <h2>ULTIMATE plan</h2>
                            <strong>$23/<span>month</span></strong>
                            <p>Use this plan in 1 month</p>
                        </div>
                        <div class="pricing-list mb-30">
                            <ul>
                                <li>Starter Soup</li>
                                <li>Tomato Salad</li>
                                <li>Large 2 Chicken</li>
                                <li>Peri Peri Sousage</li>
                                <li>French Fry</li>
                                <li>Cocoa Brownies</li>
                            </ul>
                        </div>
                        <div class="pricing-button"><a class="button" href="#">Order Now</a></div>
                        <div class="pricing-icon">
                            <i class="glyph-icon flaticon-food-60"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
     Pricing Grid -->

    <!--=================================
     info-section -->

    <section class="page-section-ptb parallax bg-overlay-black-90" style="background-image: url(images/bg/02.jpg);">
        <div class="container content-middle text-center">
            <div class="info-all">
                <div class="section-title text-center m-0">
                    <h2 class="text-white"> <span class="text-orange">HOT Deal of</span> the Day</h2>
                </div>
                <p class="text-white mt-10 mb-40 text-uppercase">aliqum congue a augue sagattis tristique</p>
                <a class="button white text-uppercase" href="#">Order Now</a>
            </div>
        </div>
    </section>

    <!--=================================
     info-section -->
@endsection