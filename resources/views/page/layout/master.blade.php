<!DOCTYPE html>
<html lang="en">
<head>
    @include('page.layout.header')
</head>
<body>
<?php $allConfigs = new App\Config(); ?>
<!--loading icon-->
<div id="loading">
    <div id="loading-center">
        <img src="images/loader.gif" alt="">
    </div>
</div>
<!--end loading icon-->


<!--navigation bar-->
    @include('page.layout.navbar')
<!--end navigation bar -->

<!--intro header-->
    @yield('intro-header')
<!--end intro header-->

<!--content-->
    @yield('content')
<!--end content-->

<!--footer-->
    @include('page.layout.footer')
<!--end footer -->


<!--back to top -->
<div id="back-to-top">
    <a class="top arrow" href="#top"><i class="fa fa-long-arrow-up"></i></a>
</div>
<!--end back to top -->


<!--script -->
@include('page.layout.script')
<!--end script -->
@yield('addition-script')

</body>
</html>