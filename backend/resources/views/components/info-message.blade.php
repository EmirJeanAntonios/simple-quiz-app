@if (Session::has('success'))
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="alert alert-success mb-4">
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
@endif

@if (Session::has('error'))
<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="alert alert-danger mb-4">
            {{ Session::get('error') }}
        </div>
    </div>
</div>
@endif
