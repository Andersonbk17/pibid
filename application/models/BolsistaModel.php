<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BolsistaModel
 *
 * @author Andersonbk17
 */
class BolsistaModel extends CI_Model{
    //put your code here
    
    public function listarTodos(){
        
        $resultado  = $this->db->query('SELECT idbolsistas,nome,telefone,email FROM bolsistas WHERE STATUS = 1')->result_array();
        return $resultado;
       
    }
    
    
      public function salvar($dados = NULL) {
        if ($dados != NULL):
            $this->db->insert('bolsistas', $dados);
            
            echo "salvo com sucesso";
        endif;
    }
}
