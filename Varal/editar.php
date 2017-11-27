<?php
    session_start();
    include_once $_SESSION["root"].'DAO/DatabaseConnection.php';
    $id_campanha = filter_input(INPUT_GET, "id_campanha");
    $local_camp = filter_input(INPUT_GET, "local_camp");
    $estado_camp = filter_input(INPUT_GET, "estado_camp");
    $cidade_camp = filter_input(INPUT_GET, "cidade_camp");
    $endereco_camp = filter_input(INPUT_GET, "endereco_camp");    
    $inicio_camp = filter_input(INPUT_GET, "inicio_camp");
    $tipo_camp = filter_input(INPUT_GET, "tipo_camp");
    $user_id = strip_tags($_SESSION['id_pessoa']);
    

        $query = mysql_query("update campanha set local_camp='$local_camp', estado_camp='$estado_camp',  cidade_camp='$cidade_camp',endereco_camp='$endereco_camp',inicio_camp='$inicio_camp',
            tipo_camp = '$tipo_camp', user_id = '$user_id'
             where id_campanha = '$id_campanha';");				 
       					 
        if ($query){
             echo"<script language='javascript' type='text/javascript'>alert('Campanha alterada com sucesso!');window.location.href='criar_campanha.php#visualizar'</script>";
        }else {
            die("Erro: ". mysqli_error($link));
        }
    

?>