@extends('layouts.admin')

@section('title')
    Produtos - @parent
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Produtos</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                    <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"><i class="fa-solid fa-plus"></i> Novo</a>
                @endcan
            </div>
        </div>
    </div>

    <table class="table table-hover mt-2">
        <tr>
            <th width="80px">#</th>
            <th>Nome</th>
            <th>Preço</th>
            <th width="280px">Ação</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}<p style="margin:0;font-size:.7rem;">Criado em {{ date('d/m/Y', strtotime($product->created_at)) }}</p></td>
                <td>R$ {{ $product->preco }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}"><i style="color:white;" class="fa-solid fa-eye"></i></a>
                        @can('product-edit')
                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}"><i style="color:white;" class="fa-solid fa-pencil"></i></a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('product-delete')
                            <a type="submit" class="btn btn-danger" onclick="this.closest('form').submit();"><i style="color:white;" class="fa-solid fa-trash"></i></a>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}
@endsection
