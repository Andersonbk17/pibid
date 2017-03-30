<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro_manual_atividade
 *
 * @author Andersonbk17
 */
class Cadastro_manual_atividade extends CI_Controller{
    
    
     
    
    
    public function index() {
        
        $opcaoLateral ['opcaoLateral']= "manual";
        $this->load->view('/manual_atividade_pratica/cadastro');
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        $this->load->library('form_validation');
        
    }
    
    public function cadastrar(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('titulo', '[TITULO]', 'required|min_length[4]');
        $this->form_validation->set_rules('descricao', '[DESCRIÇÃO]', 'required|min_length[4]');
        $this->form_validation->set_rules('periodo', '[PERÍODO]', 'required|min_length[4]');
        
        
         if ($this->form_validation->run() == FALSE) {
           $erros = array('mensagens' => validation_errors());
           $this->load->view('/manual_atividade_pratica/cadastro', $erros);
           
            $opcaoLateral ['opcaoLateral']= "manual";
            //$this->load->view('/bolsista/cadastro');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
        
           
           
        
           
           
           
         } else {
              
            $this->load->model('ManualAtividadeModel','manual');
            $this->load->helper('form');
            
            
            //RECEBENDO DADOS DO POST
            $dados['titulo'] = $this->input->post('titulo');
            $dados['descricao'] = $this->input->post('descricao');
            $dados['periodo'] = $this->input->post('periodo');
            
            $dados['anexo'] = $this->input->post('anexo');
            $dados['idbolsista'] = $this->session->userdata('idlo');
            
            
            $nomeAluno = $this->session->userdata('usuario');
            //recebendo arquivo
            $anexo = $_FILES['anexo'];
            $configuracao = array(
                'upload_path'   => './uploads/manual_atividade_pratica/',
                'allowed_types' => 'pdf',
                'file_name'     => $dados['titulo'].' - '.$nomeAluno.'pdf',
                'max_size'      => '50000'
            );      
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            $this->upload->do_upload('anexo');
            $dados['anexo'] = base_url() .'uploads/manual_atividade_pratica/'.$dados['titulo'].'-'.$nomeAluno.'pdf';
        
            
            
            //SALVANDO
            $this->manual->salvar($dados);
             
             $mensagem = true;
             $this->session->set_flashdata('mensagem','Seu produto foi cadastrado com sucesso.');
             //se tudo oks
            $opcaoLateral ['opcaoLateral']= "manual";
            
            $this->load->view('/manual_atividade_pratica/cadastro',$mensagem);
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
            $this->load->library('form_validation');
             
             
             
             
             
             
             
             
             
        }
    }

    
    
    
    
}
