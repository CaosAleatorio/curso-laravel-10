<h1>Detalhes da Dúvida {{ $suporte->subject }}</h1>

<ul>
    <li>Assunto: {{ $suporte->subject }}</li>
    <li>Status: {{ $suporte->status }}</li>
    <li>Descricão: {{ $suporte->body }}</li>
</ul>

<form action="{{ route('suportes.destroy', $suporte->id) }}" method="post">
    @csrf()
    @method('DELETE')
    <button type="submit">Deletar</button>
</form>