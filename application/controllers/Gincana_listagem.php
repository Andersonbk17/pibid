<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gincana_listagem
 *
 * @author Andersonbk17
 */
class Gincana_listagem extends CI_Controller{

    
    public function index() {
        $this->load->model('GincanaModel','gincana');
        
        
        $lista = array("lista"=> $this->gincana->listarTodos($this->session->userdata('idlo')));

        
        $opcaoLateral ['opcaoLateral']= "gincana";
        $this->load->view('/gincana/listagem',$lista);
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        
    }
    
    
    
}
