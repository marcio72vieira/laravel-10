{{--
<h1>Detalhe da dúvida: {{ $support->id }}</h1>

<ul>
    <li>Assunto: {{ $support->subject }}</li>
    <li>Status: {{ getStatusSupport($support->status) }}</li>
    <li>Descrição: {{ $support->body }}</li>
</ul>


<form action="{{ route('supports.destroy', $support->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>
--}}

@extends('admin.layouts.app')

@section('title', "Detalhes da Dúvida: {$support->subject}")

@section('header')
    <h1 class="text-lg text-black-500">Dúvida: {{ $support->subject }}</h1>
@endsection

@section('content')
    <ul>
        <li>Assunto: {{ $support->subject }}</li>
        <li>Status: {{ getStatusSupport($support->status) }}</li>
        <li>Descrição: {{ $support->body }}</li>
    </ul>

    <form action="{{ route('supports.destroy', $support->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Deletar</button>
        <a href="{{ route('supports.index') }}" type="button" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Cancelar</a>
    </form>

@endsection
