<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Metronic | Dashboard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    @include('admin.layout.header')
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
<!-- BEGIN HEADER -->
    @include('admin.layout.navbar')
<!-- END HEADER -->

<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->

<!-- BEGIN CONTAINER -->
<div class="page-container">

    <!-- BEGIN SIDEBAR -->
    @include('admin.layout.sidebar')
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">

            <!-- BEGIN PAGE HEADER-->
            @include('admin.layout.content-header')
            <!-- END PAGE HEADER-->

            <!-- BEGIN CONTENT -->
            @yield('content')
            <!-- END CONTENT -->

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

</div>
<!-- END CONTAINER -->

<!-- BEGIN FOOTER -->
<div class="page-footer">
    <div class="page-footer-inner"> Restaurant Admin Page Theme
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
</div>
<!-- END FOOTER -->

<!--BEGIN SCRIPT-->
    @include('admin.layout.script')
<!-- END BEGIN SCRIPT-->
    @yield('addition-script')

</body>

</html>