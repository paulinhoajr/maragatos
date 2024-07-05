@extends('layouts.site')

@section('og_title')
    <meta property="og:title" content="Contato - {{ config('app.site_title') }}">
@stop
@section('og_url')
    <meta property="og:url" content="{{ Request::url() }}">
@stop
@section('og_description')
    <meta property="og:description" content="{{ config('app.site_description') }}">
@stop
@section('og_image')
    <meta property="og:image" content="{{ url('/') }}{{ config('app.site_logo') }}">
@stop

@section('title')
    Sobre - @parent
@stop

@section('content')
    <div style="height:220px; width:100%; background-image:url('https://placehold.co/1920x220');">
        <div class="container">
            <h2 class="text-center fw-bolder" style="padding:75px;font-size:3.5rem;">Sobre</h2>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="fw-bolder text-center">{{ config('app.name') }}</h2>
                <div style="font-size:1.5rem;"><b>História</b></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget sollicitudin nunc.
                    Aenean mauris quam, iaculis sit amet condimentum vitae, consectetur ut urna.
                    Nullam accumsan tempor mauris vitae lobortis. Nam at malesuada justo.
                    Aenean quis ornare velit, sit amet facilisis neque.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget sollicitudin nunc.
                    Aenean mauris quam, iaculis sit amet condimentum vitae, consectetur ut urna.
                    Nullam accumsan tempor mauris vitae lobortis. Nam at malesuada justo.
                    Aenean quis ornare velit, sit amet facilisis neque.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget sollicitudin nunc.
                    Aenean mauris quam, iaculis sit amet condimentum vitae, consectetur ut urna.
                    Nullam accumsan tempor mauris vitae lobortis. Nam at malesuada justo.
                    Aenean quis ornare velit, sit amet facilisis neque.</p>

                <div style="font-size:1.5rem;"><b>Missão</b></div>
                <p>Atender com qualidade, propor soluções inteligentes, que gerem segurança e tranquilidade
                    aos clientes.</p>

                <div style="font-size:1.5rem;"><b>Visão</b></div>
                <p>Destacar-se no segmento da Segurança eletronica, manter-se através do empenho continuo na
                    prestação de serviço diferenciado a seus clientes.
                </p>
            </div>
            <div class="col-sm-6">
                <img src="https://placehold.co/700x400" style="max-width: 100%;" alt="Foto 1">
                <img src="https://placehold.co/700x400" style="max-width: 100%;" alt="Foto 2" class="mt-2">
            </div>
        </div>


    </div>
@endsection
