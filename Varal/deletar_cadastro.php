<?php
    //$id_campanha = $_POST['id_campanha'];
include_once $_SESSION["root"].'DAO/DatabaseConnection.php';
    $id_campanha = filter_input(INPUT_GET, "id_campanha");
    
    
    if($link){
        $query = mysqli_query($link, "delete from pessoa where id_pessoa = '$id_pessoa'");
        if ($query){
             header("Location: index.php");
        }else {
            die("Erro: ". mysqli_error($link));
        }
    }else {
        die("Erro: ". mysqli_error($link));
    }
?>