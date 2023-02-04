<?php
session_start();
require_once 'conexao_db.php';


/*

    ****************************************
    IMPLEMENTAÇÃO DO PDO PARA A ACTUALIZAÇÃO 
    DOS DADOS
    MAIOR SEGURANÇA NO TRATAMENTO DOS DADOS
    ****************************************
*/

if (isset($_POST['btn-editar'])) {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $sobrenome = mysqli_real_escape_string($conexao, $_POST['sobrenome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $idade = mysqli_real_escape_string($conexao, $_POST['idade']);
    $id = mysqli_real_escape_string($conexao, $_POST['id']);

    $sql = $pdoConnection->prepare("UPDATE clientes SET nome = ?, sobrenome = ?, email = ?, idade = ? WHERE id = ?");
    $sql->bindParam(1, $nome);
    $sql->bindParam(2, $sobrenome);
    $sql->bindParam(3, $email);
    $sql->bindParam(4, $idade);
    $sql->bindParam(5, $id);

    if ($sql->execute()) {
        $_SESSION['mensagem'] = "Atualizado com sucesso";
        header('Location: ../index.php');
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar";
        header('Location: ../index.php');
    }
}
