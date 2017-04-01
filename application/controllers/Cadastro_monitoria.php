<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro_monitoria
 *
 * @author Andersonbk17
 */
class Cadastro_monitoria extends CI_Controller{
    
    public function index() {
        
        $opcaoLateral ['opcaoLateral']= "monitoria";
        $this->load->view('/monitoria/cadastro');
        $this->load->view('includes/html_header');
        $this->load->view('includes/html_footer');
        $this->load->view('includes/menu',$opcaoLateral);
        $this->load->library('form_validation');
        
    }
    
    public function cadastrar(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('area', '[ÁREA]', 'required|min_length[3]');
        $this->form_validation->set_rules('sintese', '[SÍNTESE]', 'required');
        $this->form_validation->set_rules('inicio', '[INíCIO]', 'required');
        $this->form_validation->set_rules('termino', '[TÉRMINO]', 'required');
        $this->form_validation->set_rules('publico_alvo', '[PÚBLICO ALVO]', 'required|min_length[4]');
        
        
         if ($this->form_validation->run() == FALSE) {
           $erros = array('mensagens' => validation_errors());
           $this->load->view('/monitoria/cadastro', $erros);
           
            $opcaoLateral ['opcaoLateral']= "monitoria";
            //$this->load->view('/bolsista/cadastro');
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
        
           
           
        
           
           
           
         } else {
              
            $this->load->model('MonitoriaModel','monitoria');
            $this->load->helper('form');
            
            
            //RECEBENDO DADOS DO POST
            $dados['area'] = $this->input->post('area');
            $dados['inicio'] = $this->input->post('inicio');
            $dados['termino'] = $this->input->post('termino');
            $dados['publico_alvo'] = $this->input->post('publico_alvo');
            $dados['sintese'] = $this->input->post('sintese');
            
            $dados['anexo'] = $this->input->post('anexo');
            $dados['idbolsista'] = $this->session->userdata('idlo');
            
            
            $nomeAluno = $this->session->userdata('usuario');
            //recebendo arquivo
            $anexo = $_FILES['anexo'];
            $configuracao = array(
                'upload_path'   => './uploads/monitoria/',
                'allowed_types' => 'pdf',
                'file_name'     => $dados['area'].' - '.$nomeAluno.'pdf',
                'max_size'      => '50000'
            );      
            $this->load->library('upload');
            $this->upload->initialize($configuracao);
            $this->upload->do_upload('anexo');
            $dados['anexo'] = base_url() .'uploads/monitoria/'.$dados['area'].'-'.$nomeAluno.'pdf';
        
            
            
            //SALVANDO
            $this->monitoria->salvar($dados);
             
             $mensagem = true;
             $this->session->set_flashdata('mensagem','Seu produto foi cadastrado com sucesso.');
             //se tudo oks
            $opcaoLateral ['opcaoLateral']= "monitoria";
            
            $this->load->view('/monitoria/cadastro',$mensagem);
            $this->load->view('includes/html_header');
            $this->load->view('includes/html_footer');
            $this->load->view('includes/menu',$opcaoLateral);
            $this->load->library('form_validation');
             
             
        }
    }
    
}
