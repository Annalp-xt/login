<?php
 require_once("conexao.php");

 // Iniciar a sessão
session_start();

// Verifique se os campos 'nome' e 'senha' foram enviados
if (isset($_POST['nome']) && isset($_POST['senha'])) {
    // Simule uma validação simples 
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Verifique se o nome de usuário e senha correspondem 
    $sql = "SELECT * FROM usuarios WHERE nome = '$nome' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Autenticação bem-sucedida; redirecione para a página 'home'
        $_SESSION['usuario'] = $nome;
        header('Location: home.php');
        exit();
    } else {
        // Autenticação falhou; redirecione de volta ao formulário de login
        header('Location: index.php');
        exit();
    }
} else {
    // Redirecione de volta ao formulário de login se os campos não foram enviados
    header('Location: index.php');
    exit();
}
?>
