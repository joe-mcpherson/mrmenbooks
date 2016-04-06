@if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <p><strong>Something's not right, please check below for errors</strong></p>

        <ul>
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif