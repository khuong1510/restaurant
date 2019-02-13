@extends('admin.layout.master')

@section('title', title_case($title))
@section('title-detail', title_case('edit '.$title))
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

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Edit Menu</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form data-action="{{ asset('/admin/'.$title.'/update') }}" id="rtr-edit-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Menu Name <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-user font-red"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Menu Name" name="name" value="{{ $item->name }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Icon</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-user-plus font-red"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Icon" name="icon" value="{{ $item->icon }}">
                                        </div>
                                    </div>

                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <p>Image</p>
                                        <div class="fileinput-new thumbnail" style="width: 300px; height: 230px;">
                                            <img src="{{ $item->image ? asset('/images/'.$title.'/'.$item->image) : asset('/images/'.$title.'/default-user.png')}}" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 230px;"> </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                 <span class="fileinput-new"> Select image </span>
                                                 <span class="fileinput-exists"> Change </span>
                                                 <input type="file" name="image">
                                            </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>

                                        <div class="clearfix margin-top-10">
                                            <span class="label label-danger">NOTE!</span>
                                            <span> Attached image is required lower than 6 Mb <br>
                                                    And image dimensions is greater than 100x100.
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <textarea name="description" class="form-control" placeholder="Description" id="" cols="100" rows="5">{{ $item->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Active</label>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="active" value="0"
                                                       @if($item->active == 0)
                                                       checked
                                                        @endif
                                                /> Disable
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="active" value="1"
                                                       @if($item->active == 1)
                                                       checked
                                                        @endif
                                                /> Enable
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="form-actions text-right">
                            <a href="{{ asset('/admin/'.$title) }}" class="btn default">Back</a>
                            <button type="submit" class="btn blue">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->
        </div>
    </div>
@endsection

@section('addition-script')
    <script type="text/javascript">
        var form = $("form#rtr-edit-form");
        var errorMsg = $("#errorsMsg");
        var successMsg = $("#successMsg");

        $(document).ready(function() {
            form.submit(function(e) {
                errorMsg.hide();
                successMsg.hide();

                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    method: "POST",
                    url: form.attr("data-action"),
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
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
        });
    </script>
@endsection