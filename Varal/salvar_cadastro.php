<?php
session_start();
#include_once $_SESSION["root"].'DAO/DatabaseConnection.php';

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = ($_POST['senha']);
    $criptografada = md5($senha);
    
    $link = mysqli_connect('localhost','root','', 'bancovaralsolidario');

     if($link){

         /*$q3 = mysql_query("select email from pessoa where email = $email");
         $compara_email = mysql_num_rows($q3);
        echo $compara_email;
        die();

         if(mysql_num_rows($q3) >= 1){
        echo"<script language='javascript' type='text/javascript'>alert('Email já cadastrado, tente novamente.');window.location.href='cadastrar_pessoa.php'</script>";
    }else{*/
         $query = mysqli_query($link, "insert into pessoa (nome, email, senha) values ('$nome','$email','$criptografada')");

        if ($query){
            
              $q1 = "SELECT * FROM pessoa WHERE email = '$email'";   
                # var_dump($q1);
        
              $verifica = mysqli_query($link, $q1);
                // or die("erro ao selecionar");
                //var_dump($query);
                //var_dump($verifica);    
                $data = array();
            
                while($row = mysqli_fetch_assoc($verifica)){
                #var_dump($row);
                $data[]= $row;
                }
        
                $_SESSION['email'] = $email;
                $_SESSION['senha'] = $criptografada;
                $_SESSION['nome'] = $nome;
                $_SESSION['id_pessoa'] = $data[0]['id_pessoa'];
                setcookie("email",$email);
                setcookie("id_pessoa",$id_pessoa);
                setcookie("senha",$senha);
                setcookie("nome",$nome);
                echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');</script>";
                session_start();
                header("Location:criar_campanha.php");
            }else{
              echo"<script language='javascript' type='text/javascript'>alert('Este email já está sendo utilizado.');window.location.href='cadastrar_pessoa.php'</script>";
            }

        }
   
    


    
?>
