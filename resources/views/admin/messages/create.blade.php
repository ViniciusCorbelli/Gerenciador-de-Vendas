@extends('admin.layouts.app')

@section('content')
    @component('admin.components.create')
        @slot('title', 'Criar Mensagem')
        @slot('url', route('messages.store'))
        @slot('form')
            @include('admin.messages.form')
        @endslot
    @endcomponent
@endsection