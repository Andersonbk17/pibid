<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro_participacao_eventos
 *
 * @author Andersonbk17
 */
class Cadastro_participacao_eventos extends CI_Controller{
   public function index() {
        
        $opcaoLateral ['opcaoLateral']= "participacao_eventos";
        $this->load->view('/participacao_eventos/cadastro');
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        $this->load->library('form_validation');
        
    }
    
    public function cadastrar(){
        $this->load->library('form_validation');
        
        
        $this->form_validation->set_rules('titulo', '[NOME]', 'required|min_length[4]');
        $this->form_validation->set_rules('inicio', '[INICIO]', 'required|min_length[4]');
        $this->form_validation->set_rules('termino', '[TERMINO]', 'required|min_length[4]');
        $this->form_validation->set_rules('quantidade_bolsistas', '[NÚMERO PARTICIPANTES]', 'required');
        
        
         if ($this->form_validation->run() == FALSE) {
           $erros = array('mensagens' => validation_errors());
           $this->load->view('/participacao_eventos/cadastro', $erros);
           
            $opcaoLateral ['opcaoLateral']= "participacao_eventos";
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
        
           
         } else {
          
            $this->load->model('ParticipacaoEventosModel','eventos');
            $this->load->helper('form');
            
            
            //RECEBENDO DADOS DO POST
            $dados['titulo'] = $this->input->post('titulo');
            $dados['inicio'] = $this->input->post('inicio');
            $dados['termino'] = $this->input->post('termino');
            $dados['local'] = $this->input->post('local');
            $dados['quantidade_bolsistas'] = $this->input->post('quantidade_bolsistas');
            
            $dados['anexo'] = $this->input->post('anexo');
            $dados['idbolsista'] = $this->session->userdata('idlo');
            
            
            $nomeAluno = $this->session->userdata('usuario');
            //recebendo arquivo
            $anexo = $_FILES['anexo'];
            $configuracao = array(
                'upload_path'   => './uploads/participacao_eventos/',
                'allowed_types' => 'pdf',
                'file_name'     => $dados['titulo'].' - '.$nomeAluno.'pdf',
                'max_size'      => '5000'
            );      
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            $this->upload->do_upload('anexo');
            $dados['anexo'] = base_url() .'uploads/participacao_eventos/'.$dados['titulo'].'-'.$nomeAluno.'.pdf';
        
            
            
            //SALVANDO
            $this->eventos->salvar($dados);
             
             $mensagem = true;
             $this->session->set_flashdata('mensagem','Seu produto foi cadastrado com sucesso.');
             //se tudo oks
            $opcaoLateral ['opcaoLateral']= "participacao_eventos";
            
            $this->load->view('/participacao_eventos/cadastro',$mensagem);
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
            $this->load->library('form_validation');
             
             
             
        }
    }
}
