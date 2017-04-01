<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Feira_listagem
 *
 * @author Andersonbk17
 */
class Feira_listagem extends CI_Controller{
    
    public function index() {
        $this->load->model('FeiraModel','feira');
        
        
        $lista = array("lista"=> $this->feira->listarTodos($this->session->userdata('idlo')));
        
        
        $opcaoLateral ['opcaoLateral']= "feira";
        $this->load->view('/feira/listagem',$lista);
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        
    }
    
}
