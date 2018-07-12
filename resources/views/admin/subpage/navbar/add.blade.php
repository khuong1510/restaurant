@extends('admin.layout.master')

@section('title', 'NavBar')
@section('title-detail', 'Add NavBar')
@section('parent', 'navbar')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption font-red-sunglo">
                        <i class="icon-settings font-red-sunglo"></i>
                        <span class="caption-subject bold uppercase"> Create New NavBar </span>
                    </div>
                </div>
                <div class="portlet-body form">
                    {!! Form::open(['route' => 'navbar.store']) !!}
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
                                    <i class="fa fa-th-large font-red"></i>
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
                                      '' => 'Select page',
                                      'admin' => 'Admin',
                                      'client' => 'Client'
                                    ],
                                    'Select Page'
                                    ,
                                   ['class' => 'form-control']) !!}
                                </div>
                                <h5 class="text-dark"> <i> The page is used for Admin or Client </i> </h5>
                            </div> 
                            <div class="form-group">
                              {!! Form::label('parent_id','Parent Id') !!}
                                <span class="text-danger"> * </span>
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-list font-red"></i>
                                  </span>
                                  {!! Form::select('parent_id', 
                                    [
                                      '' => 'Select Parent',
                                      '1' => 'Parent',
                                    ],
                                    'Select Parent'
                                    ,
                                   ['class' => 'form-control']) !!}
                                </div>
                                <h5 class="text-dark"> <i> Create an sub menu with the parent id. Default menu will be parent </i> </h5>
                            </div> 
                        </div>
                      </div>
                    </div>
                      {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
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

        });
    </script>
@endsection
