@extends('page.layout.master')

@section('intro-header')
@section('header-title', 'Contact Us')
@section('header-slogan', 'We Know The Secret Of Your Success')
@endsection

@section('content')
    @include('page.layout.intro-header')

    <section class="contact white-bg page-section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <div class="title-separator">
                            <i class="glyph-icon flaticon-food-27"></i>
                        </div>
                        <h2> <span class="text-orange">Contact </span> Us</h2>
                        <p>It would be great to hear from you! If you got any questions</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="contact-box text-center">
                        <i class="fa fa-map-marker"></i>
                        <h5>Address</h5>
                        <p>1234 North Avenue Luke, IN 360001</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="contact-box text-center">
                        <i class="fa fa-phone"></i>
                        <h5>Phone</h5>
                        <p> (007) 123 456 7890</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="contact-box text-center">
                        <i class="fa fa-envelope-o"></i>
                        <h5>Email</h5>
                        <p> support@website.com</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="contact-box text-center">
                        <i class="fa fa-fax"></i>
                        <h5>Fax</h5>
                        <p>(007) 123 456 7890</p>
                    </div>
                </div>
            </div>
            <div class="row mt-30">
                <div class="col-lg-12">
                    <div id="formmessage">Success/Error Message Goes Here</div>
                    <form class="form-horizontal" id="contactform" role="form" method="post" action="php/contact-form.php">
                        <div class="contact-form">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-field">
                                        <i class="fa fa-user"></i>
                                        <input id="name" type="text" placeholder="Name*" class="placeholder" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-field">
                                        <i class="fa fa-phone"></i>
                                        <input type="text" placeholder="Phone*" class="placeholder" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-field">
                                        <i class="fa fa-envelope-o"></i>
                                        <input type="email" placeholder="Email*" class="placeholder" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-field">
                                        <i class="fa fa-pencil"></i>
                                        <textarea class="input-message placeholder" placeholder="Comment*" rows="7" name="message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-submit mt-10 text-center">
                                <input type="hidden" name="action" value="sendEmail"/>
                                <button id="submit" name="Submit" type="submit" value="Send" class="button"> Send Message</button>
                            </div>
                        </div>
                    </form>
                    <div id="ajaxloader" style="display:none"><img class="center-block" src="images/ajax-loader.gif" alt=""></div>
                </div>
            </div>
        </div>
    </section>
@endsection