
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="<?php echo base_url()?>Principal">PIBID FÍSICA</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Mensagens</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Configurações</a></li>
            
            <li><a href="#"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Ajuda</a></li>
            <li><a id="botaoSair" href="<?php echo base_url()?>login"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Sair</a></li>
          </ul>
            <!--
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Busca...">
          </form>
            -->
        </div>
      </div>
    </nav>


<!-- MENU LATERAL criar outro arquivo depos </-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
              <li <?php if($opcaoLateral == "principal") {echo 'class="active"';}?>><a href="<?php echo base_url() ?>Principal">Tela Inicial <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Relatórios</a></li>
            <li <?php if($opcaoLateral == "bolsista") {echo 'class="active"';}?>><a href="<?php echo base_url() ?>Bolsista_listagem">Bolsistas</a></li>
            <li <?php if($opcaoLateral == "capacitacao") {echo 'class="active"';}?>><a href="<?php echo base_url() ?>Capacitacao_listagem">Capacitação</a></li>
            <li <?php if($opcaoLateral == "experimento") {echo 'class="active"';}?>><a href="<?php echo base_url() ?>Experimento_listagem">Experimentos</a></li>
            <li <?php if($opcaoLateral == "recursos_didaticos") {echo 'class="active"';}?>><a href="<?php echo base_url() ?>Recursos_didaticos_listagem">Recursos didáticos</a></li>
            </ul>
            
            
         
        <!--
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </-->      
        </div>
    