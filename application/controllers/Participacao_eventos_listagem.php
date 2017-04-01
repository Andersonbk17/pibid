<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Participacao_eventos_listagem
 *
 * @author Andersonbk17
 */
class Participacao_eventos_listagem extends CI_Controller{
    
       public function index() {
        $this->load->model('ParticipacaoEventosModel','eventos');
        
        
        $lista = array("lista"=> $this->eventos->listarTodos($this->session->userdata('idlo')));

        
        $opcaoLateral ['opcaoLateral']= "participacao_eventos";
        $this->load->view('/participacao_eventos/listagem',$lista);
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        
    }
 
    
    
}
