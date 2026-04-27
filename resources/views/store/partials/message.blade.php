@if(\Session::has('message'))
    <div class="alert alert-success alert-dismissible text-center" role="alert" style="margin-bottom:0; border-radius:0;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="mb-0">
            <strong><i class="fa fa-check-circle"></i></strong>
            {{ \Session::get('message') }}
        </h4>
    </div>
@endif

@if(\Session::has('error'))
    <div class="alert alert-danger alert-dismissible text-center" role="alert" style="margin-bottom:0; border-radius:0;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="mb-0">
            <strong><i class="fa fa-times-circle"></i></strong>
            {{ \Session::get('error') }}
        </h4>
    </div>
@endif
