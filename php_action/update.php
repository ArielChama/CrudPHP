<?php
    session_start();
    require_once 'conexao_db.php';

    if (isset($_GET['btn-editar'])) {
        $nome = mysqli_escape_string($conexao, $_GET['nome']);
        $sobrenome = mysqli_escape_string($conexao, $_GET['sobrenome']);
        $email = mysqli_escape_string($conexao, $_GET['email']);
        $idade = mysqli_escape_string($conexao, $_GET['idade']);
        $id = mysqli_escape_string($conexao, $_GET['id']);

        $sql = "UPDATE clientes SET nome = '$nome', sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id'";

        if (mysqli_query($conexao, $sql)) {
            $_SESSION['mensagem'] = "Atualizado com sucesso";
            header('Location: ../index.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao atualizar";
            header('Location: ../index.php');
        }
    }
?>