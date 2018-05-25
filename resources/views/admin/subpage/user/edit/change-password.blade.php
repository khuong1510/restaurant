<div class="tab-pane" id="tab_1_3">
    <form id="updatePasswordForm" method="POST">
        {{ csrf_field() }}
        <input type="hidden" class="form-control" name="userId" value="{{ $user->id }}" />
        <input type="hidden" class="form-control" name="formId" />
        <div class="form-group">
            <label class="control-label">Current Password</label>
            <input type="password" class="form-control" name="old_password" /> </div>
        <div class="form-group">
            <label class="control-label">New Password</label>
            <input type="password" class="form-control" name="password" /> </div>
        <div class="form-group">
            <label class="control-label">Re-type New Password</label>
            <input type="password" class="form-control" name="confirmation_password" /> </div>
        <div class="margin-top-10">
            <button type="button" class="btn green submitBtn"> Change Password </button>
            <a href="javascript:;" class="btn default"> Cancel </a>
        </div>
    </form>
</div>