@extends('layouts.admin')

@section('title')
    Usuários - @parent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Usuários</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success btn-sm" href="{{ route('users.create') }}"><i class="fa-solid fa-plus"></i> Novo</a>
            </div>
        </div>
    </div>

    <table class="table table-hover mt-2">
        <tr>
            <th width="80px">#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Permissões</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $user->name }}<p style="margin:0;font-size:.7rem;">Criado em {{ date('d/m/Y', strtotime($user->created_at)) }}</p></td>
                <td>{{ $user->email }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label style="background-color:black;" class="badge badge-secondary">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('users.show', $user->id) }}"><i style="color:white;" class="fa-solid fa-eye"></i></a>
                        @can('user-edit')
                            <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"><i style="color:white;" class="fa-solid fa-pencil"></i></a>
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

    {!! $data->render() !!}
@endsection
