<?php
session_start();
$connect = new PDO("mysql:host=localhost;dbname=helpercarrot", "root", "");

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    $sql = "select id from usuarios where usuario = '$usuario'";
    $result = mysqli_query(mysqli_connect('localhost','root','','helpercarrot'), $sql);    
    $idaux = mysqli_fetch_assoc($result);
    $id = (int) $idaux['id'];

    $data = [
        'id'               => $id,
        'idade'            => $_POST["idade"],
        'peso'             => $_POST["peso"],
        'atividade_fisica' => $_POST["atividade_fisica"],
        'altura'           => $_POST["altura"],
        'imc'              => $_POST["imc"],
        'classificacao'    => $_POST["classificacao"],
        'peso_ideal'       => $_POST["peso_ideal"],
        'eer'              => $_POST["eer"],
    ];
    $stmt = $connect->prepare('INSERT INTO historico (id_usuario, idade, peso, atividade_fisica, altura, imc, classificacao, peso_ideal, eer, data_da_consulta) VALUES (:id, :idade, :peso, :atividade_fisica, :altura, :imc, :classificacao, :peso_ideal, :eer, CURDATE())');

    try {
        $connect->beginTransaction();
        $stmt->execute($data);
        $connect->commit();
        echo 'deu certo';
    } catch (Exception $e) {
        $connect->rollback();
        throw $e;
    }
    
}else{
    exit();
}

?>