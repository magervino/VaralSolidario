<?php 
 session_start();
  $_SESSION["root"] = "C:/xampp/htdocs/Varal/";
  #include_once("autentica_login.php");  
  include_once $_SESSION["root"].'DAO/DatabaseConnection.php';
  //Caso o usuário não esteja autenticado, limpa os dados e redireciona


    $parametro = filter_input(INPUT_GET, "parametro");
    $id_campanha = filter_input(INPUT_GET, "id_campanha");
    $id_pessoa = filter_input(INPUT_GET, "id_pessoa");
    
    $id_pessoa = strip_tags($_SESSION['id_pessoa']); 
    $nome = strip_tags($_SESSION['nome']); 
    $email = strip_tags($_SESSION['email']); 
    $user_id = strip_tags($_SESSION['id_pessoa']); 

    $dados = mysql_query("select * from pessoa where id_pessoa = '$id_pessoa'");

    #$dados = mysql_query("select * from campanha where user_id = '$user_id'");
    $dados_camp = mysql_query("select * from campanha where user_id = $id_pessoa");
    $total = mysql_num_rows($dados_camp);
    mysql_free_result($dados_camp);
    #var_dump($_SESSION);
    #var_dump($dados_camp);
    #die();

    $engajei_query = mysql_query("select * from likes where id_pessoa = $user_id");
    $total_engaj = mysql_num_rows($engajei_query);

    $likes_query = "select SUM(count_camp) from campanha";
    $total_likes = mysql_query($likes_query) or die(mysql_error());
    
    $media_query = "select AVG(count_camp) from campanha";
    $total_media = mysql_query($media_query) or die(mysql_error());;

    $dados_user = mysql_query("select * from pessoa");
    $total_user = mysql_num_rows($dados_user);


if ( !isset($_SESSION['email']) and !isset($_SESSION['senha']) ) {
  //Destrói
  session_destroy();
  header('location:login.php');//Redireciona para a página de autenticação
  //Limpa
  unset ($_SESSION['email']);
  unset ($_SESSION['senha']);
  
}
    /*$id_pessoa = filter_input(INPUT_GET, "id_pessoa");
    #$nome = filter_input(INPUT_GET, "nome");
    #$email = filter_input(INPUT_GET, "email");
    #$nome = strip_tags($_SESSION['nome']); 
    #$nome = $_POST['nome'];
    #$email = $_POST['email'];
    #echo $id_pessoa;*/
    
    
    $dados = mysql_query("select * from campanha where user_id = '$user_id' order by id_campanha desc");    
    $linha = mysql_fetch_assoc($dados);
    $total = mysql_num_rows($dados);

    //campanhas que engajei
    $dados2 = mysql_query("select * from campanha where id_campanha in (select id_campanha from likes where id_pessoa = $user_id) ");
    $linha2 = mysql_fetch_assoc($dados2);
    $total2 = mysql_num_rows($dados2);

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

<!-- Section: relatório por pessoa -->      
    <section id="comoajudar" class="home-section text-center">
    <div class="heading-about">
      <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="wow bounceInDown" data-wow-delay="0.4s">
          <div class="section-heading">
          <h2>Meu Perfil</h2>
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

        <div class="row">
            <div class="col-md-6">
        <div class="wow bounceInUp" data-wow-delay="0.2s">
                <div class="team boxed-grey">
                    <div class="inner">
                    <!--<h4>Oi, <?php #echo $nome; ?>!</h4>-->
            <h4>Sobre minhas campanhas</h4>
                        <ul>
                        <p class="subtitle"><?php echo $total;?> campanha(s) ativa(s) no momento.
                        <a href="visualizar_pessoa.php#ver"></p>
                        <p>Veja mais detalhes</a></li> ou 
                        <a href="criar_campanha.php"> crie uma nova campanha.</a></p>
                        </ul>
                    </div>
                </div>
        </div>
            </div>
            
            <div class="col-md-6">
        <div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
            <h4>Participação em outras campanhas</h4>
                        <ul>
                        <!--<p class="subtitle">Já me engajei em <?php echo $total_engaj ?> campanhas.</p>
                        <p class="subtitle">São elas: </a></p>-->
                        <p class="subtitle">Já me engajei em <?php echo $total_engaj;?> campanha(s).
                        <a href="visualizar_pessoa.php#engajada"></p>
                        <p>Campanhas que me engajei</a></li> ou 
                        <a href="pesquisar_campanha.php"> Todas campanhas ativas.</a></p>

                        </ul>
                    
                    </div>
                </div>
        </div>
            </div>         
        </div>    
    </div>
  </section>

   
<!-- Section: editar cadastro -->
 <section id="comoajudar" class="home-section text-center">
         <div class="heading-about">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                     <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                           <h3>
                              Meus dados
                           </h3>

 <div class="modal-body">
              <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
    <form action="<?php echo "editar_pessoa.php?id_pessoa=".$id_pessoa ?>" role="form" method="POST" name="frmPessoa" onSubmit="return valida_campos();" >
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6"></div>     
      <div class="form-group">
        <input type="text" name="nome" id="nome" class="form-control input-lg" value="<?php echo $nome; ?>" placeholder="Nome">
      </div>
      <div class="form-group">
        <input type="text" name="email" id="email" class="form-control input-lg" value="<?php echo $email; ?>" placeholder="E-mail">
      </div>
      <div class="form-group">
        <input type="password" name="senha" id="senha" class="form-control input-lg" placeholder="Insira uma nova senha" tabindex="4">
      </div>
      <div class="form-group">
        <input type="password" name="senha_conf" id="senha_conf" class="form-control input-lg" placeholder="Confirme a senha" tabindex="4">
      </div> 
      <hr class="colorgraph">
      <div class="row">   
        <div class="col-xs-12 col-md-12" <div id="form-content ">
        <button type="submit" class="btn btn-success btn-block btn-lg" id="submit ">EDITAR MEU PERFIL</button>

        <!--<a href="<?php #echo "editar_pessoa.php?id_pessoa=".$id_pessoa ?>"> Editar</a>-->
        

