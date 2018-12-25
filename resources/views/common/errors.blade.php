<!--laravel maneja excepciones para validacion, si validateData se daña se crear $errors-->
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li style="color: red;">
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif 