<?php
require_once __DIR__ . '/layout/main.php';

?>

<div id="modes-controler-full"></div>
<body class="h-dvh">
    <header class="animated-background bg-linear-45 from-blue-500 to-fuchsia-500 text-white py-4 mb-8">
        <div class="container mx-auto p-2">
            <h1 class="text-3xl font-bold">ContrADengue Plataforma de Controle de Endemias ⛔️🦟</h1>
            <p class="text-lg">A solução digital para o controle de Endemias no Brasil</p>
        </div>
    </header>
    
    <!-- Módulos -->
    <section id="modes" class="z-10 will-change-transform will-change-opacity transition-all duration-3000 ease-in-out py-60">
        <div class="max-w-6xl mx-auto bg-surface p-6 rounded-xl">
            <h2 class="text-3xl font-bold text-center mb-10">🧱 Módulos da Plataforma</h2>
            <div id="modes-container" class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div id="mod-citzen-button"
                    class="cursor-pointer p-6 rounded-xl shadow hover:bg-white/5 hover:shadow-lg hover:ring-2 hover:ring-blue-400/50 transition duration-300 activated">
                    <h3 class="text-2xl font-semibold mb-2">🧍 Cidadão</h3>
                    <ul class="text-lg list-disc list-inside">
                        <li>Notificação de focos</li>
                        <li>Envio de fotos com localização</li>
                        <li>Agendamento de teleconsultas</li>
                    </ul>
                </div>
                <div id="mod-acs-button"
                    class="grayscale cursor-not-allowed p-6 rounded-xl shadow hover:bg-black/15 hover:shadow-lg hover:ring-2 hover:ring-blue-400/50 transition duration-300">
                    <h3 class="text-2xl font-semibold mb-2">🧑‍⚕️ ACS</h3>
                    <ul class="text-lg muted list-disc list-inside">
                        <li>Roteiros otimizados</li>
                        <li>Digitalização dos atendimentos</li>
                        <li>Capacitação online</li>
                    </ul>
                </div>
                <div id="mod-ace-button"
                    class="cursor-pointer p-6 rounded-xl shadow hover:bg-white/5 hover:shadow-lg hover:ring-2 hover:ring-blue-400/50 transition duration-300">
                    <h3 class="text-2xl font-semibold mb-2">🦺 ACE</h3>
                    <ul class="text-lg list-disc list-inside">
                        <li>Inspeção digital</li>
                        <li>Registro de ações</li>
                        <li>Otimização por IA</li>
                    </ul>
                </div>
                <div id="mod-manager-button"
                    class="cursor-pointer p-6 rounded-xl shadow hover:bg-white/5 hover:shadow-lg hover:ring-2 hover:ring-blue-400/50 transition duration-300">
                    <h3 class="text-2xl font-semibold mb-2">🧑‍💼 Gestor</h3>
                    <ul class="text-lg list-disc list-inside">
                        <li>Painéis interativos</li>
                        <li>Mapas de calor</li>
                        <li>Relatórios em tempo real</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div id="modes-controler" class="pt-96"></div>

    <!-- Módulo ACE -->
    <section id="mod-ace" class="" hidden>
        <div class="max-w-5xl mx-auto py-16 px-4">
            <h2 class="text-3xl font-bold mb-6 text-secondary text-center">🦺 ACE</h2>
            <p class="text-lg muted mb-6 text-center">Inspeção digital, registro de ações e otimização por IA</p>
        </div>

        <!-- perfil do agente ACE -->
        <div class="flex flex-row p-4 gap-2 justify-center sm:justify-start sm:ml-20">
            <div class="flex flex-row items-center justify-center bg-surface rounded-xl shadow-md max-w-md">
                <div class="flex flex-wrap items-center justify-center mt-8">
                    <img src="/../resources/img/ace.jpg" alt="Agente de Combate a Endemias"
                        class=" rounded-full object-top-right w-32 h-32 mx-auto ring-2 ringsky-500/50">
                    <h2 class="basis-full text-3xl font-bold mb-6 text-secondary text-center">Silvio Silva</h2>
                </div>
                <div class="">
                    <p class="basis-full text-lg"><span class="flex w-3 h-3 me-3 bg-red-200 rounded-full"></span>Agente de Combate a Endemias</p>
                    <p class="basis-full text-lg">Unidade de Saúde: Centro de Saúde São Paulo</p>
                </div>
  
            </div>
        </div>

        <div class="flex flex-wrap justify-center-safe gap-8 p-2">
            <!-- boilerplate para as ocorrências -->
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <!-- boilerplate para as ocorrências -->
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>
            <div class="flex flex-col justify-center gap-4 bg-surface rounded-xl shadow-md">
                <div class="flex flex-row">
                    <h3 class="text-center bg-blue-500 grow rounded-tl-xl text-2xl p-2">Foco de Dengue</h3>
                    <button
                        class="grow py-2 max-w-10 text-1xl font-bold text-rose-900 rounded-tr-xl bg-rose-500 hover:text-rose-300 hover:ring-4 hover:ring-rose-200/20 hover:bg-rose-600 transition duration-200 active:bg-rose-700 active:text-rose-100">X
                    </button>
                </div>
                <div class="px-4 py-2">
                    <p>Status: some</p>
                    <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                    <p>Data: 2023-10-01</p>
                </div>
                <div class="flex flex-row justify-between">
                    <button
                        class="grow py-2 text-1xl font-bold text-blue-900 rounded-bl-xl bg-blue-500 hover:text-blue-300 hover:ring-4 hover:ring-blue-200/20 hover:bg-blue-600 transition duration-200 active:bg-blue-700 active:text-blue-100">Adicionar
                    </button>
                    <button
                        class="grow py-2 text-1xl font-bold text-yellow-900 bg-yellow-500 hover:text-yellow-300 hover:ring-4 hover:ring-yellow-200/20 hover:bg-yellow-600 transition duration-200 active:bg-yellow-700 active:text-yellow-100">Pausar</button>
                    <button
                        class="grow py-2 text-1xl font-bold text-lime-900 rounded-br-xl bg-lime-500 hover:text-lime-300 hover:ring-4 hover:ring-lime-200/20 hover:bg-lime-600 transition duration-200 active:bg-lime-700 active:text-lime-100">Concluir</button>
                </div>
            </div>

        </div>
    </section>

    <!-- Módulo Gestor -->
    <section id="mod-manager" class="" hidden>
        
        <div class="text-center my-8">
            <h3 class="text-4xl font-bold text-primary">Area do Gestor</h3>
            <p class="text-lg muted mb-6 text-center">Visualize os focos de dengue em tempo real</p>
        </div>
        
        <h2 class="text-3xl font-bold mb-6 text-secondary text-center">🗺️ Mapa de Calor</h2>
    </section>

    <!-- Leaflet -->
    <section id="mod-manager-map" class="h-96 w-full max-w-5xl mx-auto my-8 rounded-xl shadow-md">
    </section>

    <!-- ocorrencias -->
    <section id="mod-citzen" id="fact-list" class="max-w-5xl mx-auto py-16 px-4 gap-y-8">

        <div class="text-center mb-8">
            <h3 class="text-4xl font-bold text-primary">Bem-vindo, Cidadão!</h3>
            <p class="text-lg text-muted">Ajude no combate à dengue registrando ocorrências abaixo.</p>
        </div>
    
        <h2 class="text-3xl font-bold my-6 text-secondary text-center">📝 Ocorrências</h2>

        <!-- Botão para abrir o modal -->
        <button
            class="bg-blue-600 text-white text-2xl p-3 mb-6 rounded-tl-md rounded-br-md hover:bg-blue-700 hover:ring-4 hover:ring-blue-100/10 transition"
            onclick="document.getElementById('mod-citzen-fact-form').classList.remove('hidden')">
            📝 iniciar Ocorrência
        </button>

        <!-- boilerplate para as ocorrências -->
        <!-- <div class="bg-surface p-8 rounded-xl shadow-md flex flex-wrap gap-4">
            <div class="basis-7/12 flex flex-col gap-4 justify-between">
                <div class="basis-full flex flex-row gap-10 content-baseline items-baseline">
                    <h3 class="text-2xl">Ocorrencia #1</h3>
                    <h4 class="text-xl">Foco de Dengue</h4>
                </div>

                <div class="basis-7/12 flex flex-col gap-4 justify-between">
                    <div>
                        <p>Descrição: Foco de dengue encontrado na casa do João</p>
                    </div>

                    <div>
                        <p>Geolocalização: Latitude: -22.585, Longitude: -47.49</p>
                        <p>Data: 2023-10-01</p>
                    </div>
                </div>
            </div>

            <div class="basis-4/12 content-center">
                <img class="rounded-xl" src="../resources/img/focos_dengue/foco_dengue_1.webp" alt="Foco de Dengue 1">
            </div>
        </div> -->
    </section>

    <!-- cidadao formulário de ocorrencias -->
    <!-- <section id="mod-citzen-fact-form" class="relative max-w-2xl mx-auto py-16 px-4 z-10"> -->
    <section id="mod-citzen-fact-form"
        class="fixed inset-0 bg-black/40 backdrop-blur-sm flex flex-wrap items-center justify-center hidden z-50">
        <form method="POST" class="flex justify-center sm:basis-4/12 bg-surface rounded-xl shadow-md">
            <fieldset class="flex flex-col gap-4 my-10">
                <legend class="text-lg font-semibold mb-2 ">Registrar Ocorrência</legend>

                <select name="fact.option" class="p-3 bg-surface rounded-md border-none outline-none ring-2 ring-blue-200/40 focus:ring-blue-200/60 shadow-sm">
                    <option value="foco_de_dengue">Foco de Dengue</option>
                    <option value="sintomas">Sintomas</option>
                    <option value="outros">Outra Ocorrência</option>
                </select>

                <input type="file" accept="image/png" name="fact.picture"
                    class="grayscale file:text-gray-500 p-3 rounded-md border-none outline-none ring-2 ring-blue-200/40 shadow-sm" disabled />

                <textarea type="text" name="fact.description" rows="4" placeholder="Digite a ocorrência" 
                    class="placeholder:text-gray-500 placeholder:italic p-3 bg-surface rounded-md border-none outline-none ring-2 ring-blue-200/40 focus:ring-blue-200/60 shadow-sm" /></textarea>

                <label id="geo_randomness_label" for="geo_randomness" class="bg-blue-600 cursor-pointer p-3 rounded-md border border-blue-300/40 shadow-sm max-w-52
                        hover:bg-blue-700 transition
                      ">
                    <input type="checkbox" name="fact.geo_randomness" id="geo_randomness" class="hidden peer" checked/>
                    Geolocalização aleatória
                </label>

                <!-- Se o checkbox estiver marcado, os campos de latitude e longitude serão habilitados -->
                <fieldset id="geoInputFields"
                    class="hidden bg-surfaceTone p-8 my-4 rounded-xl shadow-md flex flex-col sm:flex-row gap-4">
                    <legend class="text-md font-semibold mb-2 ">Geolocalização</legend>
                    <input type="text" name="fact.latitude" placeholder="Latitude"
                        class="p-3 bg-surface rounded-md border border-none outline-none ring-2 ring-blue-200/40 shadow-sm" />
                    <input type="text" name="fact.longitude" placeholder="Longitude"
                        class="p-3 bg-surface rounded-md border border-none outline-none ring-2 ring-blue-200/40 shadow-sm" />
                </fieldset>
                <div class="flex flex-row">
                    <button id="mod-citzen-addfact"  type="submit"
                        class="basis-8/12 bg-blue-600 text-white p-3 mb-6 rounded-l-md hover:bg-blue-700 transition">
                        Registrar
                    </button>
                    <button class="basis-4/12 bg-red-600 text-white p-3 mb-6 rounded-r-md"
                        onclick="document.getElementById('mod-citzen-fact-form').classList.add('hidden')">
                        Fechar
                    </button>
                </div>

            </fieldset>
        </form>
    </section>

    <section id="accept-fact-delete">
        <div class="fixed inset-0 bg-black bg-opacity-50 flex flex-wrap items-center hidden justify-center z-50">
            <form method="POST" class="flex justify-center sm:basis-4/12 bg-surface p-8 rounded-xl shadow-md">
                <fieldset class="flex flex-col gap-4">
                    <legend class="text-lg font-semibold mb-2 ">Excluir Ocorrência</legend>

                    <p>Você tem certeza que deseja excluir esta ocorrência?</p>

                    <div class="flex flex-row">
                        <button id="mod-citzen-deletefact" type="submit"
                            class="basis-8/12 bg-blue-600 text-white p-3 mb-6 rounded-l-md hover:bg-blue-700 transition">
                            Excluir
                        </button>
                        <button class="basis-4/12 bg-red-600 text-white p-3 mb-6 rounded-r-md"
                            onclick="document.getElementById('accept-fact-delete').classList.add('hidden')">
                            Fechar
                        </button>
                    </div>

                </fieldset>
            </form>
        </div>
    </section>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="/../resources/js/cGxhdGFmb3JtYQ==.js"></script>

    <?php
    require_once __DIR__ . '/layout/footer.php';
    ?>