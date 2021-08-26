<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ url('resource/writeeers-logo-icon-inverted.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.css">
    <link rel="stylesheet" href="{{ asset('css/mainApp.css') }}">
</head>

<body>



    @include('include.navbar')

    @include('include.toast')

    @yield('content')






    <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.4/dist/semantic.min.js"></script>
    <script src="{{ asset('js/mainApp.js') }}"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#article-editor' ), {
            //
            removePlugins: [ 'Image' ],
        })
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
    </script>
</body>

</html>
