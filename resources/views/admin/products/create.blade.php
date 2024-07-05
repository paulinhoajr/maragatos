@extends('layouts.admin')


@section('title')
    Criar produto - @parent
@stop


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Criar novo produto</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"> Voltar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <strong>Opa!</strong> Tivemos alguns problemas com seu formulário.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Preço:</strong>
                    <input class="form-control" name="preco" placeholder="Preço">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Imagens:</strong>
                    <!--
                    <div class="col-md-4 text-center" style="padding-top:30px;">
                        <div id="upload-input" style="width:350px; height: 400px;"></div>
                    </div>
                    <a class="btn btn-warning upload-result mt-2">Confirmar</a>
                    -->
                    <input class="form-control" multiple type="file" name="upload[]">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-success">Criar</button>
            </div>
        </div>
    </form>

    <script>
        $(() => {
            $('[name="preco"]').maskMoney({
                prefix: "R$ ",
                decimal: ",",
                thousands: "."
            });
        });

        /*
        $uploadCrop = $('#upload-input').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'square'
            },
            boundary: {
                width: 300,
                height: 300
            }
        });


        $('#upload').on('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                $uploadCrop.croppie('bind', {
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });

            }
            reader.readAsDataURL(this.files[0]);
        });


        $('.upload-result').on('click', function (ev) {
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function (resp) {
                console.log(resp);
                const send = XMLHttpRequest.prototype.send;
                XMLHttpRequest.prototype.send = function (body) {
                    const newBody = JSON.parse(body);
                    newBody.banner = resp;
                    console.log(JSON.stringify(newBody));
                    send.call(this, JSON.stringify(newBody));
                };
            });
        });
        */
    </script>
@endsection
