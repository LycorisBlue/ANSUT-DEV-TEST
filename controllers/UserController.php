<?php
require_once '../models/User.php';

class UserController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $email = $_POST['email'] ?? '';
            $motDePasse = $_POST['mot_de_passe'] ?? '';
            $type = $_POST['type'] ?? 'Interne';
            $role = $_POST['role'] ?? 'Participant';

            if ($this->userModel->create($nom, $prenom, $email, $motDePasse, $type, $role)) {
                $message = "Utilisateur créé avec succès!";
            } else {
                $message = "Erreur lors de la création de l'utilisateur.";
            }
        }
        include '../views/register.php';
    }


    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $motDePasse = $_POST['mot_de_passe'] ?? '';

            $user = $this->userModel->login($email, $motDePasse);
            if ($user) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                header('Location: index.php?action=profile');
                exit;
            } else {
                $message = "Email ou mot de passe incorrect.";
            }
        }
        include '../views/login.php';
    }

    public function profile() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit;
        }

        $user = $this->userModel->getUserById($_SESSION['user_id']);
        include '../views/profile.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }

}