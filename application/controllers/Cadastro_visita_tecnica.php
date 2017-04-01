<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro_visita_tecnica
 *
 * @author Andersonbk17
 */
class Cadastro_visita_tecnica extends CI_Controller{
       public function index() {
        
        $opcaoLateral ['opcaoLateral']= "visita_tecnica";
        $this->load->view('/visita_tecnica/cadastro');
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        $this->load->library('form_validation');
        
    }
    
    public function cadastrar(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('local', '[LOCAL]', 'required|min_length[3]');
        $this->form_validation->set_rules('objetivo', '[OBJETIVO]', 'required');
        $this->form_validation->set_rules('data', '[DATA]', 'required');
        $this->form_validation->set_rules('participantes', '[PARTICIPANTES]', 'required');
        
        
        
         if ($this->form_validation->run() == FALSE) {
           $erros = array('mensagens' => validation_errors());
           $this->load->view('/visita_tecnica/cadastro', $erros);
           
            $opcaoLateral ['opcaoLateral']= "visita_tecnica";
            //$this->load->view('/bolsista/cadastro');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
        
           
           
        
           
           
           
         } else {
              
            $this->load->model('VisitaTecnicaModel','visita');
            $this->load->helper('form');
            
            
            //RECEBENDO DADOS DO POST
            $dados['local'] = $this->input->post('local');
            $dados['objetivo'] = $this->input->post('objetivo');
            $dados['data'] = $this->input->post('data');
            $dados['quantidade'] = $this->input->post('participantes');
            
            $dados['anexo'] = $this->input->post('anexo');
            $dados['idbolsista'] = $this->session->userdata('idlo');
            
            
            $nomeAluno = $this->session->userdata('usuario');
            //recebendo arquivo
            $anexo = $_FILES['anexo'];
            $configuracao = array(
                'upload_path'   => './uploads/visita_tecnica/',
                'allowed_types' => 'pdf',
                'file_name'     => $dados['local'].' - '.$nomeAluno.'pdf',
                'max_size'      => '50000'
            );      
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            $this->upload->do_upload('anexo');
            $dados['anexo'] = base_url() .'uploads/visita_tecnica/'.$dados['local'].'-'.$nomeAluno.'pdf';
        
            
            
            //SALVANDO
            $this->visita->salvar($dados);
             
             $mensagem = true;
             $this->session->set_flashdata('mensagem','Seu produto foi cadastrado com sucesso.');
             //se tudo oks
            $opcaoLateral ['opcaoLateral']= "visita_tecnica";
            
            $this->load->view('/visita_tecnica/cadastro',$mensagem);
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
            $this->load->library('form_validation');
             
             
        }
    }
}
