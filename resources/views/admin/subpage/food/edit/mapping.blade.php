<div class="tab-pane" id="tab_1_2">
    <p> Change user avatar. </p>
    <form id="updateAvatarForm" action="{{ asset('/admin/user/update') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="userId" value="" />
        <input type="hidden" id="images-link" value="" />
        <input type="hidden" class="form-control" name="formId" />
        <div class="form-group">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="max-width: 250px; max-height: 250px; width: auto; height: auto;">
                    <img src="" id="userThumbnailAvatar" style="max-height: 220px;"/> </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 230px;"> </div>
                <div>
                    <span class="btn default btn-file">
                        <span class="fileinput-new"> Select image </span>
                        <span class="fileinput-exists"> Change </span>
                        <input type="file" name="avatar">
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
        <div class="margin-top-10">
            <button type="submit" class="btn green submitBtn"> Submit </button>
        </div>
    </form>
</div>