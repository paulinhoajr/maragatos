@extends('layouts.admin')

@section('title')
    Slider: {{ $slider->name  }} - @parent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editando: {{ $slider->titulo }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary btn-sm" href="{{ back()->getTargetUrl() }}"> Voltar</a>
            </div>
        </div>
    </div>

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

    <form method="POST" action="{{ route('sliders.update', $slider->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Título:</strong>
                    {!! Form::text('titulo', $slider->titulo, array('placeholder' => 'Slider 1','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Descrição:</strong>
                    {!! Form::text('descricao', $slider->descricao, array('placeholder' => 'Esse é um slider','class' => 'form-control')) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Imagem:</strong>
                    <input name="imagem" id="imagem" type="file" class="form-control"/>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
@endsection
