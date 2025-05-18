<?php
require_once __DIR__ . '/layout/main.php';
?>

  <!-- Hero -->
  <section class="text-center py-20 px-4">
    <h1 class="text-4xl md:text-5xl font-bold text-primary">🦟 Plataforma contrAdengue</h1>
    <p class="muted mt-4 max-w-2xl mx-auto text-lg">
      Uma solução SaaS voltada para órgãos públicos de saúde, análise de dados e conectividade móvel para combater a dengue no Brasil.
    </p>
    <a href="https://github.com/allanvilas/contrAdengue" target="_blank">
        <button class="btn-primary mt-6"><i class="bi bi-github text-2xl"></i> Visitar Github</button>
    </a>
    <a href="/login">
        <button class="btn-primary mt-6"><i class="bi bi-braces text-2xl"></i> Acessar Plataforma</button>
    </a>
  </section>

  <!-- Sobre -->
  <section class="max-w-5xl mx-auto py-16 px-4 grid md:grid-cols-2 gap-10 items-center">
    <div>
      <h2 class="text-3xl font-bold mb-4 text-accent">Sobre o Projeto</h2>
      <p class="muted leading-relaxed">
        A contrAdengue é uma plataforma tecnológica desenvolvida como Software como Serviço (SaaS) para otimizar a prevenção e o combate à dengue. A proposta é empoderar o cidadão, apoiar agentes de saúde e fornecer inteligência em tempo real aos gestores públicos.
      </p>
    </div>
    <div class="bg-gray-700 aspect-video rounded-lg">
        <img src="/resources/img/dengue_landing.png" alt="dengue pousando na pele de uma pessoa" class="w-full h-full rounded-lg">
    </div> <!-- Espaço para imagem -->
  </section>

  <section class="flex justify-center items-center">
    <div class="basis-6/12">
      <video controls>
        <source src="/resources/docs/video/project.mp4" type="video/mp4">
      </video>
    </div>
  </section>

  <!-- Módulos -->
  <section class="bg-surface py-16 px-4">
    <div class="max-w-6xl mx-auto">
      <h2 class="text-3xl font-bold text-center mb-10">🧱 Módulos da Plataforma</h2>
      <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="card">
          <h3 class="text-xl font-semibold mb-2">🧍 Cidadão</h3>
          <ul class="text-sm muted list-disc list-inside">
            <li>Notificação de focos</li>
            <li>Envio de fotos com localização</li>
            <li>Agendamento de teleconsultas</li>
          </ul>
        </div>
        <div class="card">
          <h3 class="text-xl font-semibold mb-2">🧑‍⚕️ ACS</h3>
          <ul class="text-sm muted list-disc list-inside">
            <li>Roteiros otimizados</li>
            <li>Digitalização dos atendimentos</li>
            <li>Capacitação online</li>
          </ul>
        </div>
        <div class="card">
          <h3 class="text-xl font-semibold mb-2">🦺 ACE</h3>
          <ul class="text-sm muted list-disc list-inside">
            <li>Inspeção digital</li>
            <li>Registro de ações</li>
            <li>Otimização por IA</li>
          </ul>
        </div>
        <div class="card">
          <h3 class="text-xl font-semibold mb-2">🧑‍💼 Gestor</h3>
          <ul class="text-sm muted list-disc list-inside">
            <li>Painéis interativos</li>
            <li>Mapas de calor</li>
            <li>Relatórios em tempo real</li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Diferenciais -->
  <section class="max-w-5xl mx-auto py-16 px-4">
    <h2 class="text-3xl font-bold mb-6 text-secondary text-center">🧠 Diferenciais</h2>
    <ul class="muted list-disc list-inside space-y-2 text-center md:text-left">
      <li>Previsão de surtos com inteligência artificial</li>
      <li>Funcionalidade offline para agentes</li>
      <li>Gamificação e acessibilidade no app</li>
      <li>Integração entre cidadãos, ACS, ACE e gestores</li>
      <li>Multi-plataforma: acesso por navegador no desktop e mobile</li>
    </ul>
  </section>
</body>

<?php
require_once __DIR__ . '/layout/footer.php';
?>