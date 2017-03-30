<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro_gincana
 *
 * @author Andersonbk17
 */
class Cadastro_gincana extends CI_Controller{
    
    public function index() {
        
        $opcaoLateral ['opcaoLateral']= "gincana";
        $this->load->view('/gincana/cadastro');
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        $this->load->library('form_validation');
        
    }
    
    
    public function cadastrar(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('tema', '[TEMA]', 'required|min_length[4]');
        $this->form_validation->set_rules('data', '[DATA]', 'required');
        $this->form_validation->set_rules('publico_alvo', '[PÚBLICO ALVO]', 'required|min_length[3]');
        $this->form_validation->set_rules('sintese', '[SINTESE]', 'required');
        $this->form_validation->set_rules('local', '[LOCAL]', 'required|min_length[2]');
        
        
        
         if ($this->form_validation->run() == FALSE) {
           $erros = array('mensagens' => validation_errors());
           $this->load->view('/gincana/cadastro', $erros);
           
            $opcaoLateral ['opcaoLateral']= "gincana";
            //$this->load->view('/bolsista/cadastro');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
        
           
         } else {
           
             
            $this->load->model('GincanaModel','gincana');
            $this->load->helper('form');
            
            
            //RECEBENDO DADOS DO POST
            $dados['tema'] = $this->input->post('tema');
            $dados['data'] = $this->input->post('data');
            $dados['publico_alvo'] = $this->input->post('publico_alvo');
            $dados['local'] = $this->input->post('local');
            $dados['sintese'] = $this->input->post('sintese');
            $dados['anexo'] = $this->input->post('anexo');
            $dados['idbolsista'] = $this->session->userdata('idlo');
            
            
            $nomeAluno = $this->session->userdata('usuario');
            //recebendo arquivo
            $anexo = $_FILES['anexo'];
            $configuracao = array(
                'upload_path'   => './uploads/gincana/',
                'allowed_types' => 'pdf',
                'file_name'     => $dados['tema'].' - '.$nomeAluno.'pdf',
                'max_size'      => '5000'
            );      
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            $this->upload->do_upload('anexo');
            $dados['anexo'] = base_url() .'uploads/gincana/'.$dados['tema'].'-'.$nomeAluno.'.pdf';
        
            
            
            //SALVANDO
            $this->gincana->salvar($dados);
             
             $mensagem = true;
             $this->session->set_flashdata('mensagem','Seu produto foi cadastrado com sucesso.');
             //se tudo oks
            $opcaoLateral ['opcaoLateral']= "gincana";
            
            $this->load->view('/gincana/cadastro',$mensagem);
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
            $this->load->library('form_validation');
        }
    }
    
    
}
