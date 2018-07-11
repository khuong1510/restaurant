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
                    {!! Form::open(['url' => 'foo/bar']) !!}
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-body">
                            <div class="form-group">
                              {!! Form::label('name','Name') !!}
                                <span class="text-danger"> * <span>
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-user font-red"></i>
                                  </span>
                                  {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                                </div>
                            </div> 
                            <div class="form-group">
                              {!! Form::label('link','Link') !!}
                                <span class="text-danger"> * <span>
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-user font-red"></i>
                                  </span>
                                  {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => 'Link']) !!}
                                </div>
                            </div> 
                            <div class="form-group">
                              {!! Form::label('alias','Alias') !!}
                                <span class="text-danger"> * <span>
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-user font-red"></i>
                                  </span>
                                  {!! Form::text('alias', old('alias'), ['class' => 'form-control', 'placeholder' => 'Alias']) !!}
                                </div>
                            </div> 
                            <div class="form-group">
                              {!! Form::label('page','Page In use') !!}
                                <span class="text-danger"> * <span>
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-user font-red"></i>
                                  </span>
                                  {!! Form::select('page', 
                                    [
                                      'Select Page' => '',
                                      'Admin' => 'admin',
                                      'Client' => 'client'
                                    ],
                                    ,
                                    'Select Page'
                                    ,
                                   ['class' => 'form-control']) !!}
                                </div>
                            </div> 
                        </div>
                      </div>
                    </div>
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
