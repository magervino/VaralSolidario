 <?php
session_start();
  $_SESSION["root"] = "C:/xampp/htdocs/Varal/";
  
  #menu
    include 'includes/menu.php';    

//var_dump($_SESSION);

//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['email']) and !isset($_SESSION['senha']) ) {
  //Destrói
  session_destroy();
  header('location:login.php');//Redireciona para a página de autenticação
  //Limpa
  unset ($_SESSION['email']);
  unset ($_SESSION['senha']);
  
}
    #header
    include 'includes/header.php';   
    include_once $_SESSION["root"].'DAO/DatabaseConnection.php';

    $parametro = filter_input(INPUT_GET, "parametro");
    $id_campanha = filter_input(INPUT_GET, "id_campanha");
    $local_camp = filter_input(INPUT_GET, "local_camp");
    $estado_camp = filter_input(INPUT_GET, "estado_camp");
    $cidade_camp = filter_input(INPUT_GET, "cidade_camp");
    $endereco_camp = filter_input(INPUT_GET, "endereco_camp");    
    $inicio_camp = filter_input(INPUT_GET, "inicio_camp");
    $tipo_camp = filter_input(INPUT_GET, "tipo_camp");
    $user_id = strip_tags($_SESSION['id_pessoa']); 

    $mysqllink = mysql_connect("localhost", "root", ""); 
    mysql_select_db("bancovaralsolidario");
    
    $dados = mysql_query("select * from campanha where id_campanha = '$id_campanha' ");

    $linha = mysql_fetch_assoc($dados);
    $total = mysql_num_rows($dados);  
    
  ?>
      <!-- Section: editar campanhas -->
      


<section id="criar" class="home-section text-center">
         <div class="heading-about">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                     <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                           <h2>
                              ALTERAR CAMPANHA
                           </h2>
                           <i class="fa fa-2x fa-angle-down">
                           </i>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
  
<div class="container">
 <form name="frmUser" action="editar.php">
           <!--<div style="width:500px;">-->
               <div class="message">
                  <?php if(isset($message)) { echo $message;} 
                    ?>
               </div>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
     <div class="boxed-grey">
    <form role="form" action="editar.php">
      <h2> <small>Faça alterações na sua campanha</small></h2>
      <hr class="colorgraph">
            <div class="form-group">
            <input type="hidden" name="id_campanha" value="<?php echo $linha['id_campanha'] ?>"  >


            <label for="local_camp">Local da Campanha</label>
          <input type="text" name="local_camp" value="<?php echo $linha['local_camp'] ?>"  id="local_camp" class="form-control input-lg"  tabindex="3">
      </div>
      
      <div class="form-group">
      <label for="endereco_camp">Endereço completo</label>
        <input type="text" name="endereco_camp" id="endereco_camp" class="form-control input-lg" value="<?php echo $linha['endereco_camp'] ?>" tabindex="3">
      </div>

      <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
          <label for="estado_camp">Estado</label>
            <input type="text" name="estado_camp" id="estado_camp" class="form-control input-lg" value="<?php echo $linha['estado_camp'] ?>" tabindex="2">
                
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
          <label for="cidade_camp">Cidade</label>
          <input type="text" name="cidade_camp" id="cidade_camp" class="form-control input-lg" value="<?php echo $linha['cidade_camp'] ?>" tabindex="2">
           
          </div>
        </div>
            </div>

      

        <div class="form-group">
        <label for="tipo_camp">Tipo de campanha</label>
              
                        <select id="tipo_camp" name="tipo_camp"  class="form-control input-lg"  tabindex="3">
                            <option value="<?php echo $linha['tipo_camp']?>"><?php echo $linha['tipo_camp']?></option>
                            <option value="Campanha do Agasalho">Campanha do Agasalho</option>
                            <option value="Varal Solidário">Varal Solidário</option>
                            <option value="Geladeira Solidária">Geladeira Solidária</option>
                        </select>
        </div>

      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
          <label for="inicio_camp">Início da campanha</label>
            <input type="date" name="inicio_camp" id="inicio_camp" class="form-control input-lg" value="<?php echo $linha['inicio_camp'] ?>" tabindex="5">
          </div>
        </div>
      </div>
     
      <hr class="colorgraph">
      <div class="row">
        
        <div class="col-xs-12 col-md-12" <div id="form-content ">
        <button type="submit " class="btn btn-success btn-block btn-lg" id="submit ">Alterar Campanha</button>

      </div>
      </div>
    </form>
    </div>
  </div>
</div>

</div>

</section>
  


   
      <!-- /Section: rodapé -->
     <?php
            include 'includes/footer.php';    
        ?>
