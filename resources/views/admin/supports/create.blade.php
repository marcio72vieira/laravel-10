<h1>Nova Dúvida</h1>

<x-alert/>

<form action="{{ route('supports.store') }}" method="POST">
    {{-- <input type="text" value="{{ csrf_token() }}" name="__token"> --}}
    @include('admin.supports.partials.form')
</form>
