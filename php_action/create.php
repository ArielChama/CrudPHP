<?php
session_start();
require_once 'conexao_db.php';
require_once 'helpers/helpers.php';


/*
    **********************************************
    ALTERAÇÃO DA FUNÇÃO FILTRAR
    IMPLEMENTAÇÃO DOS MAIS RECENTES FILTROS DO PHP 
    **********************************************
    */


function filtrar($input)
{
    global $conexao;

    //sql
    //$var = mysqli_escape_string($conexao, $input); - DEPRECIADO!

    $var = mysqli_real_escape_string($conexao, $input);

    // Xss
    $var = htmlspecialchars($input);

    return $var;
}


/* 
    *****************************************************
    ALTERAÇÃO DOS METODOS DE INSERÇÃO(REQUISIÇÃO) DE DADOS
    PARA MAIOR SEGURANÇA
    *****************************************************

*/

if (isset($_POST['btn-cadastrar'])) {

    $nome = filtrar($_POST['nome']);

    $sobrenome = filtrar($_POST['sobrenome']);

    $idade = filtrar($_POST['idade']);

    if (!is_email($_POST['email'])) {

        $_SESSION['mensagem'] = "Email inválido";

        header('Location: ../add.php');
    } else {

        $email = filtrar($_POST['email']);

        $save = $pdoConnection->prepare("INSERT INTO clientes (nome, sobrenome, email, idade) VALUES (?, ?, ?, ?)");
        $save->bindParam(1, $nome);
        $save->bindParam(2, $sobrenome);
        $save->bindParam(3, $email);
        $save->bindParam(4, $idade);

        if ($save->execute()) {

            $_SESSION['mensagem'] = "Cliente cadastrado com sucesso!";

            header('Location: ../index.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar cliente!";

            header('Location: ../index.php');
        }
    }
}
