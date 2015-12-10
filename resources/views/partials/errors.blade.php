<div class="alert alert-danger">
    <strong>Oops!</strong> Hubo algunos problemas.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>