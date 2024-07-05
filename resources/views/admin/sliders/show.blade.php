@extends('layouts.admin')

@section('title')
    Slider: {{ $slider->name  }} - @parent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Ver slider: <b>{{ $slider->titulo }}</b></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary btn-sm" href="{{ route('sliders.index') }}"> Voltar</a>
                <a class="btn btn-warning btn-sm" href="{{ route('sliders.edit', $slider->id) }}"> Editar</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Título:</strong>
                {{ $slider->titulo }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Descrição:</strong>
                {{ $slider->descricao }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>Imagem:</strong><br>
                <img src="{{ asset("uploads/{$slider->imagem}") }}" alt="{{ $slider->titulo }}"
                     style="width:50%;">

            </div>
        </div>
    </div>
@endsection
