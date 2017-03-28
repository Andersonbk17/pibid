<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Andersonbk17
 */
class LoginModel extends CI_Model{
    //put your code here
    
    
    public function verificarBolsista($email, $senha) {
        
        
      $sql = "SELECT * FROM bolsistas WHERE email = ? AND senha = ? AND STATUS = 1";
        $query = $this->db->query($sql, array($email, $senha));
	
        if($query->num_rows() > 0 && $query->num_rows() == 1){
            
            return $query->result_array();
        }else{
            
	    return false;
        }
    
    }
    
    public function verificarAdministrador($email, $senha) {
        
        
      $sql = "SELECT * FROM administradores WHERE email = ? AND senha = ? AND STATUS = 1";
        $query = $this->db->query($sql, array($email, $senha));
	
        if($query->num_rows() > 0 && $query->num_rows() == 1){
            return $query->result_array();
        }else{
	    return false;
        }
    
}
}
