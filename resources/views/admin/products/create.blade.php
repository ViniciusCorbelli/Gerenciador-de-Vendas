@extends('admin.layouts.app')

@section('content')
    @component('admin.components.create')
        @slot('title', 'Criar Produto')
        @slot('url', route('products.store'))
        @slot('form')
            @include('admin.products.form')
        @endslot
    @endcomponent
@endsection