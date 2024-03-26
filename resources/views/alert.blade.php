<div class="row justify-content-center" style="margin-left: 30%">
    <div class="col-md-6 mb-2 mx-auto">
        @if (session()->has('success'))
        <div class="alert alert-success alert_close_btn" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close alert_close_btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if (session()->has('error'))
        <div class="alert alert-danger alert_close_btn" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="close alert_close_btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
</div>
