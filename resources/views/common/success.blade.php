@if(session('status'))
<div class="alert alert-success mt-2">
    {{session('status')}}
</div>
@endif
@if(session('info'))
<div class="alert alert-info mt-2">
    {{session('info')}}
</div>
@endif