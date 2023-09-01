<?php
session_start();
include("imports/icon.php");
include("imports/conection.php");
$n_genero = 3;

$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
$confirmar_senha = mysqli_real_escape_string($conexao, trim(md5($_POST['confirmar_senha'])));
$data_de_nascimento = mysqli_real_escape_string($conexao, $_POST['data_de_nascimento']);
$genero = mysqli_real_escape_string($conexao, $_POST['genero']);

$sql = "select count(*) as total from usuarios where usuario = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);
//verifica se o usuario ja existe
if ($row['total'] == 1) {
    $_SESSION['user_exist'] = true;
    header('Location: cadastro.php');
    exit();
}
if(isset($_SESSION['usuario'])){
    header('Location: cadastro.php');
    exit();
}

//verifica campos vazios
if (empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['confirmar_senha']) || empty($_POST['data_de_nascimento'])) {
    $_SESSION['empty_error'] = true;
    header('Location: cadastro.php');
    exit();
}

//confirma a senha
if ($senha != $confirmar_senha) {
   $_SESSION['passwd_error'] = true;
   header('Location: cadastro.php');
   exit();
}

//atribui e verifica o genero
if ($genero != "Masculino" && $genero != "Feminino") {
    $_SESSION['gender_error'] = true;
    header('Location: cadastro.php');
    exit();
}

//insere os dados no banco
$sql = "INSERT INTO usuarios (usuario, senha, genero, data_de_nascimento) VALUES ('$usuario','$senha','$genero','$data_de_nascimento')";
if ($conexao->query($sql) === TRUE) {
    $_SESSION['cadastro'] = true;
}
$conexao->close();
header('Location: cadastro.php');
exit();
?>