@extends('admin.layouts.app')

@section('content')
    @component('admin.components.edit')
        @slot('title', 'Editar Venda ' . $sell->name)
        @slot('url', route('sells.update', $sell->id))
        @slot('form')
            @include('admin.sells.form')
        @endslot
    @endcomponent
@endsection