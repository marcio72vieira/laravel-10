<h1>Listagem dos Supports</h1>

<a href="{{ route('supports.create')}}">Criar dúvida</a>

<br><br>

<table border="1">
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descrição</th>
        <th>Ação</th>
    </thead>
    <tbody>
        @foreach ($supports as $support)
            <tr>
                <td>{{ $support->subject }}</td>
                <td>{{ $support->status }}</td>
                <td>{{ $support->body }}</td>
                <td> <a href="{{ route('supports.show', $support->id ) }}">Detalhe</a> | <a href="{{ route('supports.edit', $support->id ) }}">Editar</a> | <a href="{{ route('supports.edit', $support->id ) }}">Editar</a></td>
            </tr>
        @endforeach
    </tbody>
</table>