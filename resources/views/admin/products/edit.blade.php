@extends('layouts.admin')


@section('title')
    Editar: {{ $product->name }} - @parent
@stop


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editando produto: <b>{{ $product->name }}</b></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary btn-sm" href="{{ back()->getTargetUrl() }}"> Voltar</a>
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

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Preço:</strong>
                    <input class="form-control" name="preco" placeholder="Preco" value="R$ {{ $product->preco }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Adicionar novas imagens:</strong>
                    <!--
                    <div class="col-md-4 text-center" style="padding-top:30px;">
                        <div id="upload-input" style="width:350px; height: 400px;"></div>
                    </div>
                    <a class="btn btn-warning upload-result mt-2">Confirmar</a>
                    -->
                    <input class="form-control" id="upload" multiple type="file" name="upload[]">
                </div>
            </div>
            <div class="col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Imagens:</strong>
                    <br>

                </div>
            </div>

            @foreach($imagens as $image)
            <div class="row-cols-sm-1 w-25">
                <img src="{{ asset("uploads/{$image->image}") }}" style="border-radius:5px 5px 0 0;" class="shadow-lg" alt="{{ $image->id }}">
                <form method="POST" action="{{ route('products.destroyImage', $image->id) }}">
                    @method('DELETE')
                    @csrf
                    <a onclick="event.preventDefault(); this.closest('form').submit();" style="border-radius:0 0 5px 5px;" class="btn btn-danger shadow-lg w-100"><i class="fa-solid fa-trash"></i> Remover</a>
                </form>
            </div>
            @endforeach
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Salvar</button>
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
