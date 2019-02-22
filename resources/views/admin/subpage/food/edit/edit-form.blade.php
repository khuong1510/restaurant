<div class="tab-pane active" id="tab_1_1">
    <!-- BEGIN SAMPLE FORM PORTLET-->
    @if(!empty($food))
        {!! Form::model($food, ['route' => ['food.update', 'id' => $food->id] , 'method' => 'PUT', 'id' => 'rtr-edit-form', 'files' => true, 'before' => 'csrf']) !!}
        {{--! Form::hidden('id', old('id'), ['class' => 'form-control', 'placeholder' => 'Id']) !!}--}}
    @else
        {!! Form::open(['route' => 'food.store', 'enctype' => "multipart/form-data"]) !!}
    @endif

    <div class="row">
        {{--LEFT SIDE--}}
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
                    <h5 class="text-dark"> <i> Enter a food name. Example: Pizza </i> </h5>
                </div>
                <div class="form-group">
                    {!! Form::label('price','Price') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-chain-broken font-red"></i>
                        </span>
                        {!! Form::number('price', old('price'), ['class' => 'form-control', 'placeholder' => 'Price']) !!}
                    </div>
                    <h5 class="text-dark"> <i> Enter price of this food (after discount)</i> </h5>
                </div>
                <div class="form-group">
                    {!! Form::label('material','Material') !!}
                    <span class="text-danger"> * </span>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-link font-red"></i>
                        </span>
                        {!! Form::textarea('material', old('material'), ['class' => 'form-control', 'placeholder' => 'Material']) !!}
                    </div>
                    <h5 class="text-dark"> <i> Enter material. Example: Salt, Sugar, ... </i> </h5>
                </div>
                <div class="form-group">
                    {!! Form::label('available','Available') !!}
                    <span class="text-danger"> * </span>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-paperclip font-red"></i>
                        </span>
                        {!! Form::select('available',
                        [
                            0 => 'No',
                            1 => 'Yes'
                        ],
                        old('available'),
                        ['class' => 'form-control']) !!}
                    </div>
                    <h5 class="text-dark"> <i> Select food availability </i> </h5>
                </div>
                <div class="form-group">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="max-width: 250px; max-height: 250px; width: auto; height: auto;">
                            <img src="{{ isset($food) ? asset('/images/foods/'.$food->image) : asset('/images/ajax-loader.gif') }}" id="userThumbnailAvatar" style="max-height: 220px;"/> </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 230px;"> </div>
                        <div>
                            <span class="btn default btn-file">
                                <span class="fileinput-new"> Select image </span>
                                <span class="fileinput-exists"> Change </span>
                                {!! Form::file('image', old('image'), ['class' => 'form-control', 'placeholder' => 'Image']) !!}
                            </span>
                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                    </div>
                    <div class="clearfix margin-top-10">
                        <span class="label label-danger">NOTE!</span>
                        <span> Attached image is required lower than 6 Mb and image dimensions is greater than 100x100.</span>
                    </div>
                </div>
            </div>
        </div>
        {{--END LEFT SIDE--}}

        {{--RIGHT SIDE--}}
        <div class="col-md-6">
            <div class="form-body">
                <div class="form-group">
                    {!! Form::label('food_type','Food Type') !!}
                    <span class="text-danger"> * </span>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-paperclip font-red"></i>
                        </span>
                        {!! Form::select('food_type',
                        $foodType,
                        old('food_type'),
                        ['class' => 'form-control']) !!}
                    </div>
                    <h5 class="text-dark"> <i> Select food type </i> </h5>
                </div>

                <div class="form-group">
					{!! Form::label('original_price','Original Price') !!}
					<div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-chain-broken font-red"></i>
                        </span>
						{!! Form::number('original_price', old('original_price'), ['class' => 'form-control', 'placeholder' => 'Original Price']) !!}
					</div>
					<h5 class="text-dark"> <i> Enter original price of this food (before discount) </i> </h5>
				</div>

                <div class="form-group">
                    {!! Form::label('description','Description') !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-th-large font-red"></i>
                        </span>
                        {!! Form::textarea('description', old('description'), ['class' => 'form-control', 'placeholder' => 'Description']) !!}
                    </div>
                    <h5 class="text-dark"> <i> Enter any note of this food </i> </h5>
                </div>
                <div class="form-group">
                    {!! Form::label('active','Active') !!}
                    <span class="text-danger"> * </span>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-paperclip font-red"></i>
                        </span>
                        {!! Form::select('active',
                        [
                            0 => 'Disable',
                            1 => 'Enable'
                        ],
                        old('active'),
                        ['class' => 'form-control']) !!}
                    </div>
                    <h5 class="text-dark"> <i> Select status to show food in website </i> </h5>
                </div>

            </div>
        </div>
        {{--END RIGHT SIDE--}}
    </div>
    {!! Form::submit('Save Changes', ['class' => 'btn green']) !!}
    {!! Form::reset('Clear', ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}
    <!-- END SAMPLE FORM PORTLET-->
</div>