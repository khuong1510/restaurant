@extends('admin.layout.master')

@section('title', 'Homepage')
@section('title-detail', 'Homepage')
@section('parent', 'config')

@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="alert alert-success alert-dismissable" id="successMsg" style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            </div>

            <div class="alert alert-danger alert-dismissable" id="errorsMsg" style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            </div>

            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Homepage Config</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">General</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">Slider</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_3" data-toggle="tab">Menu Book</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_4" data-toggle="tab">Special Menu</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_5" data-toggle="tab">Our Menu</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_6" data-toggle="tab">Testimonial</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- GENERAL TAB -->
                                @include('admin.subpage.config.homepage.general')
                                <!-- END GENERAL TAB -->

                                    <!-- SLIDER TAB -->
                                @include('admin.subpage.config.homepage.slider')
                                <!-- END SLIDER TAB -->

                                    <!-- MENU BOOK TAB -->
                                @include('admin.subpage.config.homepage.menu-book')
                                <!-- END MENU BOOK TAB -->

                                    <!-- SPECIAL MENU TAB -->
                                @include('admin.subpage.config.homepage.special-menu')
                                <!-- END SPECIAL MENU TAB -->

                                    <!-- OUR MENU TAB -->
                                @include('admin.subpage.config.homepage.our-menu')
                                <!-- END OUR MENU TAB -->

                                    <!-- OUR TESTIMONIALS TAB -->
                                @include('admin.subpage.config.homepage.testimonial')
                                <!-- END OUR TESTIMONIALS TAB -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>
    </div>
@endsection

@section('addition-script')
    <script src="{{ asset('js/config/update.js') }}" type="text/javascript"></script>
@endsection