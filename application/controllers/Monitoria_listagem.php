<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Monitoria_listagem
 *
 * @author Andersonbk17
 */
class Monitoria_listagem extends CI_Controller{
    
    
    public function index() {
        $this->load->model('MonitoriaModel','monitoria');
        
        
        $lista = array("lista"=> $this->monitoria->listarTodos($this->session->userdata('idlo')));

        
        $opcaoLateral ['opcaoLateral']= "monitoria";
        $this->load->view('/monitoria/listagem',$lista);
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        
    }
    
}