</div>
      </div>
      
    </form>
  </div>
</div>


      </section>


      <!-- /Section: todas campanhas criadas pelo usuário -->
 <section id="visualizar" class="home-section text-center">
         <div class="heading-about">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                     <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                           
                           <h2>
                              Minhas campanhas
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
       <div class="boxed-grey">
         <?php 
                    if($linha == 0){
                        echo "<h5>Não há campanhas cadastradas no momento</h5>";
                        echo "<h4><strong class='label'><a href=#criar>Crie uma nova campanha</a></strong></h4>";

                        echo "<h4><strong class='label'><a href=pesquisar_campanha.php>Veja campanhas já existentes</a></strong></h4>";
                    } else{  
                ?>

        <form>
            <div class="row">
            <div class="near_by_hotel_wrapper">
            <div class="near_by_hotel_container">
              <table class="table table-fixed no-border custom_table dataTable no-footer dtr-inline">
                  <thead>
                      <tr>
                          <th>Local</th>
                          <th>Endereço</th>
                          <th>Cidade</th>
                          <th>Estado</th>
                          <th>Início</th>
                          <th>Tipo de Campanha</th>
                          <th>Curtidas</th>
                          <th>Opções</th>
                      </tr>
                  </thead>
              <tbody>
                <?php if($total){do { ?>
                          <tr>    
                            <td><?php echo $linha['local_camp']; ?></td>
                            <td><?php echo $linha['endereco_camp']; ?></td> 
                            <td><?php echo $linha['cidade_camp']; ?></td>
                            <td><?php echo $linha['estado_camp']; ?></td>                     
                            <td><?php echo date('d/m/Y', strtotime($linha['inicio_camp'])); ?></td>
                            <td><?php echo $linha['tipo_camp']; ?></td>
                            <td><?php echo $linha['count_camp']; ?></td>
                            <td>
                                <a href="<?php echo "editar_campanha.php?id_campanha=" .
                             $linha['id_campanha'] ?>" class="update btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span></a>
                               
                                <a href="<?php echo "deletar.php?id_campanha=" . $linha['id_campanha'] ?>" class="delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></a>                             

                              <!--  <button type="button" data-toggle="modal" data-target="#delete" data-uid="1" class="delete btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>-->
                            </td>
                            </tr>
                            
                          <?php 
                              }  while ($linha = mysql_fetch_assoc($dados));
                          }
                          ?>
                          </tbody>

    </table>
    <h5><a href="pesquisar_campanha.php">clique para ver todas as campanhas</a></h5>
                        <?php }?>
  </div>
  </div>
  </div>
</div>
</form>
</div>

     </section>
       <!-- /Section: todas campanhas que usuário engajou-->
     <section id="engajada" class="home-section text-center">
         <div class="heading-about">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                     <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                           <h2>
                              Campanhas que engajei
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
         <div class="boxed-grey">
         <form name="frmUser" method="post" action="">
            <!--<div style="width:1000px;">-->
             
         <div class="row">
         <div class="near_by_hotel_wrapper">
            <div class="near_by_hotel_container">
            <div class="col-lg-18">
                <?php 
                    if($linha2 == 0){
                        echo "<h5>Você ainda não está engajado em nenhuma campanha.</h5>";
                        echo "<h4><strong class='label'><a href=#criar>Crie uma nova campanha</a></strong></h4>";

                        echo "<h4><strong class='label'><a href=pesquisar_campanha.php>Enjaje-se em campanhas já existentes</a></strong></h4>";
                    } else{  
                ?>  
                  
              <table class="table table-fixed no-border custom_table dataTable no-footer dtr-inline">
                        <thead>
                          <tr>
                            <th>Local</th>
                          <th>Endereço</th>
                          <th>Cidade</th>
                          <th>Estado</th>
                          <th>Início</th>
                          <th>Tipo de Campanha</th>
                          <th>Curtidas</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if($total2){do 
                                 {
                        ?>
                        <tr>    
                          <td><?php echo $linha2['local_camp']; ?></td>
                            <td><?php echo $linha2['endereco_camp']; ?></td> 
                            <td><?php echo $linha2['cidade_camp']; ?></td>
                            <td><?php echo $linha2['estado_camp']; ?></td>                     
                            <td><?php echo date('d/m/Y', strtotime($linha2['inicio_camp'])); ?></td>
                            <td><?php echo $linha2['tipo_camp']; ?></td>
                            <td><?php echo $linha2['count_camp']; ?></td>
                        </tr>
                        <?php 
                            }  while ($linha2 = mysql_fetch_assoc($dados2));
                                //mysql_free_result($dados);
                               // mysql_close($mysqllink);
                        }
                        ?>
                        </tbody>
                        </table>
                        </div>
                        </div>
                        <h5><a href="pesquisar_campanha.php">clique para ver todas as campanhas</a></h5>
                        <?php }?>
                 <!-- <h5><a href="pesquisar_campanha.php">clique para ver todas as campanhas</a></h5>-->
                  </div>
               </div>
            </div>
        </form>
        </div>
        </div>
      </section>
      <!-- /Section: rodapé -->
      <?php
            include 'includes/footer.php';    
        ?>