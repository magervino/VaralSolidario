<?php 
 session_start();
  $_SESSION["root"] = "C:/xampp/htdocs/Varal/";
  include_once $_SESSION["root"].'DAO/DatabaseConnection.php';
  #header
    include 'includes/header.php';    
  #menu
    include 'includes/menu.php';    
?>

 <script type="text/javascript">
   function valida_campos() {
     if(document.getElementById('nome').value == ''){
          alert('Favor inserir um nome.');
          document.getElementById('nome').focus();
          return false;
     }
     if(document.getElementById('email').value == ''){
          alert('Favor inserir um E-mail.');
          document.getElementById('email').focus();
          return false;
     }
     if(document.getElementById('senha').value == '' || document.getElementById('senha').value != document.getElementById('senha_conf').value){
          alert('Senhas não conferem, favor redigitar.');
          document.getElementById('senha').focus();
          return false;
     }     
   } </script> 
   
<!-- Section: login e cadastro -->

 <section id="comoajudar" class="home-section text-center">
         <div class="heading-about">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                     <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                           <h2>
                              Cadastre-se e faça o login
                           </h2>
 <div class="modal-body">
              <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form action="salvar_cadastro.php" role="form" method="POST" name="frmPessoa" onSubmit="return valida_campos();" >
			<!-- dentro do form: method="POST"-->
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					
				</div>
				
			<div class="form-group">
				<input type="text" name="nome" id="nome" class="form-control input-lg" placeholder="Nome" tabindex="3">
			</div>
			<div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="E-mail" tabindex="4">
			</div>
			<div class="form-group">
				<input type="password" name="senha" id="senha" class="form-control input-lg" placeholder="Insira uma senha" tabindex="4">
			</div>
			<div class="form-group">
				<input type="password" name="senha_conf" id="senha_conf" class="form-control input-lg" placeholder="Confirme a senha" tabindex="4">
			</div>
			
			<hr class="colorgraph">
			<div class="row">
				<div class="col-xs-12 col-md-6"<div id="form-content "><button type="submit" class="btn btn-primary btn-block btn-lg" tabindex="7" id="submit"> Cadastrar</button></div>

				<div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">Possuo login</a></div>
			</div>
			
		</form>
	</div>
</div>


      </section>
      <!-- /Section: rodapé -->
      <?php
            include 'includes/footer.php';    
        ?>