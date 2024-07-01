<?php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($nom, $prenom, $email, $motDePasse, $type, $role) {
        $sql = "INSERT INTO UTILISATEUR (nom, prenom, email, mot_de_passe, type, role) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $hashedPassword = password_hash($motDePasse, PASSWORD_DEFAULT);
        return $stmt->execute([$nom, $prenom, $email, $hashedPassword, $type, $role]);
    }

    public function login($email, $motDePasse) {
        $sql = "SELECT * FROM UTILISATEUR WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($motDePasse, $user['mot_de_passe'])) {
            return $user;
        }
        return false;
    }

    public function getUserById($id) {
        $sql = "SELECT id, nom, prenom, email, type, role FROM UTILISATEUR WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}