<div class="tab-pane" id="tab_1_2">
    <form action="#">
        <div class="row">
            <div class="left-col col-md-6">
                <div class="form-group">
                    <label class="control-label">Slider Title</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-font font-red"></i>
                        </span>
                        <input type="text" name="home_slider_title" class="form-control" value="{{ $allConfigs->where('name', 'home_slider_title')->first()->value }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Slider Sub Title</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-text-width font-red"></i>
                        </span>
                        <input type="text" name="home_slider_subtitle" class="form-control" value="{{ $allConfigs->where('name', 'home_slider_subtitle')->first()->value }}" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label">Slider Content</label>
                    <textarea name="home_slider_content" class="form-control" rows="5">{{ $allConfigs->where('name', 'home_slider_content')->first()->value }}</textarea>
                </div>


            </div>

            <div class="right-col col-md-6">


            </div>
        </div>
        <!--end profile-settings-->
        <div class="margin-top-10 text-right">
            <a href="javascript:;" class="btn green"> Save Changes </a>
            <a href="{{ asset('admin/config') }}" class="btn default"> Back </a>
        </div>
    </form>
</div>