<h1>Listagem de suportes</h1>

<a href="{{ route('suportes.create') }}">Criar Dúvida</a>

<table>
    <thead>
        <th>Assunto</th>
        <th>Status</th>
        <th>Descricao</th>
        <td></td>
    </thead>
    <tbody>
        @foreach ($suportes as $suporte)
            <tr>
                <td>{{ $suporte->subject }}</td>
                <td>{{  $suporte->status }}</td>
                <td>{{ $suporte->body }}</td>
                <td>
                    <a href="{{ route('suportes.show', $suporte->id) }}">ir</a>
                    <a href="{{ route('suportes.edit', $suporte->id) }}">editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>