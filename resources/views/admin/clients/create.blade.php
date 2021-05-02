@extends('admin.layouts.app')

@section('content')
    @component('admin.components.create')
        @slot('title', 'Criar Cliente')
        @slot('url', route('clients.store'))
        @slot('form')
            @include('admin.clients.form')
        @endslot
    @endcomponent
@endsection