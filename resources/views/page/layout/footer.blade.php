<footer class="footer" style="background-image: url(images/bg/01.jpg);">
    <div class="object-bottom">
        <div class="object-left">
            <img class="img-responsive bottom" src="images/object/06.png" alt="">
        </div>
        <div class="object-right">
            <img  class="img-responsive bottom" src="images/object/16.png" alt="">
        </div>
    </div>
    <div class="container wow fadeInDown">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-center mt-60">
                <div class="footer-logo">
                    <img id="logo-footer" class="img-responive" src="images/logo.png" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="newsletter">
                    <h4 class="text-white mb-30">Newsletter</h4>
                    <p class="text-white">Signing up to our newsletter keeps you up-to-date!</p>
                    <div class="newsletter-input">
                        <input type="email" placeholder="Your email*" name="email">
                        <a href="#"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="tweet">
                    <h4 class="text-white mb-30">Latest tweet</h4>
                    <div class="tweet-block mb-20">
                        <div class="icon">
                            <i class="fa fa-twitter text-white"></i>
                        </div>
                        <div class="content">
                            <p class="text-white">Our brand new has just launched! </p>
                            <span class="text-orange">03:05 AM Sep 18th</span>
                        </div>
                    </div>
                    <div class="tweet-block">
                        <div class="icon">
                            <i class="fa fa-twitter text-white"></i>
                        </div>
                        <div class="content">
                            <p class="text-white">Get your photo on win prizes. </p>
                            <span class="text-orange">03:05 AM Sep 18th</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="opening-time">
                    <h4 class="text-white mb-30">Open time</h4>
                    <ul>
                        <li>Monday<span class="text-right">8am - 2pm </span></li>
                        <li>Tuesday<span>10am - 4pm</span></li>
                        <li>Wednesday<span >11am - 4pm</span></li>
                        <li>Close on public holidays</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="contact">
                    <h4 class="text-white mb-30">Contact</h4>
                    <p class="text-white">{{ $allConfigs->getValue('home_address') }}</p>
                    <p class="text-white">{{ $allConfigs->getValue('home_phone') }}</p>
                    <p class="text-white">{{ $allConfigs->getValue('home_email') }}</p>
                    <a class="text-orange" href="#"><i class="fa fa-map-o pr-10"></i> Find us here</a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom  wow fadeInDown">
        <div class="container">
            <div class="row">
                <div class="co-lg-12 co-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="footer-social">
                        <ul class="list-inline">
                            <li><a href="{{ $allConfigs->getValue('home_social_fb') }}" data-tooltip="facebook"> <i class="fa fa-facebook"></i> </a> </li>
                            <li><a href="#" data-tooltip="twitter"> <i class="fa fa-twitter"></i> </a> </li>
                            <li><a href="#" data-tooltip="google-plus"> <i class="fa fa-google-plus"></i> </a> </li>
                            <li><a href="#" data-tooltip="instagram"> <i class="fa fa-instagram"></i> </a> </li>
                            <li><a href="#" data-tooltip="tripadvisor"> <i class="fa fa-tripadvisor"></i> </a> </li>
                        </ul>
                    </div>
                    <p class="text-white mt-30"> &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> All right reserved by The Zayka. Designed by <a href="#"> PotenzaGlobalSolutions</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>