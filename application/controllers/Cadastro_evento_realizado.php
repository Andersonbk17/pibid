<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro_capacitacao
 *
 * @author Andersonbk17
 */
class Cadastro_evento_realizado extends CI_Controller{
    //put your code here
    
    
    
    public function index() {
        
        $opcaoLateral ['opcaoLateral']= "evento";
        $this->load->view('/eventos_realizados/cadastro');
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
           $this->load->view('/eventos_realizados/cadastro', $erros);
           
            $opcaoLateral ['opcaoLateral']= "evento";
            //$this->load->view('/bolsista/cadastro');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
        
           
           
        
           
           
           
         } else {
          
            $this->load->model('EventoRealizadoModel','evento');
            $this->load->helper('form');
            
            
            //RECEBENDO DADOS DO POST
            $dados['titulo'] = $this->input->post('nome');
            $dados['inicio'] = $this->input->post('inicio');
            $dados['termino'] = $this->input->post('termino');
            $dados['local'] = $this->input->post('local');
            $dados['descricao'] = $this->input->post('descricao');
            
            $dados['anexo'] = $this->input->post('anexo');
            $dados['idbolsista'] = $this->session->userdata('idlo');
            
            
            $nomeAluno = $this->session->userdata('usuario');
            //recebendo arquivo
            $anexo = $_FILES['anexo'];
            $configuracao = array(
                'upload_path'   => './uploads/eventos/',
                'allowed_types' => 'pdf',
                'file_name'     => $dados['titulo'].' - '.$nomeAluno.'pdf',
                'max_size'      => '5000'
            );      
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            $this->upload->do_upload('anexo');
            $dados['anexo'] = base_url() .'uploads/eventos/'.$dados['titulo'].'-'.$nomeAluno.'.pdf';
        
            
            
            //SALVANDO
            $this->evento->salvar($dados);
             
             $mensagem = true;
             $this->session->set_flashdata('mensagem','Seu produto foi cadastrado com sucesso.');
             //se tudo oks
            $opcaoLateral ['opcaoLateral']= "evento";
            
            $this->load->view('/eventos_realizados/cadastro',$mensagem);
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
            $this->load->library('form_validation');
             
             
             
        }
    }
}
