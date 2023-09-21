<?php
session_start();

// Remover a variável de sessão 'usuario'
unset($_SESSION['usuario']);

// Destruir a sessão
session_destroy();

// Redirecionar para a index
header('Location: index.php');
exit();
?>