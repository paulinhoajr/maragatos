<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@section('title') {{ config('app.site_title') }} @show</title>

    @include('site._partials.head')
</head>

<body>

@include('site._partials.nav')

@yield('content')

@include('site._partials.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

<script src="https://kit.fontawesome.com/b7b89a0fb8.js" crossorigin="anonymous"></script>

@include('site._partials.scripts')

</body>


</html>
