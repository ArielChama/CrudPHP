<?php


/*
            ********************
            IMPLEMENTAÇÃO DO PDO
            ********************

*/

$server = 'localhost';
$username = 'root';
$password = '';
$bd_name = 'crud';

$conexao = mysqli_connect($server, $username, $password, $bd_name);


$pdoConnection = new PDO("mysql:host=$server;dbname=$bd_name", $username, $password, array(
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));
