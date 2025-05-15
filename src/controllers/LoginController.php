<?php 
namespace App\Controllers;

class LoginController {
    public function showLogin() {
        // Renderizar a view de login
        require_once __DIR__ . '/../views/login.php';
    }

    public function login() {
        // Lógica de autenticação
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Aqui você deve verificar as credenciais do usuário
            // Exemplo: $user = User::where('username', $username)->first();

            if ($user && password_verify($password, $user->password)) {
                // Autenticação bem-sucedida
                session_start();
                $_SESSION['user'] = $user;
                header('Location: /dashboard');
                exit;
            } else {
                // Credenciais inválidas
                $error = 'Usuário ou senha inválidos.';
                require_once __DIR__ . '/../views/login.php';
            }
        }
    }
}