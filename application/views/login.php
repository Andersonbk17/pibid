<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<html>
    <head>
        <!-- Bootstrap core CSS -->
        
        
    </head>
    
    <body>
        <div class="container">    
            <link href=<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css rel="stylesheet">
            
            
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
                    . "iziToast.error({
                    title: 'Error',
                    message: 'Por Favor Confira o emal/senha',
                icon: 'icon-person'
                });</script>";
            
            
            
            echo "<br />";
            echo "<div class='alert alert-danger' role='alert'> ";

            echo 'USUÁRIO/SENHA NÃO ENCONTRADO !';
            echo "</div>";
        }
    ?>        
    
                <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                    <div class="panel panel-info" >
                            <div class="panel-heading">
                                <div class="panel-title">Sign In</div>
                                
                            </div>     

                            <div style="padding-top:30px" class="panel-body" >

                                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                                <form id="loginform" class="form-horizontal" role="form" action="<?php echo base_url(); ?>Login/logar" method="post">

                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input id="login-username" type="email" class="form-control" name="username" value="" placeholder="Email" required="">                                        
                                            </div>

                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input id="login-password" type="password" class="form-control" name="password" placeholder="Senha" required="">
                                            </div>



                                    

                                        <div style="margin-top:10px" class="form-group">
                                            <!-- Button -->

                                            <div class="col-sm-12 controls">
                                              <button type="submit" id="salvar" class="btn btn-success" >
            <!-- <button type="submit" id="salvar" class="btn btn-success" data-toggle="modal" data-target="#myModal"> -->
                                                LOGAR
                                            </button>
                                              

                                            </div>
                                        </div>


                                        
                                    </form>     



                                </div>                     
                            </div>  
                </div>
                
            </div>
        </body>
</html>