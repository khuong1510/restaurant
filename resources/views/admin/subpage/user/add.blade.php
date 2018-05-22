@extends('admin.layout.master')

@section('title', 'User')
@section('title-detail', 'Add User')
@section('parent', 'user')

@section('content')
    <div class="row">
        <div class="col-md-12">

            @if(session('message'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <p><strong>Success! </strong>{{ session('message') }}</p>
            </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Create New User</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form role="form" action="{{ asset('/admin/user/create') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-user font-red"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{ old('name') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-user-plus font-red"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Username" name="username" value="{{ old('username') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-envelope font-red"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Email Address" name="email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-phone font-red"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="mt-radio-inline">
                                            <label class="mt-radio">
                                                <input type="radio" name="gender" value="0"
                                                    @if(old('gender') == 0)
                                                       checked
                                                    @endif
                                                > Female
                                                <span></span>
                                            </label>
                                            <label class="mt-radio">
                                                <input type="radio" name="gender" value="1"
                                                    @if(old('gender') == 1)
                                                       checked
                                                    @endif
                                                > Male
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 300px; height: 230px;">
                                            <img src="http://www.placehold.it/300x230/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 230px;"> </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                 <span class="fileinput-new"> Select avatar </span>
                                                 <span class="fileinput-exists"> Change </span>
                                                 <input type="file" name="avatar">
                                            </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Birthday</label>
                                        <div class="input-group date date-picker" data-date="1990-01-01" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-calendar font-red"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Birthday" name="dob" readonly value="{{ old('dob') }}">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-key font-red"></i>
                                            </span>
                                            <input type="password" class="form-control" placeholder="Password" name="password">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Retype Password</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-key font-red"></i>
                                            </span>
                                            <input type="password" class="form-control" placeholder="Retype Password" name="password_confirmation">

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                 <i class="fa fa-user-secret font-red"></i>
                                            </span>
                                            <select class="form-control" name="role">
                                                <option value="admin"
                                                    @if(old('role') == 'admin')
                                                        selected
                                                    @endif
                                                >Admin</option>
                                                <option value="staff"
                                                    @if(old('role') == 'staff')
                                                        selected
                                                    @endif
                                                >Staff</option>
                                            </select>
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
                            <button type="button" class="btn default">Refresh</button>
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
    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
