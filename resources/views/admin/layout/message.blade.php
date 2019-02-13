<div class="alert alert-success alert-dismissable" id="successMsg" @if(!Session::has('success_message')) style="display: none" @endif>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    <p><strong>Success! </strong>{{ Session::has('success_message') ? Session::get('success_message') : "" }}</p>
</div>

<div class="alert alert-danger alert-dismissable" id="errorsMsg" @if (!$errors->any() && !Session::has('error_message')) style="display: none" @endif>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
    @if ($errors->any() || Session::has('error_message'))
        <?php $errors = $errors->any() ? $errors->all() : Session::get('error_message');?>
        @foreach ($errors as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
</div>
