<?php 
 session_start();
  $_SESSION["root"] = "C:/xampp/htdocs/Varal/";
  include_once $_SESSION["root"].'DAO/DatabaseConnection.php';

    $parametro = filter_input(INPUT_GET, "parametro");
    $id_campanha = filter_input(INPUT_GET, "id_campanha");
    $id_pessoa = filter_input(INPUT_GET, "id_pessoa");
    #$user_id = strip_tags($_SESSION['id_pessoa']); 

    #$dados = mysql_query("select * from campanha where user_id = '$user_id'");
    $dados_camp = mysql_query("select * from campanha");
    $total = mysql_num_rows($dados_camp);
    $likes_query = "select SUM(count_camp) from campanha";
    $total_likes = mysql_query($likes_query) or die(mysql_error());
    
    $media_query = "select AVG(count_camp) from campanha";
    $total_media = mysql_query($media_query) or die(mysql_error());;

    $dados_user = mysql_query("select * from pessoa");
    $total_user = mysql_num_rows($dados_user);


    #$user = mysql_query("select user_id from pessoa where user_id = '$user_id'");
    #echo "$user";
   # $linha = mysql_fetch_assoc($dados);
    #$total = mysql_num_rows($dados);

if ( !isset($_SESSION['email']) and !isset($_SESSION['senha']) ) {
  session_destroy();
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

	<!-- Section: como ajudar e ver campanhas -->      
    <section id="comoajudar" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Saiba Como ajudar</h2>
					<i class="fa fa-2x fa-angle-down"></i>
					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
  
        <!--tirar?? -->
        <div class="row">
            <div class="col-md-6">
				<div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Promover o bem é fácil</h5>
                        <ul>
                        <li><p class="subtitle">Encontre aqui a campanha Varal Solidário mais próxima de você</p></li>
                        <li><p class="subtitle">Doe aquela roupa que você não precisa mais a quem mais precisa </p></li>
                        <li><p class="subtitle">Compartilhe e ajude a divulgar as campanhas da sua vizinhança</p></li>
                        </ul>
                        
                       <!-- <div class="avatar"><img src="img/team/1.jpg" alt="" class="img-responsive img-circle" /></div> -->
                    </div>
                </div>
				</div>
            </div>
            
            <div class="col-md-6">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Crie uma campanha de doações</h5>
                        <ul>
                        <li><p class="subtitle">Converse com vizinhos, amigos e colegas de trabalho e crie uma campanha no seu bairro!</p></li>
                        <li><p class="subtitle">Criar uma nova campanha é muito fácil. <a href="criar_campanha.php">Clique aqui!</a></p></li>
                        </ul>
                       <!-- <div class="avatar"><img src="img/team/3.jpg" alt="" class="img-responsive img-circle" /></div> -->

                    </div>
                </div>
				</div>
            </div>         
        </div>		
		</div>
	</section>
    	
	<!-- Section: Galeria de fotos -->
    <section id="galeria" class="home-section text-center">		
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Galeria de Fotos</h2>
					<i class="fa fa-2x fa-angle-down"></i>
					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
        <!--tirar?? -->
        <div class="row">
            <div class="col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Ribeirão Preto - SP</h5>
                        <p class="subtitle">Lindalva Bento da Silva pegou peças para levar ao filho</p>
                        <div class="avatar"><img src="img/team/1.jpg" alt="" class="img-responsive img-circle" /></div>
                    </div>
                </div>
				</div>
            </div>
			<div class="col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Campanha do Agasalho</h5>
                        <p class="subtitle">Neste inverno, doe roupas boas para quem precisa</p>
                        <div class="avatar"><img src="img/team/2.jpg" alt="" class="img-responsive img-circle" /></div>
                    </div>
                </div>
				</div>
            </div>
			<div class="col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.8s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Santa Cruz - BA</h5>
                        <p class="subtitle">Varal montado por alunos da Escola Municipal Jose da Silva</p>
                        <div class="avatar"><img src="img/team/3.jpg" alt="" class="img-responsive img-circle" /></div>
                    </div>
                </div>
				</div>
            </div>
			<div class="col-md-3">
				<div class="wow bounceInUp" data-wow-delay="1s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Ipatinga - MG</h5>
                        <p class="subtitle">Este ano e a segunda edição do projeto 'Varal Solidário'</p>
                        <div class="avatar"><img src="img/team/4.jpg" alt="" class="img-responsive img-circle" /></div>
                    </div>
                </div>
				</div>
            </div>               
        </div>		
		</div>   
	</section>

    <!-- Section: Relatório -->
    <section id="saibamais" class="home-section text-center">     
        <div class="heading-about">
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                    <div class="section-heading">
                    <h2>Quanto mais, melhor!</h2>
                    <i class="fa fa-2x fa-angle-down"></i>
                    </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-5">
                <hr class="marginbot-50">
                <h4>Sobre o Varal Solidário</h4>
            </div>
        </div>
        <!--tirar?? -->
        <div class="row">
            <div class="col-md-3">
                <div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                    <div class="inner">
                        <!--<div class="avatar"><img src="img/team/1.jpg" alt="" class="img-responsive img-circle" /></div>-->
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <a><h1><?php echo $total; ?></h1><h3>número de campanhas criadas</h3></a> 
                       </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
                        <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <a><h1><?php echo $total_user; ?></h1><h3>voluntários cadastrados desde 2017</h3></a> 
                       </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="wow bounceInUp" data-wow-delay="0.8s">
                <div class="team boxed-grey">
                    <div class="inner">
                    <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <a><h1><?php while($row = mysql_fetch_array($total_likes)){
                                echo $row['SUM(count_camp)']; }?>
                                    </h1><h3>é o total de engajamentos em campanhas</h3></a> 
                       </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-3">
                <div class="wow bounceInUp" data-wow-delay="1s">
                <div class="team boxed-grey">
                    <div class="inner">
                       <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <a><h1><?php while($row = mysql_fetch_array($total_media)){
                                echo round($row['AVG(count_camp)'],0); }?>
                                </h1><h3>é a média de engajamentos por campanha</h3></a> 
                       </div>
                    </div>
                </div>
                </div>
            </div>               
        </div>      
        </div>  
        <hr class="marginbot-50"> 
    </section>
	
		<?php
            include 'includes/footer.php';    
        ?>