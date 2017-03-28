<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro_bolsista
 *
 * @author Andersonbk17
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class Cadastro_bolsista extends CI_Controller{
    //put your code here
    public function index() {
        
        $opcaoLateral ['opcaoLateral']= "bolsista";
        $this->load->view('/bolsista/cadastro');
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        $this->load->library('form_validation');
        
    }
    
    public function cadastrar(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', '[Email]', 'required|valid_email');
        $this->form_validation->set_rules('telefone', '[TELEFONE]', 'required');
        $this->form_validation->set_rules('nome', '[NOME]', 'required');
        $this->form_validation->set_rules('senha', '[SENHA]', 'required|min_length[4]');
        $this->form_validation->set_rules('repetir', '[REPETIR SENHA]', 'required|min_length[4]|matches[senha]');
        
         if ($this->form_validation->run() == FALSE) {
           $erros = array('mensagens' => validation_errors());
           $this->load->view('/bolsista/cadastro', $erros);
           
            $opcaoLateral ['opcaoLateral']= "bolsista";
            //$this->load->view('/bolsista/cadastro');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
          
         } else {
            $this->load->model('BolsistaModel','bolsista');
            $this->load->helper('form');
            
            
            //RECEBENDO DADOS DO POST
            $dados['nome'] = $this->input->post('nome');
            $dados['telefone'] = $this->input->post('telefone');
            $dados['email'] = $this->input->post('email');
            $dados['senha'] = $this->input->post('senha');
            $dados['status'] = $this->input->post('status');
            
            
            //SALVANDO
            $this->bolsista->salvar($dados);
             
             
             //se tudo oks
            
            
            
        $opcaoLateral ['opcaoLateral']= "bolsista";
        $salvo = true;
        $this->load->view('/bolsista/cadastro',$salvo);
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        $this->load->library('form_validation');
             
             
                
        }
    }
}
