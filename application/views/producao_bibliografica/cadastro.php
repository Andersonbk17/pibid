<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <?php
    /*
                    CODIGO DE VALIDAÇÕES
     */
    
     $this->load->library('form_validation');

    
    if(validation_errors() !=NULL){        //se tiver erros na validação mostrar essa parada aki
        echo "<br />";
	echo "<div class='alert alert-danger' role='alert'> ";
        
         if(isset($mensagens)) echo $mensagens; 
	echo "</div>";
    }
    
    
    ?>
    
    <div class="col-md-12">
        <h1 class="page-header">NOVA PRODUÇÃO BIBLIOGRÁFICA</h1>
    </div>
    
    
      
    <!-- EFEITO NA MENSAGEM DE CONFIRMAÇÂO-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/izitoast/dist/css/iziToast.min.css"> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/izitoast/dist/css/icomoon.css"> 
        <script src="<?php echo base_url(); ?>assets/izitoast/dist/js/iziToast.min.js" type="text/javascript"></script>
    
    
    
    
    <?php 

  
    if(isset($_SESSION['mensagem'])){        //se tiver erros na validação mostrar essa parada aki
        
            echo "<script type='text/javascript'>"
            . ""
                    . ""
                    . ""
                    . "iziToast.success({
                    title: 'OK',
                    message: 'Cadastrado com Sucesso!'
                
                });</script>";
    }
?>
    

    <div class="col-md-12" >
        <form  id="form" action="<?php echo base_url(); ?>Cadastro_producao_bibliografica/cadastrar" method="post" method="post" enctype="multipart/form-data">

            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Dados da Produção Bibliográfica</h3>
              </div>
              <div class="panel-body">
                
                  <div class="form-group col-md-12">
                    <label for="titulo">Título *</label>
                    <input type="text" class="form-control" id="titulo"  name="titulo" placeholder="Título">
                  </div>
                  
                  
                  
                  <div class="form-group col-md-12">
                    <label for="tipo">Tipo *</label>
                    <input type="text" class="form-control" id="tipo"  name="tipo" placeholder="Resumo, Artigo, Relato etc..." required="">
                  </div>
                  
                  <div class="form-group col-md-12">
                    <label for="referencia">Referência *</label>
                    <input type="text" class="form-control" id="referencia"  name="referencia" placeholder="Referência" required="">
                  </div>
                  
                  
                  
                  <div class="form-group col-md-12">
                    <label for="anexo">Anexo *</label>
                    <input type="file" class="form-control" id="anexo" name="anexo" required="" >
                  </div>
                  
                  
                  
              </div>
            </div>

    <!-- BOTOES DE ENVIO E CANCELAMENTO-->
    <div style="text-align: right; alignment-adjust: baseline;  ">
        <button type="submit" id="salvar" class="btn btn-success" >
            <!-- <button type="submit" id="salvar" class="btn btn-success" data-toggle="modal" data-target="#myModal"> -->
            Enviar
        </button>
        <button type="reset" class="btn btn-default">
            Cancelar
        </button>
    </div>





    <!-- PARTE DA TELA DE CONFIRMAÇÃO DE ENVIO DE FORMULARIO MODAL BOOTSTRAP -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Verificar Informações</h4>
                </div>
                <div class="modal-body">
                    Você Tem certeza que deseja salvar o bosista?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- FIM PARTE DA TELA DE CONFIRMAÇÃO DE ENVIO DE FORMULARIO MODAL BOOTSTRAP -->

</form>
</div>

</div>
</div>
</div>


