@extends('admin.layout.master')

@section('title', 'Food')
@section('title-detail', $breadCrumb)
@section('parent', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN REPORT POPUP -->
            <div class="alert alert-success alert-dismissable reportMsg" id="successMsg" style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            </div>
            <div class="alert alert-danger alert-dismissable reportMsg" id="errorsMsg" style="display: none">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            </div>
            <!-- END REPORT POPUP -->

            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light ">
                            <div class="portlet-title tabbable-line">
                                <div class="caption font-red-sunglo">
                                    <i class="icon-settings font-red-sunglo"></i>
                                    <span class="caption-subject bold uppercase">
                                        @if(!empty($food))
                                            Edit Food
                                        @else
                                            Create New Food
                                        @endif
                                    </span>
                                </div>
                                @if(!empty($food))
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_1_1" data-toggle="tab">Food information</a>
                                    </li>
                                    <li>
                                        <a href="#tab_1_2" data-toggle="tab">Manage menu</a>
                                    </li>
                                </ul>
                                @endif
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    @include('admin.subpage.food.edit.edit-form')
                                    <!-- CHANGE AVATAR TAB -->
                                    @include('admin.subpage.food.edit.mapping')
                                    <!-- END CHANGE AVATAR TAB -->
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
    <script>
        $(document).ready(function() {
            var form = $("form#rtr-edit-form");
            var errorMsg = $("#errorsMsg");
            var successMsg = $("#successMsg");
            var pageTypeSelectBox = $("#rtr-page-type");
            var parentListSelectBox = $('#rtr-parent-list');

            form.submit(function(e) {
                errorMsg.hide();
                successMsg.hide();

                //e.preventDefault();

                $.ajax({
                    method: "POST",
                    url: form.attr("action"),
                    data: form.serialize()
                }).done(function(data) {
                    data = JSON.parse(data);

                    if(data.error == 1)
                    {
                        errorMsg.html("<p><strong>Error! </strong> "+ data.message +"</p>");
                        errorMsg.show();
                    }
                    else {
                        successMsg.html("<p><strong>Success! </strong> "+ data.message +"</p>");
                        successMsg.show();
                    }
                });
            });

            pageTypeSelectBox.on("change", function() {
                $.ajax({
                    method: "GET",
                    url: pageTypeSelectBox.attr("data-action") + '/' + pageTypeSelectBox.val()
                }).done(function(data) {
                    console.log(data);

                    parentListSelectBox.val('');
                    parentListSelectBox.html('<option value="0"> Parent </option>' + data);
                });
            });
        });
    </script>
@endsection
