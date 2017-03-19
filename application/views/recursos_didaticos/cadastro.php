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
        <h1 class="page-header">NOVO RECURSO DIDÁTICO</h1>
    </div>
    <!-- MENSAGEM DE CONFIRMAÇÂO
    <div class="col-md-12">
    <!-- Large modal 
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">
            Mensagem
    </button>

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                            Cadastro Realizado com Sucesso.
                    </div>
            </div>

            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                            Close
                    </button>
                    <button type="button" class="btn btn-primary">
                            Save changes
                    </button>
            </div>
    </div>

</div>
    -->



<!-- <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>-->

    <script type="text/javascript">
        //Códigos de mascaras com bibliotecas externas
        jQuery(function ($) {
            $("#nascimentoBolsista").mask("99/99/9999");


        });
    </script>



    <script type="text/javascript" >
        //$("#navegacao").toggleClass("active");
        $('#home').attr('class', 'active');



        //if($('#localTrabalhoBolsista').val().get() == );
    </script>

    <script type="text/javascript">

        $(document).ready(function () {
            $("#cpfBolsista").mask("999.999.999-99");
            $("#dataExpedicaoBolsista").mask("99/99/9999");
            $("#cpfBolsista").mask("999.999.999-99");
            $("#cpfMae").mask("999.999.999-99");
            $("#cpfResponsavel").mask("999.999.999-99");
        });
    </script>

    <script type="text/javascript">

        $(document).ready(function () {


            $("form").submit(function (event) {
               // $("#myModal").modal("show");//mostra o modal
               //confirm("Você Tem certeza que deseja salvar?");
            });


        });
    </script>




    <div class="col-md-12" >
        <form  id="form" action="<?php echo base_url(); ?>Cadastro_recursos_didaticos/cadastrar" method="post">

            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Dados do Recurso Didático Construído</h3>
              </div>
              <div class="panel-body">
                
                  <div class="form-group">
                    <label for="nome">Nome *</label>
                    <input type="text" class="form-control" id="nome"  name="nome"placeholder="Nome do recurso">
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="descricao">Descrição *</label>
                    
                    <textarea class="form-control" id="descricao" name="descricao" placeholder="BREVE DESCRIÇÃO MÁXIMO 100 PALAVRAS" rows="6"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="anexo">Anexo *</label>
                    <input type="file" class="form-control" id="anexo" name="anexo" >
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


