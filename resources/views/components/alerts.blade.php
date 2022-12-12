@if(session()->has('success'))
    <div class="alert alert-success text-center text-success">
        {{ session()->pull('success') }}
    </div>
@endif
