<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tcc_listagem
 *
 * @author Andersonbk17
 */
class Tcc_listagem extends CI_Controller{
     public function index() {
        
        $this->load->model('TccModel','tcc');
        
        
        $lista = array("lista"=> $this->tcc->listarTodos($this->session->userdata('idlo')));
        
        
        $opcaoLateral ['opcaoLateral']= "tcc";
        $this->load->view('/tcc/listagem',$lista);
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        
    }
}
