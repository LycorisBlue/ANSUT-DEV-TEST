<?php
require_once '../controllers/UserController.php';

// Configuration de la base de données
$host = 'lycorisblue.com';
$dbname = 'lycorisb_arise';
$username = 'lycorisb_team';
$password = 'arise@lycoris';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erreur de connexion à la base de données: " . $e->getMessage());
}

$userController = new UserController($db);

// Routing simple
$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'register':
        $userController->register();
        break;
    case 'login':
        $userController->login();
        break;
    case 'profile':
        $userController->profile();
        break;
    case 'logout':
        $userController->logout();
        break;
    default:
        echo "Page non trouvée";
        break;
}
