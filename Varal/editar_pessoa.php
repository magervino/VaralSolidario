<?php
session_start();
#include_once $_SESSION["root"].'DAO/DatabaseConnection.php';

	$id_pessoa = filter_input(INPUT_GET, "id_pessoa");
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = ($_POST['senha']);
    $criptografada = md5($senha);
    
    $link = mysqli_connect('localhost','root','', 'bancovaralsolidario');
    if($link){

         $query = mysqli_query($link, "update pessoa set nome='$nome', email = '$email', senha='$criptografada' where id_pessoa = '$id_pessoa'");



        if ($query){
            

              $q1 = "SELECT * FROM pessoa WHERE id_pessoa = '$id_pessoa'";   
           #var_dump($q1);
           #die();
        
              $verifica = mysqli_query($link, $q1);
            // or die("erro ao selecionar");
            //var_dump($query);
            //var_dump($verifica);
            
            $data = array();
        
            while($row = mysqli_fetch_assoc($verifica)){
            #var_dump($row);
            $data[]= $row;
            }
    

            echo"<script language='javascript' type='text/javascript'>alert('Dados atualizados com sucesso!');window.location.href='index.php'</script>";
            session_start();
    
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $criptografada;
            $_SESSION['id_pessoa'] = $data[0]['id_pessoa'];
            setcookie("email",$email);
            setcookie("id_pessoa",$id_pessoa);
            setcookie("senha",$email);
            header("Location:index.php");
        }else{
          echo"<script language='javascript' type='text/javascript'>alert('Não foi possível atualizar seu perfil...');window.location.href='visualizar_pessoa.php'</script>";

    }
    
   
} 

    
?>
