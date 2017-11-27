
<?php
  #include_once $_SESSION["root"].'DAO/DatabaseConnection.php';
	$email = $_POST['email'];
  $entrar = $_POST['entrar'];
  $senha = ($_POST['senha']);
  #$id_pessoa = ($_POST['id_pessoa']);
  #$nome = $_POST['nome'];

  $criptografada = md5($senha);

  $link = mysqli_connect('localhost','root','', 'bancovaralsolidario');
	//$database = mysql_select_db('bancovaralsolidario');
   
    if (isset($entrar)) {
      $query = "SELECT * FROM pessoa WHERE email = '$email' AND senha = '$criptografada'";   

      $verifica = mysqli_query($link, $query);
    // or die("erro ao selecionar");
    //var_dump($query);
    //var_dump($verifica);
    $data = array();
    while($row = mysqli_fetch_assoc($verifica)){
    $data[]= $row;
    }
    
     //var_dump($data);
      
        if (mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('E-mail e/ou senha incorretos');window.location.href='login.php';</script>";
          session_destroy();
          die();
        }else{
        
        	session_start();
	
			$_SESSION['email'] = $email;
			$_SESSION['senha'] = $criptografada;
      $_SESSION['nome'] = $nome;
      $_SESSION['id_pessoa'] = $data[0]['id_pessoa'];
          setcookie("email",$email);
          header("Location:criar_campanha.php");
        }
    }

?>
 