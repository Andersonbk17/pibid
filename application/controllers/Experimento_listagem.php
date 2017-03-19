<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Experimento_listagem
 *
 * @author Andersonbk17
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Experimento_listagem extends CI_Controller{
    //put your code here
    
    public function index() {
        
        $opcaoLateral ['opcaoLateral']= "experimento";
        $this->load->view('/experimento/listagem');
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        
    }
}
