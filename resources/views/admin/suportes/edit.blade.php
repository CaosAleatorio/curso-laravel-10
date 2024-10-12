<h1>Dúvida {{ $suporte->id }}</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)	
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('suportes.update', $suporte->id) }}" method="post">
    @csrf()
    @method('put')
    <input type="text" name="subject" placeholder="Assunto" value="{{ $suporte->subject }}">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ $suporte->body }}</textarea>
    <button type="submit">Enviar</button>
</form>