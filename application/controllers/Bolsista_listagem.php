<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of listagem
 *
 * @author Andersonbk17
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Bolsista_listagem extends CI_Controller{
    //put your code here
    public function index() {
                
        $this->load->model('BolsistaModel','bolsista');
        $resultado = $this->bolsista->listarTodos();
        $bolsistas = array("bolsistas"=> $resultado);
        
        
        
        $opcaoLateral ['opcaoLateral']= "bolsista";
        $this->load->view('/bolsista/listagem',$bolsistas);
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        
    }
    
    
      
    
    
    
    public function ver(){
        $this->load->model('BolsistaModel','bolsista');
        $resultado = $this->bolsista->listarTodos();
        
       
        var_dump($resultado);
        
    }
}
