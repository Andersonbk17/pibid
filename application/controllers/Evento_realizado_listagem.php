<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Capacitacao_listagem
 *
 * @author Andersonbk17
 */
class Evento_realizado_listagem extends CI_Controller{
    //put your code here
    
    public function index() {

        $this->load->model('EventoRealizadoModel','evento');
        
        
        $lista = array("lista"=> $this->evento->listarTodos($this->session->userdata('idlo')));
        
        $opcaoLateral ['opcaoLateral']= "evento";
        $this->load->view('/eventos_realizados/listagem',$lista);
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        
    }
}
