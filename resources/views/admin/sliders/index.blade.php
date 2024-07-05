@extends('layouts.admin')

@section('title')
    Sliders - @parent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sliders</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success btn-sm" href="{{ route('sliders.create') }}"><i class="fa-solid fa-plus"></i> Novo</a>
            </div>
        </div>
    </div>

    <table class="table table-hover mt-2">
        <tr>
            <th width="80px">#</th>
            <th>Título</th>
            <th>Descrição</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($sliders as $i => $slider)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $slider->titulo }}<p style="margin:0;font-size:.7rem;">Criado em {{ date('d/m/Y', strtotime($slider->created_at)) }}</p></td>
                <td>{{ $slider->descricao }}</td>
                <td>
                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('sliders.show', $slider->id) }}"><i style="color:white;" class="fa-solid fa-eye"></i></a>
                        @can('user-edit')
                            <a class="btn btn-primary" href="{{ route('sliders.edit', $slider->id) }}"><i style="color:white;" class="fa-solid fa-pencil"></i></a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('user-delete')
                            <a type="submit" class="btn btn-danger" onclick="this.closest('form').submit();"><i style="color:white;" class="fa-solid fa-trash"></i></a>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $sliders->links() }}
@endsection
