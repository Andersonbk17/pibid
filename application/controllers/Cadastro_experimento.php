<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro_experimento
 *
 * @author Andersonbk17
 */
class Cadastro_experimento extends CI_Controller{
    //put your code here
    
    
    
    public function index() {
        
        $opcaoLateral ['opcaoLateral']= "experimento";
        $this->load->view('/experimento/cadastro');
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        $this->load->library('form_validation');
        
    }
    
    public function cadastrar(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('descricao', '[DESCRIÇÃO]', 'required');
        $this->form_validation->set_rules('nome', '[NOME]', 'required|min_length[4]');
        
        
         if ($this->form_validation->run() == FALSE) {
           $erros = array('mensagens' => validation_errors());
           $this->load->view('/experimento/cadastro', $erros);
           
            $opcaoLateral ['opcaoLateral']= "experimento";
            //$this->load->view('/bolsista/cadastro');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
        
           
           
        
           
           
           
         } else {
              
            $this->load->model('ExperimentoModel','experimento');
            $this->load->helper('form');
            
            
            //RECEBENDO DADOS DO POST
            $dados['titulo'] = $this->input->post('nome');
            $dados['descricao'] = $this->input->post('descricao');
            
            $dados['anexo'] = $this->input->post('anexo');
            $dados['idbolsista'] = $this->session->userdata('idlo');
            
            
            $nomeAluno = $this->session->userdata('usuario');
            //recebendo arquivo
            $anexo = $_FILES['anexo'];
            $configuracao = array(
                'upload_path'   => './uploads/experimento/',
                'allowed_types' => 'pdf',
                'file_name'     => $dados['titulo'].' - '.$nomeAluno.'pdf',
                'max_size'      => '50000'
            );      
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            $this->upload->do_upload('anexo');
            $dados['anexo'] = base_url() .'uploads/experimento/'.$dados['titulo'].'-'.$nomeAluno.'pdf';
        
            
            
            //SALVANDO
            $this->experimento->salvar($dados);
             
             $mensagem = true;
             $this->session->set_flashdata('mensagem','Seu produto foi cadastrado com sucesso.');
             //se tudo oks
            $opcaoLateral ['opcaoLateral']= "experimento";
            
            $this->load->view('/experimento/cadastro',$mensagem);
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
            $this->load->library('form_validation');
             
             
             
             
             
             
             
             
             
        }
    }
}
