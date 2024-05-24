@if($errors->any())

    <div class="col-12 alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span area-hidden="true">x</span>
        </button>
        {{ $errors->first() }}
    </div>

@endif

@if(session('success'))

    <div class="alert">
        {{ session()->get('success') }}
    </div>

@endif
