  <?php
session_start();
$_SESSION["root"] = "C:/xampp/htdocs/Varal/";
include_once $_SESSION["root"].'DAO/DatabaseConnection.php';
  
    $parametro = filter_input(INPUT_GET, "parametro");
    $dados = mysql_query("select * from campanha c, pessoa p group by id_campanha order by id_campanha desc");
   # $dados2 = mysql_query("select nome from pessoa");
    $linha = mysql_fetch_assoc($dados);
    #$linha2 = mysql_fetch_assoc($dados2);
    $total = mysql_num_rows($dados);
    if($linha == 0){
      echo "<h5>Não há campanhas cadastradas no momento</h5>";
    }
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


 <section id="comoajudar" class="home-section text-center">
         <div class="heading-about">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                     <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                           <h2>
                              Veja todas as campanhas
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

     <?php 
            if($total){do {
        ?>
<div class="clear">
<div class="row p-2">
  <div class="post-body">
    <div class="row">
      <div class="col PostTitle">
        <h4><a href="#"><?php echo $linha['tipo_camp']; ?>: <?php echo $linha['local_camp']; ?></a></h4>
        <div class="PostDate"><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($linha['inicio_camp'])); ?></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <a href="#">
            <?php      
              switch ($linha['tipo_camp']) {
                case "Varal Solidário":
                    echo "<div class='avatar'><img src='img/rsz_varal9.jpg' alt='' class='img-responsive img-circle' /></div>";
                    break;
                case "Geladeira Solidária":
                    echo "<div class='avatar'><img src='img/rsz_gela.jpg' alt='' class='img-responsive img-circle' /></div>";
                    break;
                case "Campanha do Agasalho":
                    echo "<div class='avatar'><img src='img/rsz_agasalho.jpg' alt='' class='img-responsive img-circle' /></div>";
                    break;
            }
            ?>            
        </a>
      </div>
      <div class="col-sm-6">      
        <p class="desc">Endereço: <?php echo $linha['endereco_camp']; ?></p>
        <p class="desc"><?php echo $linha['cidade_camp']; ?> - <?php echo $linha['estado_camp']; ?></p>
        <p><a class="btn btn-sm btn-success" href="<?php echo "engajar.php?id_campanha=".$linha['id_campanha'] ?>">Quero me engajar nessa campanha!</a></p>
      </div>
    </div>
    <div class="row">
      <div class="col text-center small p-2">
        <p>
          <i class="fa fa-thumbs-up"></i> <a href="#"><?php echo $linha['count_camp']; ?> pessoa(s) engajada(s)</a>
          | <i class="fa fa-tags"></i> Tags: <a href="#"><span class="badge badge-info"><?php echo $linha['tipo_camp']; ?></span><span class="badge badge-info"><?php echo $linha['estado_camp']; ?></span></a> 
        </p>
      </div>
    </div>
  </div>   
</div>
</hr>
</div>
<?php 
        }  while ($linha = mysql_fetch_assoc($dados));
            mysql_free_result($dados);
            ($link);
        }
         ?>
</div>
<br>
<br>
<br>
<h5><a href="criar_campanha.php#visualizar">clique para ver as campanhas que você criou</a></h5>
   </section>
      <!-- /Section: rodapé -->
      <?php
            include 'includes/footer.php';    
        ?>
