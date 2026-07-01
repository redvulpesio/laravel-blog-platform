@if(session()->has('success'))
    <div class="alert alert-success">
        <p>{{session('success')}}</p>
    </div>
@endif
@if(session()->has('message'))
    <div class="alert alert-info">
        <p>{{session('message')}}</p>
    </div>
@endif
