<?php

require_once dirname(__DIR__, 2) . '/config.php';

function is_connected(): bool
{
    if( session_status() === PHP_SESSION_NONE ) {
        session_start();
    }
    return !empty($_SESSION['connected']); // Returns TRUE if $_SESSION['connected'] is not empty
}
function redirect_if_not_connected(string $redirect_location): void
{
    if (!is_connected()) {
        header("Location: $redirect_location");
    }
}
function login_verify(): ?bool
{
    $adminHashedPassword = password_hash(ADMIN_PASSWORD, PASSWORD_DEFAULT);

    if ($_POST['username'] === ADMIN_USERNAME && password_verify($_POST['password'], $adminHashedPassword) === true ) {
    session_start();
        $_SESSION['connected'] = 1;
        header('Location: ../admin/index.php');
    } else {
        return false;
    }
}