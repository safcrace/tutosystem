@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Ooops!</strong> Por Favor Corrige los errores!!!.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
