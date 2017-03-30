<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Manual_atividade_listagem
 *
 * @author Andersonbk17
 */
class Manual_atividade_listagem extends CI_Controller{
    //put your code here
    
    
    public function index() {
        $this->load->model('ManualAtividadeModel','manual');
        
        
        $lista = array("lista"=> $this->manual->listarTodos($this->session->userdata('idlo')));

        
        $opcaoLateral ['opcaoLateral']= "manual";
        $this->load->view('/manual_atividade_pratica/listagem',$lista);
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        
    }
    
}
