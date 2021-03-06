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
class Cadastro_capacitacao extends CI_Controller{
    //put your code here
    
    
    
    public function index() {
        
        $opcaoLateral ['opcaoLateral']= "capacitacao";
        $this->load->view('/capacitacao/cadastro');
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        $this->load->library('form_validation');
        
    }
    
    public function teste() {
        $this->load->model('CapacitacaoModel','capacitacao');
        var_dump($this->capacitacao->listarTodos());
    }
    
    public function cadastrar(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('sintese', '[SINTESE]', 'required');
        $this->form_validation->set_rules('tema', '[TEMA]', 'required|min_length[4]');
        
        
         if ($this->form_validation->run() == FALSE) {
           $erros = array('mensagens' => validation_errors());
           $this->load->view('/capacitacao/cadastro', $erros);
           
            $opcaoLateral ['opcaoLateral']= "capacitacao";
            //$this->load->view('/bolsista/cadastro');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
        
           
         } else {
           
             
            $this->load->model('CapacitacaoModel','capacitacao');
            $this->load->helper('form');
            
            
            //RECEBENDO DADOS DO POST
            $dados['tema'] = $this->input->post('tema');
            $dados['inicio'] = $this->input->post('inicio');
            $dados['termino'] = $this->input->post('termino');
            $dados['escola'] = $this->input->post('escola');
            $dados['publico_alvo'] = $this->input->post('publico_alvo');
            $dados['sintese'] = $this->input->post('sintese');
            $dados['anexo'] = $this->input->post('anexo');
            $dados['idbolsista'] = $this->session->userdata('idlo');
            
            
            $nomeAluno = $this->session->userdata('usuario');
            //recebendo arquivo
            $anexo = $_FILES['anexo'];
            $configuracao = array(
                'upload_path'   => './uploads/capacitacao/',
                'allowed_types' => 'pdf',
                'file_name'     => $dados['tema'].' - '.$nomeAluno.'pdf',
                'max_size'      => '5000'
            );      
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            $this->upload->do_upload('anexo');
            $dados['anexo'] = base_url() .'uploads/capacitacao/'.$dados['tema'].'-'.$nomeAluno.'pdf';
        
            
            
            //SALVANDO
            $this->capacitacao->salvar($dados);
             
             $mensagem = true;
             $this->session->set_flashdata('mensagem','Seu produto foi cadastrado com sucesso.');
             //se tudo oks
            $opcaoLateral ['opcaoLateral']= "capacitacao";
            
            $this->load->view('/capacitacao/cadastro',$mensagem);
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
            $this->load->library('form_validation');
        }
    }
}
