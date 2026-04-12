@if(\Session::has('message'))
    <div class="alert alert-info alert-dismissible text-center" role="alert" style="margin-bottom:0; border-radius:0;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h2>
            <strong><i class="fa fa-info-circle"></i></strong>
            {{ \Session::get('message') }}
        </h2>
    </div>
@endif
