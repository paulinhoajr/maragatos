@extends('layouts.admin')

@section('title')
    Produto: {{ $product->name  }} - @parent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Ver produto: <b>{{ $product->name }}</b></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"> Voltar</a>
                <a class="btn btn-warning btn-sm" href="{{ route('products.edit', $product->id) }}"> Editar</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Preço:</strong>
                R$ {{ $product->preco }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Imagens:</strong><br>
                @foreach($imagens as $image)
                    <a href="{{ asset("uploads/{$image->image}") }}"><img src="{{ asset("uploads/{$image->image}") }}" alt="{{ $image->id }}"
                         style="width:50%;"></a>
                @endforeach

            </div>
        </div>
    </div>
@endsection
