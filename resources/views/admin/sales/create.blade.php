@extends('admin.layouts.app')

@section('content')
    @component('admin.components.create')
        @slot('title', 'Criar Venda')
        @slot('url', route('sales.store'))
        @slot('form')
            @include('admin.sales.form')
        @endslot
    @endcomponent
@endsection