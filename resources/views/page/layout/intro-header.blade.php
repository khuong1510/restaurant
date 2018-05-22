<div class="inner-intro parallax bg-overlay-black-70" style="background-image: url(images/bg/02.jpg);">
    <div class="container">
        <div class="row text-center intro-title">
            <h1 class="text-orange">@yield('header-title')</h1>
            <p class="text-white">@yield('header-slogan')</p>
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ asset('/') }}"><i class="fa fa-home"></i> Home</a>
                    <i class="fa fa-angle-double-right"></i>
                </li>
                <!--<li>
                    <a href="#">pages</a>
                    <i class="fa fa-angle-double-right"></i>
                </li>-->
                <li><span>@yield('header-title')</span></li>
            </ul>
        </div>
    </div>
</div>