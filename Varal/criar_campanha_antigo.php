 <?php
  session_start();
  $_SESSION["root"] = "C:/xampp/htdocs/Varal/";
  include_once $_SESSION["root"].'DAO/DatabaseConnection.php';
     

#var_dump($_SESSION);

//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['email']) and !isset($_SESSION['senha']) ) {
  //Destrói
  session_destroy();
  header('location:login.php');//Redireciona para a página de autenticação
  //Limpa
  unset ($_SESSION['email']);
  unset ($_SESSION['senha']);
  
}
    $parametro = filter_input(INPUT_GET, "parametro");
    $id_campanha = filter_input(INPUT_GET, "id_campanha");
    $id_pessoa = filter_input(INPUT_GET, "id_pessoa");
    $user_id = strip_tags($_SESSION['id_pessoa']); 

    $dados = mysql_query("select * from campanha where user_id = '$user_id' order by id_campanha desc");
    
    #$user = mysql_query("select user_id from pessoa where user_id = '$user_id'");
    #echo "$user";
    $linha = mysql_fetch_assoc($dados);
    $total = mysql_num_rows($dados);

#header
    include 'includes/header.php';    
  #menu
    include 'includes/menu.php'; 
   
  ?>
   
 <script type="text/javascript">
   function valida_camp() {
     if(document.getElementById('local_camp').value == ''){
          alert('Favor inserir um Local.');
          document.getElementById('local_camp').focus();
          return false;
     }

if(document.getElementById('estado_camp').value == ''){
          alert('Favor inserir o local da campanha.');
          document.getElementById('estado_camp').focus();
          return false;
     }

if(document.getElementById('cidade_camp').value == ''){
          alert('Favor inserir uma cidade.');
          document.getElementById('cidade_camp').focus();
          return false;
     }

     if(document.getElementById('endereco_camp').value == ''){
          alert('Favor inserir um Endereço.');
          document.getElementById('endereco_camp').focus();
          return false;
     }
     if(document.getElementById('tipo_camp').value == ''){
          alert('Favor inserir o tipo da campanha.');
          document.getElementById('tipo_camp').focus();
          return false;
     }  

     if(document.getElementById('inicio_camp').value == ''){
          alert('Favor inserir a data do início da campanha.');
          document.getElementById('inicio_camp').focus();
          return false;
     }
   }
 </script>
    
      <!-- Section: como ajudar e ver campanhas -->
      
<section id="criar" class="home-section text-center">
         <div class="heading-about">
            <div class="container">
               <div class="row">
                  <div class="col-lg-8 col-lg-offset-2">
                     <div class="wow bounceInDown" data-wow-delay="0.4s">
                        <div class="section-heading">
                           <h2>
                              Cadastre uma campanha
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
 <form name="frmUser" action="salvar.php" onSubmit="return valida_camp();">
           <!--<div style="width:500px;">-->
               <div class="message">
                  <?php if(isset($message)) { echo $message;} 
                    ?>
               </div>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
     <div class="boxed-grey">
    <form role="form">
      <h2> <small>Preencha com as informações necessárias para criar uma nova campanha</small></h2>
      <hr class="colorgraph">
            <div class="form-group">
          <input type="text" name="local_camp" id="local_camp" class="form-control input-lg" placeholder="Local da Campanha" tabindex="3">
      </div>

      <div class="form-group">
        <input type="text" name="endereco_camp" id="endereco_camp" class="form-control input-lg" placeholder="Endereço Completo" tabindex="3">
      </div>

      <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
                        <input type="text" name="estado_camp" id="estado_camp" class="form-control input-lg" placeholder="Estado" tabindex="2">

          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
          <input type="text" name="cidade_camp" id="cidade_camp" class="form-control input-lg" placeholder="Cidade" tabindex="2">

          </div>
        </div>
            </div>
               
          <div class="form-group">
              <!--<input type="text" name="tipo_camp" id="tipo_camp" class="form-control input-lg" placeholder="Tipo de campanha" tabindex="2">-->
                        <select id="tipo_camp" name="tipo_camp"  class="form-control input-lg"  tabindex="3">
                            <option value="">Tipo de campanha</option>
                            <option value="Campanha do Agasalho">Campanha do Agasalho</option>
                            <option value="Varal Solidário">Varal Solidário</option>
                            <option value="Geladeira Solidária">Geladeira Solidária</option>
                        </select>
          </div>
                 
      
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
            Data:
          </div>
        </div>
        
        <div class="col-xs-6 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="date" name="inicio_camp" id="inicio_camp" class="form-control input-lg" placeholder="Início Campanha" tabindex="5">
          </div>
        </div>
        <!--DURAÇÃO? -->
      </div>
     
      <hr class="colorgraph">
      <div class="row">
        
        <div class="col-xs-12 col-md-12" <div id="form-content ">
        <button type="submit" class="btn btn-success btn-block btn-lg" id="submit ">Criar Campanha</button>
</div>
      </div>
      </div>
    </form>
    </div>
  </div>
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
                              Visualize suas campanhas
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
            <div style="width:1000px;">
             
         <div class="row">
            <div class="col-lg-18">
                <?php 
                    if($linha == 0){
                        echo "<h5>Não há campanhas cadastradas no momento</h5>";
                        echo "<h4><strong class='label'><a href=#criar>Crie uma nova campanha</a></strong></h4>";

                        echo "<h4><strong class='label'><a href=pesquisar_campanha.php>Veja campanhas já existentes</a></strong></h4>";
                    } else{  
                ?>
                <h5>Minhas campanhas</h5>     
                  <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Local</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <th>Endereço</th>
                            <th>Início</th>
                            <th>Tipo de Campanha</th>
                            <th>Curtidas</th>
                            <th>Opções</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                            if($total){do 
                                 {
                        ?>
                        <tr>    
                          <td><?php echo $linha['local_camp']; ?></td>
                          <td><?php echo $linha['estado_camp']; ?></td>
                          <td><?php echo $linha['cidade_camp']; ?></td>
                          <td><?php echo $linha['endereco_camp']; ?></td> 
                          <td><?php echo $linha['inicio_camp']; ?></td>
                          <td><?php echo $linha['tipo_camp']; ?></td>
                          <td><?php echo $linha['count_camp']; ?></td>
                          
                          <td><a href="<?php echo "editar_campanha.php?id_campanha=" .
                             $linha['id_campanha'] ?>" class="btn btn-primary">Editar</a></td>
                             
                           <td><a href="<?php echo "deletar.php?id_campanha=" . $linha['id_campanha'] ?>">Excluir</a> </td>
                           
                        </tr>
                        <?php 
                            }  while ($linha = mysql_fetch_assoc($dados));
                                //mysql_free_result($dados);
                               // mysql_close($mysqllink);
                        }
                        ?>
                        </tbody>
                        </table>
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
   <!--ALTERAR AQUI AS CAMPANHAS CRIADAS --> 
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
      <!-- /Section: rodapé -->
     <?php
            include $_SESSION["root"].'includes/footer.php';    
        ?>
