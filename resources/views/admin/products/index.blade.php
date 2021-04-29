@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('create', route('products.create'))
        @slot('titulo', 'Vendas')
        @slot('head')
            <th>Produto</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th></th>
        @endslot
        @slot('body')
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->product }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td class="options">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form method="post" action="{{ route('products.destroy', $product->id) }}" class="form-delete">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script src="{{ asset('js/components/dataTable.js') }}"></script>
    <script src="{{ asset('js/components/sweetAlert.js') }}"></script>
@endpush
