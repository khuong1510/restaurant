<section class="reservation-form contact-form dark page-section-ptb parallax bg-overlay-black-80" style="background-image: url(images/bg/02.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <div class="title-separator">
                        <i class="glyph-icon flaticon-food-27"></i>
                    </div>
                    <h2 class="text-white"> <span class="text-orange">{{ $allConfigs->getValue('home_name') }}</span> Reservation</h2>
                    <p class="text-white">We provide free, secure and instantly confirmed online reservation.</p>
                </div>
            </div>
        </div>
        <div class="row row-eq-height wow fadeInLeft">
            <div class="col-lg-4 col-md-5 pl-0 pr-0">
                <div class="reservation-image form-image">
                    <img class="img-responsive" src="images/event/07.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 pl-0 pr-0 white-bg">
                <form class="row">
                    <div class="col-lg-12 col-md-12">
                        <h3 class="mb-30">Reservation form</h3>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-field">
                            <i class="fa fa-pencil"></i>
                            <input class="web placeholder" type="text" placeholder="Full Name" name="web">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-field">
                            <i class="fa fa-phone"></i>
                            <input class="web placeholder" type="text" placeholder="Phone Number" name="web">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-field">
                            <i class="fa fa-envelope-o"></i>
                            <input class="web placeholder" type="text" placeholder="Your Email" name="web">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-field" id="datepicker">
                            <i class="fa fa-calendar add-on"></i>
                            <input data-format="yyyy-MM-dd" type="text" placeholder="Select date">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-field" id="timepicker">
                            <i class="fa fa-clock-o icon-time add-on"></i>
                            <input data-format="hh:mm:ss" type="text" placeholder="Select time">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-field">
                            <div class="selected-box">
                                <select>
                                    <option value="Person">Person</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="2">More then 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-field">
                            <i class="fa fa-comment-o"></i>
                            <textarea class="input-message placeholder" placeholder="Comment*" rows="2" name="message"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="submit-button">
                            <a class="button" href="#">Book A Table</a>
                            <span>Is all about good food. Enjoy our decious food</span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>