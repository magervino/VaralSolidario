<?php
    //$id_campanha = $_POST['id_campanha'];
    include_once $_SESSION["root"].'DAO/DatabaseConnection.php';
    $id_campanha = filter_input(INPUT_GET, "id_campanha");
        
   
        $query = mysql_query("delete from campanha where id_campanha = '$id_campanha'");
        if ($query){
             header("Location: criar_campanha.php#visualizar");
        }else {
            die("Erro: ". mysqli_error($link));
        }
?>