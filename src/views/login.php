<?php
require_once __DIR__ . '/layout/main.php';
?>

<div class="relative w-full h-screen overflow-hidden">
  <!-- Vídeo de fundo -->
  <video autoplay muted loop playsinline
    class="absolute top-0 left-0 w-full h-full object-cover z-0">
    <source src="/resources/img/brazil6.mp4" type="video/mp4">
    Seu navegador não suporta vídeos.
  </video>

    <div class="flex sm:justify-end justify-center h-dvh items-center px-4 ">
        <div class="login basis6/12 max-w-md flex max-w-lg flex-wrap justify-center">
            <h1 class="basis-full text-4xl font-bold text-center mb-6">ContrADengue ⛔️🦟</h1>
            <form action="/plataforma" method="POST" class="basis-full space-y-4 flex flex-col justify-center">
                <!-- <label class="block text-xl mb-1" for="email">Email</label>
                <input class="input rounded text-xl px-4 min-h-10 placeholder:text-center bg-blue-100/10" type="email" id="email" name="email" placeholder="exemplo@dominio.com" value="email@teste.com" required />

                <label class="block text-xl mb-1" for="password">Senha</label>
                <input class="input rounded text-xl px-4 min-h-10 placeholder:text-center bg-blue-100/10" type="password" id="password" name="password" placeholder="********" value="********" required />
                 -->
                <div class="relative z-0">
                    <input type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-300 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="agente@contradengue.com" required />
                    <label for="floating_standard" class="absolute text-xl duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email</label>
                </div>

                <div class="relative z-0">
                    <input type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-xl bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-300 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="********" required />
                    <label for="floating_standard" class="absolute text-xl duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto" >Senha</label>
                </div>

                <button type="submit" class="mt-10 text-2xl btn-primary w-full transition duration-150">Entrar</button>
            </form>
            <div class="self-end">
                <footer class="text-blue-100 font-bold text-center py-6 text-sm">
                    Projeto Integrador V – SENAC – 2025 | Desenvolvido por Allan, Juliano, Livia, Marina e Paulo
                </footer>
            </div>
        </div>
    </div>
</div>