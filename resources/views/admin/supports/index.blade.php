<h1>Listagem dos Supports</h1>

<a href="{{ route('supports.create')}}">Criar dúvida</a>

<br><br>

<table border="1">
    <thead>
        <th>#Id</th>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th>Ação</th>
    </thead>
    <tbody>
        @foreach ($supports->items() as $support)
            <tr>
                <td>{{ $support->id }}</td>
                <td>{{ $support->subject }}</td>
                <td>{{ getStatusSupport($support->status) }}</td>
                <td>{{ $support->body }}</td>
                <td>
                    <a href="{{ route('supports.show', $support->id ) }}">Detalhe</a> |
                    <a href="{{ route('supports.edit', $support->id ) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<x-pagination
    :paginator="$supports"
    :appends="$filters" />
