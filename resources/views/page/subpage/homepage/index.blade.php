@extends('page.layout.master')

@section('content')

    <!--=================================
    slider -->

    @include('page.subpage.homepage.section.slider')

    <!--=================================
    slider -->

    <!--=================================
    About -->

    @include('page.subpage.homepage.section.about')

    <!--=================================
    About -->

    <!--=================================
    special-menu -->

    @include('page.subpage.homepage.section.special-menu')

    <!--=================================
    special-menu -->

    <!--=================================
    Pricing Grid -->

    <section class="pricing-grid gray-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <div class="title-separator">
                            <i class="glyph-icon flaticon-food-27"></i>
                        </div>
                        <h2> <span class="text-orange">The Zayka </span>Pricing</h2>
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
                                <li>Peri Peri Sausage</li>
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
                            <h2 class="text-black">PREMIUM plan</h2>
                            <strong>$16/<span>month</span></strong>
                            <p>Use this plan in 1 month</p>
                        </div>
                        <div class="pricing-list mb-30">
                            <ul>
                                <li>Starter Soup</li>
                                <li>Tomato Salad</li>
                                <li class="text-light-gray">Large 2 Chicken</li>
                                <li>Peri Peri Sausage</li>
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
                                <li>Peri Peri Sausage</li>
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
    our-menu -->

    @include('page.subpage.homepage.section.menu')

    <!--=================================
    our-menu -->

    <!--=================================
    counter -->

    <section class="light">
        <div class="page-section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="counter-content">
                            <h2 class="mb-20"> <span class="text-orange">We are </span>The Zayka</h2>
                            <strong> We know cupiditate voluptate dignissimos nobis</strong>
                            <p class="mt-15">Soluta eligendi voluptate commodi autem iure dolorum molestias quo aspernatur cum! Sequi veniam, iusto recusandae. Eius et nesciunt cupiditate voluptate dignissimos nobis?</p>
                            <a class="button mt-20" href="#">Read more</a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="counter left-icon mb-50">
                                    <div class="icon">
                                        <span class="glyph-icon flaticon-lemonade-with-straw text-black"></span>
                                    </div>
                                    <div class="info">
                                        <span class="timer text-black" data-to="3968" data-speed="10000">3968</span>
                                        <h5 class="text-black"><span class="text-orange">Daily</span> Customers</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="counter left-icon mb-50">
                                    <div class="icon">
                                        <span class="glyph-icon flaticon-food-66 text-black"></span>
                                    </div>
                                    <div class="info">
                                        <span class="timer text-black" data-to="5568" data-speed="10000">5568</span>
                                        <h5 class="text-black"><span class="text-orange">Best</span> Food</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="counter left-icon">
                                    <div class="icon">
                                        <span class="glyph-icon flaticon-food text-black"></span>
                                    </div>
                                    <div class="info">
                                        <span class="timer text-black" data-to="8908" data-speed="10000">8908</span>
                                        <h5 class="text-black"><span class="text-orange">Master</span> chefs</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="counter left-icon">
                                    <div class="icon">
                                        <span class="glyph-icon flaticon-hot-mug-doodle text-black"></span>
                                    </div>
                                    <div class="info">
                                        <span class="timer text-black" data-to="9968" data-speed="10000">9968</span>
                                        <h5 class="text-black"><span class="text-orange">our</span> experience</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
    counter -->

    <!--=================================
    reservation form  -->

    @include('page.subpage.homepage.section.reservation')

    <!--=================================
    reservation form  -->

    <!--=================================
    testimonials -->

    <section class="testimonials">
        <div class="object-bottom-top">
            <div class="object-right">
                <img class="img-responsive" src="images/object/05.png" alt="">
            </div>
        </div>
        <div class="page-section-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="section-title text-center">
                            <div class="title-separator">
                                <i class="glyph-icon flaticon-food-27"></i>
                            </div>
                            <h2> <span class="text-orange">Our </span> testimonials</h2>
                            <p>What Our Happy Clients say about us</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="testimonial-block left">
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
                    <div class="col-lg-4 col-md-4">
                        <div class="testimonial-block left">
                            <div class="testimonial-avatar">
                                <img src="images/team/02.jpg" alt="">
                            </div>
                            <div class="testimonial-info clearfix">
                                <strong>Anne Smith </strong>
                                <span>kitchen Manager</span>
                                <p>For those of you who are serious about having more, doing more, giving more and being more, success is achievable with some understanding of what to do, discipline. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="testimonial-block left">
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
                </div>
            </div>
        </div>
    </section>

    <!--=================================
    testimonials -->

    <!--=================================
    newsletter -->

    <section class="newsletter-section orange-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="newsletter-image">
                        <img class="img-responsive center-block" src="images/object/15.png" alt="">
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 text-center">
                    <div class="newsletter-title mb-20 text-left">
                        <h4 class="text-white">subscribe our newsletter </h4>
                    </div>
                    <form class="form-inline">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-7">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="inputPassword2" placeholder="Enter your email address...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5 text-left">
                                <a class="button black" href="#">Subscribe now</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
    newsletter  -->

@endsection

@section('addition-script')
    <script>
        $(document).ready(function() {
            // Dishes image rotate animation
            $(".menu-thumbnail").addClass("wow rotateIn");
        });
    </script>
@endsection