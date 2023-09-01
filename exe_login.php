<?php
session_start();
include("imports/icon.php");
include("imports/conection.php");

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: login.php');
    exit();
}
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select id, usuario from usuarios where usuario = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: panel.php');
    exit();
}else{
    $_SESSION['invalid'] = true;
    header('Location: login.php');
    exit();
}


?>