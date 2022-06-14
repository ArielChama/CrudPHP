<?php


/**
 * **********************************
 * ALTERAÇÃO DA FUNCÃO ANTIGA
 * mysql_escape_string() PARA A ACTUAL
 * mysqli_real_escape_string()
 * **********************************
 */
session_start();
require_once 'conexao_db.php';

if (isset($_POST['btn-deletar'])) {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $sobrenome = mysqli_real_escape_string($conexao, $_POST['sobrenome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $idade = mysqli_real_escape_string($conexao, $_POST['idade']);
    $id = mysqli_real_escape_string($conexao, $_POST['id']);


    $sql = $pdoConnection->prepare("DELETE FROM clientes WHERE id = ?");
    $sql->bindParam(1, $id);
    $sql->execute();

    if ($sql->execute()) {
        $_SESSION['mensagem'] = "Deletado com sucesso";
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao deletar";
        header('Location: ../index.php');
    }
}
