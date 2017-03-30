<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reursos_didaticos_listagem
 *
 * @author Andersonbk17
 */
class Recursos_didaticos_listagem extends CI_Controller{
    //put your code here
    
    public function index() {
        
        $this->load->model('RecursosDidaticosModel','didaticos');
        
        
        $lista = array("lista"=> $this->didaticos->listarTodos($this->session->userdata('idlo')));
        
        
        $opcaoLateral ['opcaoLateral']= "recursos_didaticos";
        $this->load->view('/recursos_didaticos/listagem',$lista);
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        
    }
}
