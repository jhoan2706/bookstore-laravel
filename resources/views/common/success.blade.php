@if(session('status'))
<div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session('info'))
<div class="alert alert-info mt-2">
    {{session('info')}}
</div>
@endif