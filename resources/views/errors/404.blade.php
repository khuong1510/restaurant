@extends('page.layout.master')

@section('intro-header')
@section('header-title', '404 Error')
@section('header-slogan', 'We Know The Secret Of Your Success')
@endsection

@section('content')
    @include('page.layout.intro-header')

    <section class="error-page page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="error-content text-center">
                        <img class="img-responsive center-block" src="images/image-404.jpg" alt="">
                        <h3 class="text-orange">Ooopps:( </h3>
                        <strong class="text-black"> The Page you were looking for, couldn't be found</strong>
                        <p>Look like the page you are trying to visit does not exist. Please check the URL and try your luck again</p>
                        <div class="link-button">
                            <a href="{{ asset("/") }}" class="button black">Go to home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection