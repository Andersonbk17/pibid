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
        <link href=<?php base_url(); ?>"assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        
        
    </head>
    
    <body>
        <div class="container">    
                <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                    <div class="panel panel-info" >
                            <div class="panel-heading">
                                <div class="panel-title">Sign In</div>
                                
                            </div>     

                            <div style="padding-top:30px" class="panel-body" >

                                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                                <form id="loginform" class="form-horizontal" role="form">

                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Email">                                        
                                            </div>

                                    <div style="margin-bottom: 25px" class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                <input id="login-password" type="password" class="form-control" name="password" placeholder="Senha">
                                            </div>



                                    

                                        <div style="margin-top:10px" class="form-group">
                                            <!-- Button -->

                                            <div class="col-sm-12 controls">
                                              <a id="btn-login" href="#" class="btn btn-success">Login  </a>
                                              

                                            </div>
                                        </div>


                                        
                                    </form>     



                                </div>                     
                            </div>  
                </div>
                
            </div>
        </body>
</html>