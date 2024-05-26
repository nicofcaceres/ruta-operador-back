@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <div><i class='bx bx-error-alt' ></i> {{ $error }}</div>
        @endforeach
    </div>
@endif