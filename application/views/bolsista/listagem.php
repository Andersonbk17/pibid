<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="col-md-10">
        <h1 class="page-header">BOLSISTAS</h1>
    </div>
    <div class="col-md-2">
        <a class="btn btn-primary btn-block"  href="<?php echo base_url() ?>Cadastro_bolsista">NOVO BOLSISTA</a>

    </div>

    <div class="col-md-12">
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>Telefone</th>
                <th>EMAIL</th>
                


            </tr>
            <?php
                foreach ($bolsistas as $b){
                    echo "<tr>";
                    echo "<td>".$b['idbolsistas']."</td>";
                    echo "<td>".$b['nome']."</td>";
                    echo "<td>".$b['telefone']."</td>";
                    echo "<td>".$b['email']."</td>";
                }
            
            ?>
            

        </table>


    </div>
</div>
</div>
</div>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
