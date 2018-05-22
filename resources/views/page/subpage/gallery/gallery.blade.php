@extends('page.layout.master')

@section('intro-header')
@section('header-title', 'Gallery')
@section('header-slogan', 'We Know The Secret Of Your Success')
@endsection

@section('content')
    @include('page.layout.intro-header')

    <section class="page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="section-title text-center">
                        <h3 class="text-orange">4 Item</h3>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="owl-carousel" data-items="4" data-md-items="3" data-sm-items="2" data-xs-items="2" data-xx-items="1"  data-nav-dots="true">
                        <div class="item">
                            <img class="img-responsive center-block" src="images/gallery/01.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive center-block" src="images/gallery/02.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive center-block" src="images/gallery/03.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive center-block" src="images/gallery/04.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive center-block" src="images/gallery/05.jpg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-section-pt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="section-title text-center">
                            <h3 class="text-orange">3 Item</h3>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="owl-carousel" data-items="3" data-xs-items="2" data-xx-items="1"  data-nav-dots="true">
                            <div class="item">
                                <img class="img-responsive center-block" src="images/gallery/01.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive center-block" src="images/gallery/02.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive center-block" src="images/gallery/03.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive center-block" src="images/gallery/04.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive center-block" src="images/gallery/05.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-section-pt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="section-title text-center">
                            <h3 class="text-orange">2 Item</h3>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="owl-carousel" data-items="2" data-md-items="2" data-xs-items="2" data-nav-dots="true">
                            <div class="item">
                                <img class="img-responsive center-block" src="images/gallery/01.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive center-block" src="images/gallery/02.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive center-block" src="images/gallery/03.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive center-block" src="images/gallery/04.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive center-block" src="images/gallery/05.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection