@extends('admin.layouts.app')

@section('content')
    @component('admin.components.table')
        @slot('create', route('messages.create'))
        @slot('titulo', 'Mensagem')
        @slot('head')
            <th>Título</th>
            <th>Mensagem</th>
            <th>Enviado para</th>
            <th>Enviado por</th>
            <th>Data de envio</th>
            <th></th>
        @endslot
        @slot('body')
            @foreach($messages as $message)
                <tr>
                    <td>{{ $message->title }}</td>
                    <td>{{ $message->message }}</td>
                    @if ($message->user_id == NULL)
                    <td>Todos</td>
                    @else
                    <td>{{ $message->user->name }}</td>
                    @endif
                    <td>{{ $message->sender->name }}</td>
                    <td>{{ $message->date }}</td>
                    <td class="options">
                        <a href="{{ route('messages.edit', $message->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <form method="post" action="{{ route('messages.destroy', $message->id) }}" class="form-delete">
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
