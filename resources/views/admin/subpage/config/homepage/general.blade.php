<div class="tab-pane active" id="tab_1_1">
    <form action="{{ asset('/admin/config/homepage') }}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="left-col col-md-6">
                <div class="form-group">
                    <label class="control-label">Restaurant Name</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-building font-red"></i>
                        </span>
                        <input type="text" name="home_name" class="form-control" value="{{ $allConfigs->getValue('home_name') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-envelope font-red"></i>
                        </span>
                        <input type="text" name="home_email" class="form-control" value="{{ $allConfigs->getValue('home_email') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Phone</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone font-red"></i>
                        </span>
                        <input type="text" name="home_phone" class="form-control" value="{{ $allConfigs->getValue('home_phone') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Address</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-map-marker font-red"></i>
                        </span>
                        <input type="text" name="home_address" class="form-control" value="{{ $allConfigs->getValue('home_address') }}" />
                    </div>
                </div>

            </div>

            <div class="right-col col-md-6">
                <div class="form-group">
                    <label class="control-label">Facebook</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-facebook-f font-red"></i>
                        </span>
                        <input type="text" name="home_social_fb" class="form-control" value="{{ $allConfigs->getValue('home_social_fb') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Instagram</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-instagram font-red"></i>
                        </span>
                        <input type="text" name="home_social_instagram" class="form-control" value="{{ $allConfigs->getValue('home_social_instagram') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Twitter</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-twitter font-red"></i>
                        </span>
                        <input type="text" name="home_social_twitter" class="form-control" value="{{ $allConfigs->getValue('home_social_twitter') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <p class="control-label">Restaurant Logo</p>
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="max-width: 250px; max-height: 250px; width: auto; height: auto;">
                            <img src="{{ asset($allConfigs->getValue('home_logo')) }}" id="restaurantLogo" style="max-height: 220px;"/> </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 230px;"> </div>
                        <div>
                        <span class="btn default btn-file">
                            <span class="fileinput-new"> Select image </span>
                            <span class="fileinput-exists"> Change </span>
                            <input type="file" name="home_logo">
                        </span>
                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                        </div>
                    </div>
                    <div class="clearfix margin-top-10">
                        <span class="label label-danger">NOTE!</span>
                            <span> Attached image is required lower than 6 Mb
                           and image dimensions is greater than 100x100.
                        </span>
                    </div>
                </div>

            </div>
        </div>
        <!--end profile-settings-->
        <div class="margin-top-10 text-right">
            <button type="submit" class="btn green"> Save Changes </button>
            <a href="{{ asset('admin/config') }}" class="btn default"> Back </a>
        </div>
    </form>
</div>