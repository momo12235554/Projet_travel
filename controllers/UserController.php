<?php
// controllers/UserController.php

require_once __DIR__ . '/../models/User.php';

class UserController {
    private $db;
    public function __construct($db) { $this->db = $db; }

    public function login() {
        $error = $_SESSION['login_error'] ?? null;
        unset($_SESSION['login_error']);
        $this->render('login', ['error' => $error]);
    }

    public function handleLogin() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($this->db, $email);

        if ($user && $user['password'] === $password) { // Vérification simple
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            header('Location: ?route=home');
            exit;
        } else {
            $_SESSION['login_error'] = "Email ou mot de passe incorrect.";
            header('Location: ?route=login');
            exit;
        }
    }
    
    public function logout() {
        session_destroy();
        header('Location: ?route=home');
        exit;
    }

    public function register() {
        $this->render('register', ['error' => $_SESSION['register_error'] ?? null]);
        unset($_SESSION['register_error']);
    }

    public function handleRegister() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if (User::findByEmail($this->db, $email)) {
             $_SESSION['register_error'] = "Cet email est déjà utilisé.";
             header('Location: ?route=register');
             exit;
        }

        $userId = User::create($this->db, $email, $password);
        
        if ($userId) {
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_email'] = $email;
            header('Location: ?route=home');
            exit;
        } else {
            $_SESSION['register_error'] = "Erreur lors de la création du compte.";
            header('Location: ?route=register');
            exit;
        }
    }

    private function render($view, $data = []) {
        extract($data);
        ob_start();
        require __DIR__ . "/../views/$view.php";
        $content = ob_get_clean();
        require __DIR__ . '/../layouts/main.php';
    }
}