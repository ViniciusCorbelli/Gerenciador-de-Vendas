@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar Mensagem')
        @slot('url', route('messages.update', $message->id))
        @slot('form')
            @include('admin.messages.form')
        @endslot
    @endcomponent
@endsection