<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Visita_tecnica_listagem
 *
 * @author Andersonbk17
 */
class Visita_tecnica_listagem extends CI_Controller{
     public function index() {
        $this->load->model('VisitaTecnicaModel','visita');
        
        
        $lista = array("lista"=> $this->visita->listarTodos($this->session->userdata('idlo')));
        
        
        $opcaoLateral ['opcaoLateral']= "visita_tecnica";
        $this->load->view('/visita_tecnica/listagem',$lista);
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        
    }
}
