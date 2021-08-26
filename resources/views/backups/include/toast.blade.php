
@if (session('status'))
    <div class="ui toast" id="toast-status" style="background-color: #fb6400">
        {{ session('status') }}
    </div>
@endif

@if (session('success'))
    <div class="ui green toast" id="toast-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="ui red toast" id="toast-error">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="ui red toast" id="toast-error">
            {{ $error }}
        </div>
    @endforeach
@endif
