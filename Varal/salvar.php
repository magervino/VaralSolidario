<?php
    session_start();
    $id_campanha = filter_input(INPUT_GET, "id_campanha");
    $local_camp = filter_input(INPUT_GET, "local_camp");
    $estado_camp = filter_input(INPUT_GET, "estado_camp");
    $cidade_camp = filter_input(INPUT_GET, "cidade_camp");
    $endereco_camp = filter_input(INPUT_GET, "endereco_camp");    
    $inicio_camp = filter_input(INPUT_GET, "inicio_camp");
    $tipo_camp = filter_input(INPUT_GET, "tipo_camp");
    $count_camp = filter_input(INPUT_GET, "count_camp");
    
    $user_id = strip_tags($_SESSION['id_pessoa']); 

    include_once $_SESSION["root"].'DAO/DatabaseConnection.php';

        $query = mysql_query("insert into campanha (local_camp, estado_camp, cidade_camp, endereco_camp, inicio_camp, tipo_camp, user_id) values ('$local_camp',
            '$estado_camp','$cidade_camp','$endereco_camp','$inicio_camp',
            '$tipo_camp', '$user_id')");
        if ($query){
            echo"<script language='javascript' type='text/javascript'>alert('Campanha cadastrada com sucesso!');window.location.href='criar_campanha.php#visualizar'</script>";
        }else {
            #var_dump($_SESSION);
            #var_dump(mysqli_error($link));
            #var_dump($query);
            #die();
            #die(mysqli_errno($link));
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar a campanha.');window.location.href='criar_campanha.php'</script>";
    }
        
  ?>

