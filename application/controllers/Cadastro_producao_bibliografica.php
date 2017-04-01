<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro_producao_bibliografica
 *
 * @author Andersonbk17
 */
class Cadastro_producao_bibliografica extends CI_Controller{
    public function index() {
        
        $opcaoLateral ['opcaoLateral']= "producao_bibliografica";
        $this->load->view('/producao_bibliografica/cadastro');
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        $this->load->library('form_validation');
        
    }
    
    public function cadastrar(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('titulo', '[Título]', 'required|min_length[3]');
        $this->form_validation->set_rules('tipo', '[TIPO]', 'required|min_length[3]');
        $this->form_validation->set_rules('referencia', '[REFERÊNCIA]', 'required|min_length[3]');
        
        
        
         if ($this->form_validation->run() == FALSE) {
           $erros = array('mensagens' => validation_errors());
           $this->load->view('/producao_bibliografica/cadastro', $erros);
           
            $opcaoLateral ['opcaoLateral']= "monitoria";
            //$this->load->view('/bolsista/cadastro');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
        
           
           
        
           
           
           
         } else {
              
            $this->load->model('ProducaoBibliograficaModel','producao');
            $this->load->helper('form');
            
            
            //RECEBENDO DADOS DO POST
            $dados['titulo'] = $this->input->post('titulo');
            $dados['tipo'] = $this->input->post('tipo');
            $dados['referencia'] = $this->input->post('referencia');
            
            
            $dados['anexo'] = $this->input->post('anexo');
            $dados['idbolsista'] = $this->session->userdata('idlo');
            
            
            $nomeAluno = $this->session->userdata('usuario');
            //recebendo arquivo
            $anexo = $_FILES['anexo'];
            $configuracao = array(
                'upload_path'   => './uploads/producao_bibliografica/',
                'allowed_types' => 'pdf',
                'file_name'     => $dados['titulo'].' - '.$nomeAluno.'pdf',
                'max_size'      => '50000'
            );      
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            $this->upload->do_upload('anexo');
            $dados['anexo'] = base_url() .'uploads/producao_bibliografica/'.$dados['titulo'].'-'.$nomeAluno.'pdf';
        
            
            
            //SALVANDO
            $this->producao->salvar($dados);
             
             $mensagem = true;
             $this->session->set_flashdata('mensagem','Seu produto foi cadastrado com sucesso.');
             //se tudo oks
            $opcaoLateral ['opcaoLateral']= "producao_bibliografica";
            
            $this->load->view('/producao_bibliografica/cadastro',$mensagem);
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
            $this->load->library('form_validation');
             
             
        }
    }
}
