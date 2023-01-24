@if(session('message'))
    <div class="message alert alert-success">
        {{ session('message') }}
    </div>
@endif
