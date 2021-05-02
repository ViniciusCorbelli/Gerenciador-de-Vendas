@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar Cliente ' . $client->name)
        @slot('url', route('clients.update', $client->id))
        @slot('form')
            @include('admin.clients.form')
        @endslot
    @endcomponent
@endsection