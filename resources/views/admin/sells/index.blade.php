@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('create', route('sells.create'))
        @slot('titulo', 'Vendas')
        @slot('head')
            <th>Vendedor</th>
            <th>Produto</th>
            <th>Categoria</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th></th>
        @endslot
        @slot('body')
            @foreach($sells as $sell)
                <tr>
                    <td>{{ $sell->user->name }}</td>
                    <td>{{ $sell->product->product }}</td>
                    <td>{{ $sell->product->category->name }}</td>
                    <td>{{ $sell->amount }}</td>
                    <td>{{ $sell->product->price * $sell->amount }}</td>
                    <td class="options">
                        <a href="{{ route('sells.edit', $sell->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form method="post" action="{{ route('sells.destroy', $sell->id) }}" class="form-delete">
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
