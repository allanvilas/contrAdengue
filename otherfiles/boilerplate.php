<?php
// Estrutura base para plataforma web modular com PHP 8.2 + SQLite + Tailwind
// Diretórios simulados como arquivos únicos para fins de apresentação

///////////////////////////////
// public/index.php
///////////////////////////////

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Auth.php';
require_once __DIR__ . '/../core/Middleware.php';

session_start();

$router = new Router();
$router->get('/', 'LandingController@index');
$router->get('/login', 'AuthController@showLogin');
$router->post('/login', 'AuthController@login');
$router->get('/logout', 'AuthController@logout');
$router->get('/admin/users', 'AdminController@manageUsers', ['auth', 'role:admin']);
$router->dispatch();

///////////////////////////////
// core/Router.php
///////////////////////////////
class Router {
    private $routes = ['GET' => [], 'POST' => []];

    public function get($path, $action, $middleware = []) {
        $this->routes['GET'][$path] = [$action, $middleware];
    }

    public function post($path, $action, $middleware = []) {
        $this->routes['POST'][$path] = [$action, $middleware];
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $route = $this->routes[$method][$path] ?? null;

        if (!$route) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        list($action, $middlewareList) = $route;

        foreach ($middlewareList as $mw) {
            if ($mw === 'auth') requireAuth();
            if (str_starts_with($mw, 'role:')) {
                $role = explode(':', $mw)[1];
                requireRole($role);
            }
        }

        list($controller, $method) = explode('@', $action);
        require_once __DIR__ . '/../app/Controllers/' . $controller . '.php';
        $instance = new $controller();
        $instance->$method();
    }
}

///////////////////////////////
// core/Auth.php
///////////////////////////////
class Auth {
    public static function check() {
        return isset($_SESSION['user']);
    }

    public static function user() {
        return $_SESSION['user'] ?? null;
    }

    public static function login($user) {
        $_SESSION['user'] = $user;
    }

    public static function logout() {
        session_destroy();
    }
}

///////////////////////////////
// core/Middleware.php
///////////////////////////////
function requireAuth() {
    if (!Auth::check()) {
        header('Location: /login');
        exit;
    }
}

function requireRole($role) {
    $user = Auth::user();
    if (!$user || $user['role'] !== $role) {
        header('Location: /unauthorized');
        exit;
    }
}

///////////////////////////////
// app/Controllers/LandingController.php
///////////////////////////////
class LandingController {
    public function index() {
        include __DIR__ . '/../Views/landing.php';
    }
}

///////////////////////////////
// app/Controllers/AuthController.php
///////////////////////////////
class AuthController {
    public function showLogin() {
        include __DIR__ . '/../Views/login.php';
    }

    public function login() {
        $email = $_POST['email'] ?? '';
        $pass = $_POST['password'] ?? '';

        $pdo = new PDO('sqlite:' . __DIR__ . '/../../storage/data.db');
        $stmt = $pdo->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($pass, $user['password'])) {
            Auth::login($user);
            header('Location: /');
        } else {
            echo "Login inválido";
        }
    }

    public function logout() {
        Auth::logout();
        header('Location: /login');
    }
}

///////////////////////////////
// app/Views/landing.php
///////////////////////////////
?><!DOCTYPE html>
<html>
<head>
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-center p-10">
    <h1 class="text-3xl font-bold">Bem-vindo à plataforma</h1>
    <a href="/login" class="mt-4 inline-block text-blue-500">Login</a>
</body>
</html>

///////////////////////////////
// app/Views/login.php
///////////////////////////////
?><!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex justify-center items-center h-screen">
    <form action="/login" method="post" class="bg-white p-8 rounded shadow w-80">
        <h2 class="text-xl font-bold mb-4">Login</h2>
        <input name="email" type="email" placeholder="Email" class="w-full mb-3 p-2 border rounded">
        <input name="password" type="password" placeholder="Senha" class="w-full mb-3 p-2 border rounded">
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Entrar</button>
    </form>
</body>
</html>
