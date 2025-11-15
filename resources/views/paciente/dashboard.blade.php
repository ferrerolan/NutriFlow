<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard do Paciente</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.23/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">
    <h1 class="text-2xl font-bold mb-4">Bem-vindo, {{ $paciente->name ?? $paciente->nome }}</h1>

    <h2 class="text-xl mb-2">Seus Planos Alimentares</h2>

    @forelse($planos as $plano)
        <div class="bg-white rounded-lg shadow p-4 mb-4">
            <h3 class="font-semibold text-lg">{{ $plano->titulo ?? 'Plano sem título' }}</h3>
            <p><strong>Criado em:</strong> {{ $plano->created_at->format('d/m/Y') }}</p>
            <a href="{{ url('paciente/plano-alimentar/'.$plano->id) }}" class="text-blue-600 hover:underline">Ver detalhes</a>
        </div>
    @empty
        <p>Nenhum plano alimentar disponível no momento.</p>
    @endforelse
</body>
</html>
