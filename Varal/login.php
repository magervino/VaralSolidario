  <?php
  $_SESSION["root"] = "C:/xampp/htdocs/Varal/";
  #header
$parametro   = filter_input(INPUT_GET, "parametro");
$id_campanha = filter_input(INPUT_GET, "id_campanha");
$mysqllink   = mysql_connect("localhost", "root", "");
mysql_select_db("bancovaralsolidario");

$dados       = mysql_query("select * from campanha order by id_campanha");

$linha       = mysql_fetch_assoc($dados);
$total       = mysql_num_rows($dados);
#echo $id_campanha;
   if ( !isset($_SESSION['email']) and !isset($_SESSION['senha']) ) {
  #session_destroy();
  #header('location:index.php');//Redireciona para a página de autenticação
    include_once 'includes/menu_semlogin.php';   
  //Limpa
  unset ($_SESSION['email']);
  unset ($_SESSION['senha']);
//header_remove();
}else{
    include 'includes/menu.php';   
} 
    include 'includes/header.php';  

?>
		<!-- Section: login e cadastro -->

		<section id="comoajudar" class="home-section text-center">
			<div class="heading-about">
			<div class="container">
			<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
			<div class="wow bounceInDown" data-wow-delay="0.4s">
			<div class="section-heading">
			<h2>
				Faça o login
			</h2>
			<div class="modal-body">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
					<form method="POST" action="autentica_login.php" role="form">

						<hr class="colorgraph">
						<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">

						</div>
						<div class="form-group">
							<input type="email" name="email" id="email" class="form-control input-lg" placeholder="E-mail" tabindex="4">
						</div>
						<div class="form-group">
							<input type="password" name="senha" id="senha" class="form-control input-lg" placeholder="Senha" tabindex="4">
						</div>

						<div class="row">
							<div class="">
								Não e cadastrado ainda? Não se preocupe, clique em
								<strong class="label label-primary">Cadastrar</strong> e preencha os dados necessários!
							</div>
						</div>

						<hr class="colorgraph">
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<input type="submit" value="entrar" id="entrar" name="entrar" class="btn btn-success btn-block btn-lg">
							</div>

							<div class="col-xs-12 col-md-6">
								<a href="cadastrar_pessoa.php" class="btn btn-primary btn-block btn-lg" tabindex="7">
									Cadastrar
								</a>

							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">

				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->


		</section>

		</section>
		<!-- /Section: rodapé -->
	<?php
            include 'includes/footer.php';    
        ?>
