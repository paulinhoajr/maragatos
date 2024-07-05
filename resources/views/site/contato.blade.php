@extends('layouts.site')

@section('title')
    Contato - @parent
@stop

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

@section('head')
    <script src='https://www.google.com/recaptcha/api.js?render={{env('CAPTCHA_KEY')}}'></script>
    <script>
        grecaptcha.ready(function () {
            grecaptcha.execute('{{env('CAPTCHA_KEY')}}', {action: 'homepage'}).then(function (token) {
                document.getElementById('g-recaptcha-response').value = token;
            });
        });
    </script>
@endsection

@section('content')

    <div style="height:220px; width:100%; background-image:url('https://placehold.co/1920x220');">
        <div class="container">
            <h2 class="text-center fw-bolder" style="padding:75px;font-size:3.5rem;">Fale Conosco</h2>
        </div>
    </div>
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="fw-bolder text-center">Formulário de contato</h2>
                <form method="post" class="contact-form" action="{{ route('enviar_email') }}">
                    @csrf
                    <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

                @if (count($errors) > 0)
                        <div class="alert alert-danger mt-2">
                            <strong>Opa!</strong> Tivemos alguns problemas com seu formulário.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <input type="text" class="form-control" maxlength="50" placeholder="Nome *"
                                   required="required" id="name" name="name">
                        </div>
                        <div class="col-md-12 mt-2">
                            <input type="text" class="form-control" maxlength="70" placeholder="Assunto *"
                                   required="required" id="subject" name="subject">
                        </div>
                        <div class="col-md-6 mt-2">
                            <input type="email" class="form-control" maxlength="70" placeholder="E-mail *"
                                   required="required" id="email" name="email">
                        </div>
                        <div class="col-md-6 mt-2">
                            <input type="text" class="form-control" maxlength="70" placeholder="Fone *"
                                   required="required" id="phone" name="phone">
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control mt-2" rows="12" maxlength="1000" placeholder="Mensagem *"
                                      required="required" id="message" name="message"></textarea>
                        </div>

                        <div id="captcha" class="mt-3"></div>

                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-white"><span>Enviar Mensagem</span></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <h4 class="mt-2">Informações</h4>
                <ul style="list-style:none;" class="mt-3">
                    <li style="margin-left:-30px;">
                        <p>
                            <i class="fa-solid fa-map-marker-alt text-center" style="padding-right:4px;"></i>
                            <strong>Endereço:</strong>
                            <a href="https://goo.gl/maps/colocarenderecoaqui" target="_blank"> Av. Fulano de Tal,
                                100</a>
                        </p>
                    </li>
                    <li style="margin-left:-30px;">
                        <p><i class="fa-solid fa-phone text-center"></i> <strong>Telefone:</strong> <a
                                    href="tel: 05432420000"> (54) 3242 0000</a></p>
                    </li>
                    <li style="margin-left:-30px;">
                        <p><i class="fa-solid fa-envelope text-center" style="padding-right:4px;"></i>
                            <strong>E-mail:</strong> <a href="mailto:contato@laravel.com">contato@laravel.com</a></p>
                    </li>
                </ul>
                <hr>

                <h4 class="mt-2">Horário de atendimento</h4>
                <p><i class="fa-solid fa-clock text-center" style="padding-right:4px;"></i> Segunda à Sexta | 8:30 às
                    18:30</p>
            </div>
        </div>


    </div>
    <script src="https://www.google.com/recaptcha/api.js?onload=onLoadCallback&render=explicit"></script>
@endsection
