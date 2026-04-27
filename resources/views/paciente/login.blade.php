<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login do Paciente | NutriFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-100 flex items-center justify-center px-6">
    <div class="w-full max-w-md bg-white rounded-3xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-slate-800">Portal do Paciente</h1>
        <p class="text-slate-500 mt-2 mb-6">
            Acesse seus planos alimentares e acompanhamento nutricional.
        </p>

        @if ($errors->any())
            <div class="bg-red-50 text-red-600 p-3 rounded-xl mb-4 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('paciente.login.submit') }}">
            @csrf

            <label class="block text-sm font-medium text-slate-700 mb-2">
                E-mail do paciente
            </label>

            <input 
                type="email" 
                name="email"
                required
                class="w-full rounded-xl border-slate-300 mb-5 focus:border-emerald-500 focus:ring-emerald-500"
                placeholder="paciente@email.com"
            >

            <button 
                type="submit"
                class="w-full bg-emerald-600 text-white font-semibold py-3 rounded-xl hover:bg-emerald-700 transition"
            >
                Entrar no portal
            </button>
        </form>
    </div>
</body>
</html>