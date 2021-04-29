@extends('admin.layouts.app')

@section('content')
    @component('admin.components.create')
        @slot('title', 'Criar Venda')
        @slot('url', route('sells.store'))
        @slot('form')
            @include('admin.sells.form')
        @endslot
    @endcomponent
@endsection