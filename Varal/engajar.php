<?php
    session_start();
  #   $_SESSION["root"] = "C:/xampp/htdocs/Varal/";
    include_once 'DAO/DatabaseConnection.php';
    

if ( !isset($_SESSION['email']) and !isset($_SESSION['senha']) ) {
  session_destroy();
  #header('location:index.php');//Redireciona para a página de autenticação
    echo"<script language='javascript' type='text/javascript'>alert('Para engajar a uma campanha, por favor, faça o login.');window.location.href='pesquisar_campanha.php'</script>";   
  //Limpa
  unset ($_SESSION['email']);
  unset ($_SESSION['senha']);
//header_remove();
}else{
    $id_campanha = filter_input(INPUT_GET, "id_campanha");
    $local_camp = filter_input(INPUT_GET, "local_camp");
    $estado_camp = filter_input(INPUT_GET, "estado_camp");
    $cidade_camp = filter_input(INPUT_GET, "cidade_camp");
    $endereco_camp = filter_input(INPUT_GET, "endereco_camp");    
    $email_camp = filter_input(INPUT_GET, "email_camp");
    $phone_camp = filter_input(INPUT_GET, "phone_camp");
    $inicio_camp = filter_input(INPUT_GET, "inicio_camp");
    $fim_camp = filter_input(INPUT_GET, "fim_camp"); 
    $tipo_camp = filter_input(INPUT_GET, "tipo_camp");
    $count_camp = filter_input(INPUT_GET, "count_camp");
    $user_id = strip_tags($_SESSION['id_pessoa']); 
 

 #$q1 = mysql_query("select id_pessoa from likes where id_pessoa = $user_id");
 #$q2 = mysql_query("select id_campanha from likes where id_campanha = $id_campanha");  
 $q3 = mysql_query("select * from likes where id_pessoa = $user_id and id_campanha = $id_campanha");

#$compara_pessoa = mysql_num_rows($q1);
$compara_campanha = mysql_num_rows($q3);


        if($compara_campanha !=0){
            echo"<script language='javascript' type='text/javascript'>alert('Você já está engajado nesta campanha.');window.location.href='pesquisar_campanha.php'</script>";
        }
            else{

        $voto = mysql_query("insert into likes (id_pessoa, id_campanha) values ('$user_id', '$id_campanha')");
        $query = mysql_query("update campanha set count_camp = (count_camp + 1) where id_campanha ='$id_campanha'");

        if ($query){
            echo"<script language='javascript' type='text/javascript'>alert('Engajamento realizado com sucesso!');window.location.href='pesquisar_campanha.php'</script>";
        }else {
            #var_dump($_SESSION);
            #var_dump(mysqli_error($link));
            #var_dump($query);
            #die();
            #die(mysqli_errno($link));
            echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar a campanha.');window.location.href='criar_campanha.php'</script>";
        }
    }
}   
  ?>

