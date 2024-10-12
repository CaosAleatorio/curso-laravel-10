<h1>Nova Duvida</h1>

@if ($errors->any())
    @foreach ($errors->all() as $error)	
        {{ $error }}
    @endforeach
@endif

<form action="{{ route('suportes.store') }}" method="post">
    @csrf()
    <input type="text" name="subject" placeholder="Assunto" value="{{ old('subject') }}">
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>