@extends('admin.layout.master')

@section('title', title_case($title))
@section('title-detail', title_case('add '.$title))
@section('parent', $title)

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Create New Menu</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" action="{{ asset('/admin/'.$title.'/create') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Menu Name <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-user font-red"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Menu Name" name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Icon</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-user-plus font-red"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Icon" name="icon" value="{{ old('icon') }}">
                                        </div>
                                    </div>

                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <p>Image</p>
                                        <div class="fileinput-new thumbnail" style="width: 300px; height: 230px;">
                                            <img src="http://www.placehold.it/300x230/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
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
                                            <textarea name="description" class="form-control" placeholder="Description" id="" cols="100" rows="5">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Active</label>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="active" value="0"
                                                       @if(old('active') == 0)
                                                       checked
                                                        @endif
                                                > Disable
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="active" value="1"
                                                       @if(old('active') == 1)
                                                       checked
                                                        @endif
                                                > Enable
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
