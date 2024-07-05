@extends('layouts.admin')

@section('title')
    Permissões - @parent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Permissões</h2>
            </div>
            <div class="pull-right">
                @can('role-create')
                    <a class="btn btn-success btn-sm" href="{{ route('permissions.create') }}"><i class="fa-solid fa-plus"></i> Novo</a>
                @endcan
            </div>
        </div>
    </div>

    <table class="table table-hover mt-2">
        <tr>
            <th width="80px">#</th>
            <th>Nome</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($permissions as $key => $perm)
            <tr>
                <td>{{ $perm->id  }}</td>
                <td>{{ $perm->name }}<p style="margin:0;font-size:.7rem;">Criado em {{ date('d/m/Y', strtotime($perm->created_at)) }}</p></td>
                <td>
                    <form action="{{ route('permissions.destroy', $perm->id) }}" method="POST">
                        {{-- <a class="btn btn-info" href="{{ route('permissions.show', $perm->id) }}"><i style="color:white;" class="fa-solid fa-eye"></i></a>[ --}}
                        @can('role-edit')
                            {{--<a class="btn btn-primary" href="{{ route('permissions.edit', $perm->id) }}"><i style="color:white;" class="fa-solid fa-pencil"></i></a>--}}
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('role-delete')
                            <a type="submit" class="btn btn-danger" onclick="this.closest('form').submit();"><i style="color:white;" class="fa-solid fa-trash"></i></a>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $permissions->render() !!}
@endsection
