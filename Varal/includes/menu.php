  <?php
      #session_start();
      include_once $_SESSION["root"].'DAO/DatabaseConnection.php';
      

     # echo $id_pessoa;
    #$id_pessoa = strip_tags($_SESSION['id_pessoa']); 
    #$dados = mysql_query("select id_pessoa from pessoa where id_pessoa = '$id_pessoa'");
  

   # $linha = mysql_fetch_assoc($dados);
    #$total = mysql_num_rows($dados);
  ?>
    
    <!-- =======================================================
        PROJETO VARAL SOLIDÁRIO
        PAGINA WEB (HTML, JS, BOOTSTRAP, PHP)
        DISCIPLINA: PRJ
        AUTOR: MARIANA G BARBOSA (mariana.barbos@hotmail.com)
    ======================================================= -->
<!DOCTYPE html>
<html lang="pt-BR">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>
         Varal Solidário
      </title>
      <!-- Bootstrap Core CSS -->
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <!-- Fonts -->
      <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="css/animate.css" rel="stylesheet" />
      <!-- Squad theme CSS -->
      <link href="css/style.css" rel="stylesheet">
      <link href="color/default.css" rel="stylesheet">

      
   </head>
<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
      <!-- Preloader -->
      <div id="preloader">
         <div id="load">
         </div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
         <div class="container">
            <div class="navbar-header page-scroll">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
               <i class="fa fa-bars">
               </i>
               </button>
               <a class="navbar-brand" href="index.php">
                  <h1>VARAL SOLIDÁRIO</h1>
               </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
               <ul class="nav navbar-nav"> <!--class="active" -->
        <li><a href="index.php">Página inicial</a></li>
        <li><a href="pesquisar_campanha.php">Campanhas ativas</a></li>
        <li><a href="index.php#galeria">Galeria</a></li>
        <!--<li><a href="index.php#contact">Calendário</a></li>-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Como Ajudar<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="criar_campanha.php">Lançar Campanha</a></li>
            <!--<li><a href="pesquisar_campanha.php">Ver Campanhas existentes</a></li>
            <li><a href="criar_campanha.php#visualizar">Minhas campanhas</a></li>-->
            <li><a href="index.php#saibamais">Saiba mais</a></li>
          </ul>
          </li>
          <!--<li class="active"><a href="login.php">Entrar</a></li>-->
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Minha Conta<b class="caret"></b></a>
          <ul class="dropdown-menu">  
            <!--<li><a href="pesquisar_campanha.php">Ver Campanhas existentes</a></li>-->
            <li><a href="visualizar_pessoa.php">Meu Perfil</a></li>
            <li><a href="criar_campanha.php#visualizar">Minhas campanhas</a></li>
            <!--<li><a href="editar_cadastro.php">Editar cadastro</a></li>-->
          </ul>
          </li>
         <li><a href="logout.php">Sair</a></li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container -->
      </nav>
     
      <!-- Section: intro -->
      <section id="intro" class="intro">
         <div class="slogan">
            <h2>
               SE VOCÊ TEM, DOE. SE NÃO TEM, RETIRE.
               <span class="text_color">
               </span>
            </h2>
            <h4>
               Conheça mais sobre o projeto. Inspire-se. Ajude quem precisa.
            </h4>
         </div>
         <div class="page-scroll">
            <a href="#galeria" class="btn btn-circle">
            <i class="fa fa-angle-double-down animated"></i>
            </a>
         </div>
      </section>




<!--<nav class="navbar navbar-default menu">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><?php #echo strtoupper($_SESSION["nomeLogado"]);  ?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="cadastrarFuncionario"><a href="cadastraFuncionario">Cadastra Funcionário</a></li>
                <li class="visualizarFuncionario"><a href="exibeFuncionarios">Exibe Funcionário</a></li>
                <li class="cadastrarDepartamento"><a href="cadastraDepartamento">Cadastra Departamento</a></li>
                <li class="visualizarDepartamento"><a href="exibeDepartamento">Exibe Departamento</a></li>
                <li class="sair"><a href="sair">SAIR</a></li>    
            </ul>
        </div>
    </div>-->