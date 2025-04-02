@if (session()->has('flash_notification.message'))
    <div class="container">
        <div class="alert alert-{{ session()->get('flash_notification.level') }} alert-dismissible">
            {!! session()->get('flash_notification.message') !!}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif