@if(Session::has('success_message'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        <p><strong>Success! </strong>{{ Session::get('success_message') }}</p>
    </div>
@endif

@if ($errors->any() || Session::has('error_message'))
    <?php $errors = $errors->any() ? $errors->all() : Session::get('error_message');?>
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
        @foreach ($errors as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif