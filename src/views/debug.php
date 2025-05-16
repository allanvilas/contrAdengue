<?php
// debug.php - Display key information from the $_SERVER superglobal and other details

header('Content-Type: text/plain');

// Display key $_SERVER information
echo "=== SERVER INFORMATION ===\n";
echo "Server Name: " . ($_SERVER['SERVER_NAME'] ?? 'N/A') . "\n";
echo "Server Software: " . ($_SERVER['SERVER_SOFTWARE'] ?? 'N/A') . "\n";
echo "Request Method: " . ($_SERVER['REQUEST_METHOD'] ?? 'N/A') . "\n";
echo "Request URI: " . ($_SERVER['REQUEST_URI'] ?? 'N/A') . "\n";
echo "Query String: " . ($_SERVER['QUERY_STRING'] ?? 'N/A') . "\n";
echo "Client IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'N/A') . "\n";
echo "User Agent: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'N/A') . "\n";
echo "Referer: " . ($_SERVER['HTTP_REFERER'] ?? 'N/A') . "\n";

echo "GET values" . ( var_export($_GET) ? ":\n" : " (empty):\n");

echo "POST values" . ( var_export($_POST) ? ":\n" : " (empty):\n");
// Display all $_SERVER variables
echo "\n=== ALL SERVER VARIABLES ===\n";
print_r($_SERVER);

// Display PHP version
echo "\n=== PHP INFORMATION ===\n";
echo "PHP Version: " . phpversion() . "\n";

// Display loaded extensions
echo "\n=== LOADED EXTENSIONS ===\n";
print_r(get_loaded_extensions());
?>