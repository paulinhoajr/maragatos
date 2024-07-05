<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="imagetoolbar" content="no"/>
<meta http-equiv="window-target" content="standard"/>
<meta http-equiv="Expires" content="-1"/>
<meta http-equiv="Content-Language" content="pt-br"/>
<meta http-equiv="cache-control" content="no-cache"/>
<meta name="resource-type" content="document"/>
<meta name="classification" content="Internet"/>
<meta name="distribution" content="Global"/>
<meta name="doc-class" content="Completed"/>
<meta name="generator" content="JetBrains PhpStorm"/>
<meta name="MSSmartTagsPreventParsing" content="true"/>
<meta name="author" content="Voope Soluções"/>
<link rel="author" href="https://www.voope.com.br" title="Voope"/>
<meta name="revisit-after" content="30 Days"/>
<meta name="robots" content="index, follow">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="DC.date.created" content="{{ config('app.site_date') }}"/>

<meta name="DC.title" content="{{ config('app.site_title') }}"/>

<meta name="keywords" content="{{ config('app.site_keywords') }}"/>
<meta name="description" content="{{ config('app.site_description') }}"/>

<meta property="og:locale" content="pt_BR">
@section('og_title')
    <meta property="og:title" content="{{ config('app.site_keywords') }}">
@show
@section('og_url')
    <meta property="og:url" content="{{ Request::url() }}">
@show
@section('og_description')
    <meta property="og:description" content="{{ config('app.site_description') }}">
@show
@section('og_image')
    <meta property="og:image" content="{{ url('/') }}{{ config('app.site_logo') }}">
@show
<meta property="og:type" content="website" />

<link rel="icon" href="{{ asset('images/favicon.png') }}" />







<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

<!-- Styles -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">






@yield('head')
