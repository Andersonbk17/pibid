<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="col-md-9">
        <h1 class="page-header">REALIZAÇÃO DE MONITORIAS</h1>
    </div>
    <div class="col-md-3">
        <a class="btn btn-primary btn-block"  href="<?php echo base_url() ?>Cadastro_monitoria">NOVA MONITORIA</a>

    </div>

    <div class="col-md-12">
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>ÁREA</th>
                <th>INICIO</th>
                <th>TERMINO</th>
                <th>PÚBLICO ALVO</th>
                


            </tr>
             <?php
                foreach ($lista as $l){
                    echo "<tr>";
                    echo "<td>".$l['idbolsista_monitorias']."</td>";
                    echo "<td>".$l['area']."</td>";
                    echo "<td>".$l['inicio']."</td>";
                    echo "<td>".$l['termino']."</td>";
                    echo "<td>".$l['publico_alvo']."</td>";
                    
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
