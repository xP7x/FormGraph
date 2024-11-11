<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormGraph</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <h1>Formulários</h1>
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @foreach($forms as $form)
        <form action="/forms" method="POST">
            @csrf
            <input type="hidden" name="form_id" value="{{ $form->id }}">
            <label>{{ $form->question }}</label>
            <input type="text" name="response" required>
            <button type="submit">Enviar</button>
        </form>
    @endforeach
</body>
</html>