<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producao_bibliografica_listagem
 *
 * @author Andersonbk17
 */
class Producao_bibliografica_listagem extends CI_Controller{
       public function index() {
        $this->load->model('ProducaoBibliograficaModel','producao');
        
        
        $lista = array("lista"=> $this->producao->listarTodos($this->session->userdata('idlo')));
        
        
        $opcaoLateral ['opcaoLateral']= "producao_bibliografica";
        $this->load->view('/producao_bibliografica/listagem',$lista);
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        
    }
}
