<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard do Paciente | NutriFlow</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-14px); }
        }

        @keyframes pulse-glow {
            0%, 100% { opacity: .35; transform: scale(1); }
            50% { opacity: .75; transform: scale(1.08); }
        }

        @keyframes slide-up {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-float { animation: float 5s ease-in-out infinite; }
        .animate-glow { animation: pulse-glow 4s ease-in-out infinite; }
        .animate-slide-up { animation: slide-up .7s ease-out both; }

        .glass {
            background: rgba(15, 23, 42, .72);
            backdrop-filter: blur(18px);
            border: 1px solid rgba(148, 163, 184, .18);
        }
    </style>
</head>

<body class="min-h-screen bg-[#020617] text-white overflow-x-hidden">

    <!-- Background decorativo -->
    <div class="fixed inset-0 -z-10">
        <div class="absolute top-[-120px] left-[-120px] w-96 h-96 bg-emerald-500/30 rounded-full blur-3xl animate-glow"></div>
        <div class="absolute top-40 right-[-120px] w-96 h-96 bg-cyan-500/20 rounded-full blur-3xl animate-glow"></div>
        <div class="absolute bottom-[-140px] left-1/3 w-96 h-96 bg-teal-500/20 rounded-full blur-3xl animate-glow"></div>
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(16,185,129,.12),transparent_35%),linear-gradient(to_bottom,rgba(2,6,23,.2),#020617)]"></div>
    </div>

    <main class="max-w-7xl mx-auto px-6 py-8">

        <!-- Top bar -->
        <nav class="flex items-center justify-between mb-8 animate-slide-up">
            <div>
                <p class="text-emerald-400 text-sm font-semibold tracking-widest uppercase">NutriFlow</p>
                <h1 class="text-xl font-bold text-slate-100">Portal do Paciente</h1>
            </div>

            <div class="hidden md:flex items-center gap-3 glass rounded-2xl px-4 py-3">
                <span class="w-3 h-3 rounded-full bg-emerald-400 shadow-[0_0_18px_rgba(52,211,153,.9)]"></span>
                <span class="text-sm text-slate-300">Acompanhamento ativo</span>
            </div>
        </nav>

        <!-- Hero -->
        <section class="relative glass rounded-[2rem] p-8 md:p-10 mb-8 overflow-hidden animate-slide-up">
            <div class="absolute right-8 top-8 w-28 h-28 rounded-full bg-emerald-400/20 blur-2xl animate-float"></div>

            <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
                <div>
                    <span class="inline-flex items-center rounded-full bg-emerald-400/10 px-4 py-2 text-sm font-medium text-emerald-300 border border-emerald-400/20 mb-5">
                        🌱 Jornada nutricional inteligente
                    </span>

                    <h2 class="text-4xl md:text-5xl font-black leading-tight">
                        Olá, {{ $paciente->name ?? $paciente->nome }} 👋
                    </h2>

                    <p class="mt-5 text-slate-300 text-lg max-w-xl">
                        Acompanhe seus planos, evolução, treinos e orientações em uma experiência digital criada para apoiar sua transformação.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-3 mt-7">
                        <a href="#planos"
                           class="rounded-2xl bg-emerald-500 px-6 py-4 font-bold text-slate-950 hover:bg-emerald-400 transition shadow-[0_0_30px_rgba(16,185,129,.35)]">
                            Ver plano alimentar
                        </a>

                        <a href="#evolucao"
                           class="rounded-2xl border border-slate-700 px-6 py-4 font-bold text-slate-200 hover:bg-white/5 transition">
                            Ver evolução
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="glass rounded-3xl p-6 animate-float">
                        <p class="text-sm text-slate-400 mb-4">Resumo da sua jornada</p>

                        <div class="space-y-4">
                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-slate-300">Plano alimentar</span>
                                    <span class="text-emerald-300">72%</span>
                                </div>
                                <div class="h-3 bg-slate-800 rounded-full overflow-hidden">
                                    <div class="h-full w-[72%] bg-gradient-to-r from-emerald-400 to-teal-300 rounded-full"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-slate-300">Rotina de treino</span>
                                    <span class="text-cyan-300">58%</span>
                                </div>
                                <div class="h-3 bg-slate-800 rounded-full overflow-hidden">
                                    <div class="h-full w-[58%] bg-gradient-to-r from-cyan-400 to-blue-300 rounded-full"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex justify-between text-sm mb-2">
                                    <span class="text-slate-300">Evolução corporal</span>
                                    <span class="text-teal-300">Em análise</span>
                                </div>
                                <div class="h-3 bg-slate-800 rounded-full overflow-hidden">
                                    <div class="h-full w-[42%] bg-gradient-to-r from-teal-400 to-emerald-300 rounded-full"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cards resumo -->
        <section id="evolucao" class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
            <div class="glass rounded-3xl p-6 hover:-translate-y-1 transition animate-slide-up">
                <p class="text-sm text-slate-400">Planos disponíveis</p>
                <h3 class="text-4xl font-black mt-3 text-emerald-300">{{ $planos->count() }}</h3>
                <p class="text-xs text-slate-500 mt-3">Liberados pelo nutricionista</p>
            </div>

            <div class="glass rounded-3xl p-6 hover:-translate-y-1 transition animate-slide-up">
                <p class="text-sm text-slate-400">Mensurações</p>
                <h3 class="text-4xl font-black mt-3 text-cyan-300">{{ $mensuracoes->count() ?? 0 }}</h3>
                <p class="text-xs text-slate-500 mt-3">Registros de evolução</p>
            </div>

            <div class="glass rounded-3xl p-6 hover:-translate-y-1 transition animate-slide-up">
                <p class="text-sm text-slate-400">Treinos</p>
                <h3 class="text-4xl font-black mt-3 text-teal-300">{{ $treinos->count() ?? 0 }}</h3>
                <p class="text-xs text-slate-500 mt-3">Atividades vinculadas</p>
            </div>

            <div class="glass rounded-3xl p-6 hover:-translate-y-1 transition animate-slide-up">
                <p class="text-sm text-slate-400">Status</p>
                <h3 class="text-xl font-black mt-4 text-emerald-300">Em acompanhamento</h3>
                <p class="text-xs text-slate-500 mt-3">Jornada ativa</p>
            </div>
        </section>

        <!-- Conteúdo principal -->
        <section class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Planos -->
            <div id="planos" class="lg:col-span-2">
                <div class="flex items-center justify-between mb-5">
                    <div>
                        <h2 class="text-2xl font-black">Planos Alimentares</h2>
                        <p class="text-slate-400 text-sm">Planos liberados para sua rotina.</p>
                    </div>
                </div>

                @forelse($planos as $plano)
                    <article class="group glass rounded-3xl p-6 mb-5 hover:border-emerald-400/40 hover:-translate-y-1 transition duration-300">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">
                            <div>
                                <span class="inline-flex rounded-full bg-emerald-400/10 px-3 py-1 text-xs font-bold text-emerald-300 border border-emerald-400/20 mb-4">
                                    Plano alimentar
                                </span>

                                <h3 class="text-2xl font-black group-hover:text-emerald-300 transition">
                                    {{ $plano->titulo ?? $plano->objetivo ?? 'Plano sem título' }}
                                </h3>

                                <p class="text-sm text-slate-400 mt-2">
                                    Criado em {{ $plano->created_at->format('d/m/Y') }}
                                </p>
                            </div>

                            <a href="{{ url('paciente/plano-alimentar/'.$plano->id) }}"
                               class="inline-flex justify-center items-center rounded-2xl bg-emerald-500 px-6 py-4 text-slate-950 font-black hover:bg-emerald-400 transition">
                                Ver detalhes →
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="glass rounded-3xl border-dashed p-10 text-center">
                        <div class="text-5xl mb-4">🥗</div>
                        <h3 class="text-xl font-black">Nenhum plano disponível</h3>
                        <p class="text-slate-400 mt-2">
                            Assim que seu nutricionista liberar um plano alimentar, ele aparecerá aqui.
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Lateral -->
            <aside class="space-y-6">
                <div class="glass rounded-3xl p-6">
                    <h3 class="text-xl font-black mb-4">Próximo passo</h3>
                    <p class="text-slate-300">
                        Mantenha sua rotina alimentar e acompanhe novas orientações do nutricionista.
                    </p>

                    <div class="mt-5 rounded-2xl bg-emerald-400/10 border border-emerald-400/20 p-4">
                        <p class="text-sm text-emerald-300 font-bold">Em breve</p>
                        <p class="text-sm text-slate-400 mt-1">
                            Chat inteligente para dúvidas, lembretes e acompanhamento.
                        </p>
                    </div>
                </div>

                <div class="glass rounded-3xl p-6">
                    <h3 class="text-xl font-black mb-4">Assistente NutriFlow</h3>

                    <div class="space-y-3">
                        <div class="bg-slate-900/80 rounded-2xl p-4 text-sm text-slate-300">
                            Olá! Em breve vou te ajudar com dúvidas sobre seu plano alimentar.
                        </div>

                        <button class="w-full rounded-2xl bg-white/5 border border-slate-700 py-3 text-slate-300 cursor-not-allowed">
                            Bot em construção
                        </button>
                    </div>
                </div>
            </aside>

        </section>
    </main>

</body>
</html>