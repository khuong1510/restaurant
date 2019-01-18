<div class="tab-pane active" id="tab_1_1">
    <form role="form" id="updateForm" method="POST" data-action="{{ asset("/admin/user/update") }}">
        {{ csrf_field() }}
        <input type="hidden" class="form-control" name="userId" value="{{ $user->id }}" />
        <input type="hidden" class="form-control" name="formId" />
        <div class="form-group">
            <label class="control-label">Full Name</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user font-red"></i>
                </span>
                <input type="text" class="form-control" value="{{ $user->name }}" readonly />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Username</label>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fa fa-user-plus font-red"></i>
                </span>
                <input type="text" class="form-control" value="{{ $user->username }}" readonly />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Email</label>
            <div class="input-group">
                <span class="input-group-addon">
                     <i class="fa fa-envelope font-red"></i>
                </span>
                <input type="text" class="form-control" name="email" value="{{ $user->email }}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Mobile Number</label>
            <div class="input-group">
                <span class="input-group-addon">
                     <i class="fa fa-phone font-red"></i>
                </span>
                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">Birthday</label>
            <div class="input-group date date-picker" data-date="1990-01-01" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                <span class="input-group-addon">
                    <i class="fa fa-calendar font-red"></i>
                </span>
                <input type="text" class="form-control" name="dob" readonly value="{{ $user->dob }}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label">About</label>
            <textarea class="form-control" rows="3" placeholder="We are KeenThemes!!!"></textarea>
        </div>

        <div class="margiv-top-10">
            <button type="button" class="btn green submitBtn"> Save Changes </button>
            {{--<a href="javascript:;" class="btn default"> Cancel </a>--}}
        </div>
    </form>
</div>