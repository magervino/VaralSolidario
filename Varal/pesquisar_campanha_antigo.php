  <?php
session_start();
$_SESSION["root"] = "C:/xampp/htdocs/Varal/";
include_once $_SESSION["root"].'DAO/DatabaseConnection.php';
  
    $parametro = filter_input(INPUT_GET, "parametro");
    $dados = mysql_query("select * from campanha order by id_campanha desc;");
    $linha = mysql_fetch_assoc($dados);
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

<!-- /Section: todas campanhas do sistema -->
      
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
    <div class="row">
      <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
        <ul class="event-list" >
        <?php 
            if($total){do {
        ?>
          <li>
            <time datetime="2014-07-20">
              <span class="month">De:</span>
              <span class="day"><?php echo $linha['inicio_camp']; ?></span>
              <span class="month"> - </span>
              <span class="month">Até:</span>
              <span class="day"><?php echo $linha['fim_camp']; ?></span>

            </time>
            <div class="info">
              <h2 class="title"><?php echo $linha['tipo_camp']; ?>: <?php echo $linha['local_camp']; ?></h2>
              <p class="desc">Endereço: <?php echo $linha['endereco_camp']; ?></p>
              <p class="desc"><?php echo $linha['cidade_camp']; ?> - <?php echo $linha['estado_camp']; ?></p>
              <ul>
                <li style="width:50%;"><span class="fa fa-envelope"></span> <?php echo $linha['email_camp']; ?></li>
                <li style="width:50%;"><span class="fa fa-phone"></span> <?php echo $linha['phone_camp']; ?></li>
              </ul>
            </div>
            <div class="social">
              <ul>
              <p></p>
              <li>
              <td><a href="<?php echo "engajar.php?id_campanha=".$linha['id_campanha'] ?>" class="fa fa-thumbs-up" ></a></td></li>
             <li style="width:100%;"><span></span> <?php echo $linha['count_camp']; ?></li>
                             
           
               <!--  <li class="engage" style="width:34%;"><a href="#twitter"><span class="fa fa-twitter"></span></a></li>-->
              </ul>
            </div>
          </li>
            
         
        <?php 
        }  while ($linha = mysql_fetch_assoc($dados));
            mysql_free_result($dados);
            ($link);
        }


         ?>
        </ul>
        <br></br>
        <h5><a href="criar_campanha.php#visualizar">clique para ver as campanhas que você criou</a></h5>
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
    
    
    <div class="row">
      <div class="col-lg-2 col-lg-offset-5">
        <hr class="marginbot-50">
      </div>
    </div>
  
        <!--tirar?? -->
        <div class="row">
            <div class="center-block">
        <div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                    <div class="inner">
            <h5>Ribeirão Preto - SP</h5>
                        <p class="subtitle">Lindalva Bento da Silva pegou peças para levar ao filho</p>
                        
                    </div>
                </div>
        </div>
            </div>  
        
        </div>       
          
    </div>
     
  </section>
  
   
   
   
   
   
      <!-- /Section: rodapé -->
      <?php
            include 'includes/footer.php';    
        ?>
