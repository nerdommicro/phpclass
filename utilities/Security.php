<?php

class Security
{
    public static function logout(): void
    {
        session_destroy();
        unset($_SESSION['username']);
        header("Location: ../view/login.php");
    }

    public static function login(): void
    {
        $_SESSION['msg'] = "Log in is required!";
        header('Location: ../view/login.php');

    }

    public static function checkAuthority($auth): void
    {
        if (!isset($_SESSION[$auth]) || !$_SESSION[$auth]) {
            $_SESSION['logout_msg'] = 'Login unauthorized for this page.';
            header('Location: ../view/index.php');
            exit();
        }
    }

    //Forward to the SECURE url if they are not in the secure mode
    public static function checkHTTPS()
    {
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
            header('Location: https://localhost/cis480/view/index.php');
            
        }
    }


}
