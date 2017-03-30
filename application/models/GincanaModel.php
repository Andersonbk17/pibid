<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GincanaModel
 *
 * @author Andersonbk17
 */
class GincanaModel extends CI_Model{

    
     public function listarTodos($id){
        
        //$resultado  = $this->db->query('SELECT * FROM `bolsista_capacitacao` INNER JOIN bolsistas ON idbolsista = idbolsistas WHERE STATUS = 1')->result_array();
        $resultado  = $this->db->query('SELECT * FROM `bolsista_gincana` INNER JOIN bolsistas ON idbolsista = idbolsistas WHERE STATUS = 1 AND idbolsistas =  '.$id)->result_array();
        return $resultado;
       
    }
    
    
     public function salvar($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('bolsista_gincana', $dados);
            
            //echo "salvo com sucesso";
        endif;
    }
}
