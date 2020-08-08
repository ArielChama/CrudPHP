<?php
    session_start();
    require_once 'conexao_db.php';


    function filtrar($input)
    {
        global $conexao;

        //sql
        $var = mysqli_escape_string($conexao, $input);
        
        // Xss
        $var = htmlspecialchars($input);

        return $var;
    }

    if (isset($_GET['btn-cadastrar'])) {
        $nome = filtrar($_GET['nome']);
        $sobrenome = filtrar($_GET['sobrenome']);
        $email = filtrar($_GET['email']);
        $idade = filtrar($_GET['idade']);

        $sql = "
            INSERT INTO clientes 
            (nome, sobrenome, email, idade) 
            VALUES 
            (
                '$nome', 
                '$sobrenome', 
                '$email', 
                '$idade'
            )
        ";

        if (mysqli_query($conexao, $sql)) {
            $_SESSION['mensagem'] = "Cadastrado com sucesso";
            header('Location: ../index.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar";
            header('Location: ../index.php');
        }
    }
?>