<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExperimentoModel
 *
 * @author Andersonbk17
 */
class ExperimentoModel extends CI_Model{
    //put your code here
    
    
    
    public function listarTodos($id){
        
        //$resultado  = $this->db->query('SELECT * FROM `bolsista_capacitacao` INNER JOIN bolsistas ON idbolsista = idbolsistas WHERE STATUS = 1')->result_array();
        $resultado  = $this->db->query('SELECT * FROM `bolsistas_experimentos` INNER JOIN bolsistas ON idbolsista = idbolsistas WHERE STATUS = 1 AND idbolsistas = '.$id)->result_array();
        return $resultado;
       
    }
    
    
     public function salvar($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('bolsistas_experimentos', $dados);
            
            //echo "salvo com sucesso";
        endif;
    }
}
