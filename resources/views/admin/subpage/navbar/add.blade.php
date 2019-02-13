@extends('admin.layout.master')

@section('title', 'NavBar')
@section('title-detail', $breadCrumb)
@section('parent', 'navbar')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN REPORT POPUP -->
            {{--<div class="alert alert-success alert-dismissable reportMsg" id="successMsg" style="display: none">--}}
                {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>--}}
            {{--</div>--}}
            {{--<div class="alert alert-danger alert-dismissable reportMsg" id="errorsMsg" style="display: none">--}}
                {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>--}}
            {{--</div>--}}
            <!-- END REPORT POPUP -->

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase">
                        @if(!empty($navBar))
                          Edit Navbar
                        @else
                          Create New NavBar 
                        @endif
                        </span>
                    </div>
                </div>
                <div class="portlet-body form">
                    @if(!empty($navBar))
                        {!! Form::model($navBar, ['route' => ['navbar.update'] , 'method' => 'post', 'id' => 'rtr-edit-form' ]) !!}
                        {!! Form::hidden('id', old('id'), ['class' => 'form-control', 'placeholder' => 'Id']) !!}
                    @else
                        {!! Form::open(['route' => 'navbar.store']) !!}
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-body">
                                <div class="form-group">
                                    {!! Form::label('name','Name') !!}
                                    <span class="text-danger"> * </span>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user font-red"></i>
                                        </span>
                                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                                    </div>
                                    <h5 class="text-dark"> <i> Enter a page name. Example: Contact </i> </h5>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('link','Link') !!}
                                    <span class="text-danger"> * </span>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-link font-red"></i>
                                        </span>
                                        {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => 'Link']) !!}
                                    </div>
                                    <h5 class="text-dark"> <i> Enter a page link. Example: /user/add </i> </h5>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('icon','Icon') !!}
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-th-large font-red"></i>
                                        </span>
                                        {!! Form::text('icon', old('icon'), ['class' => 'form-control', 'placeholder' => 'Icon']) !!}
                                    </div>
                                    <h5 class="text-dark"> <i> This field is used for creating an icon </i> </h5>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('alias','Alias') !!}
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-chain-broken font-red"></i>
                                        </span>
                                        {!! Form::text('alias', old('alias'), ['class' => 'form-control', 'placeholder' => 'Alias']) !!}
                                    </div>
                                    <h5 class="text-dark"> <i> This field is used for alias name </i> </h5>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('page','Page In use') !!}
                                    <span class="text-danger"> * </span>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-paperclip font-red"></i>
                                        </span>
                                        {!! Form::select('page',
                                        [
                                            'admin' => 'Admin',
                                            'client' => 'Client'
                                        ],
                                        old('page')
                                        ,
                                        ['class' => 'form-control', 'id' => 'rtr-page-type', 'data-action' => asset('admin/navbar/load-navbar')]) !!}
                                    </div>
                                    <h5 class="text-dark"> <i> The page is used for Admin or Client </i> </h5>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('parent_id','Parent') !!}
                                    <span class="text-danger"> * </span>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-list font-red"></i>
                                        </span>
                                        <select name="parent_id" class="form-control" id="rtr-parent-list">
                                            <option value="0"> Parent </option>
                                            <?php
                                            $parentId = isset($navBar['parent_id']) ? $navBar['parent_id'] : null;
                                            if(isset($navBar['page']))
                                            {
                                                $nav = new \App\Navbar();
                                                $navBarList = $nav->getAll($navBar['page']);
                                            }
                                            ?>
                                            {!! Helper::convertArrayForFormCollective($navBarList, 0, '', $parentId); !!}
                                        </select>
                                    </div>
                                    <h5 class="text-dark"> <i> Create an sub menu with the parent id. Default menu will be parent </i> </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::submit('Save Changes', ['class' => 'btn green']) !!}
                    {!! Form::reset('Clear', ['class' => 'btn btn-default']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
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

                e.preventDefault();

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
