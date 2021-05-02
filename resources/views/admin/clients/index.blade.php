@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('create', route('clients.create'))
        @slot('titulo', 'Cliente')
        @slot('head')
            <th>Nome</th>
            <th></th>
        @endslot
        @slot('body')
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td class="options">
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form method="post" action="{{ route('clients.destroy', $client->id) }}" class="form-delete">
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
