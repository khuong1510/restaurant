<div class="tab-pane" id="tab_1_3">
    <form id="updatePasswordForm" method="POST" data-action="{{ asset("/admin/user/update") }}">
        {{ csrf_field() }}
        <input type="hidden" class="form-control" name="userId" value="{{ $user->id }}" />
        <input type="hidden" class="form-control" name="formId" />
        <div class="form-group">
            <label class="control-label">Current Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="old_password" id="old_password"/> </div>
        <div class="form-group">
            <label class="control-label">New Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="password" id="password" /> </div>
        <div class="form-group">
            <label class="control-label">Re-type New Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" /> </div>
        <div class="margin-top-10">
            <button type="button" class="btn green submitBtn"> Change Password </button>
            {{--<a href="javascript:;" class="btn default"> Cancel </a>--}}
        </div>
    </form>
</div>