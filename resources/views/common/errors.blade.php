<!--laravel maneja excepciones para validacion, si validateData se daña se crear $errors-->
@if($errors->any())
<div class="alert alert-danger  alert-dismissible fade show">
    <ul>
        @foreach($errors->all() as $error)
        <li style="color: red;">
            {{$error}}
        </li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif 