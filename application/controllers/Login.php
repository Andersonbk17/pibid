<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Andersonbk17
 */


defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{
    //put your code here
    
    public function index(){
        
        $this->load->view('login');
        $this->load->model('LoginModel','login');
    }
    
    public function teste() {
        $this->load->model('LoginModel','login');
        print_r($this->login->verificarBolsista('cr7@ronaldo.com','1234567'));
    }
    
    
    
    
    
    public function logar() {
        $this->load->model('LoginModel','login');
        
        $email = $this->input->post('username');
        $senha = $this->input->post('password');
        $resultado = $this->login->verificarBolsista($email,$senha);
        
        if($resultado != NULL){
            //se der certo
            // var_dump($resultado);
            $nome = $resultado[0]['nome'];
            $email2 = $resultado[0]['email'];
            $idlo = $resultado[0]['idbolsistas'];
            
            
            
            $newdata = array(
              'usuario'  => $nome,
                'email'     => $email2,
                'logged_in' => TRUE,
                'tipo' => "bolsista",
                'idlo' => $idlo
            );
            
            $this->session->set_userdata($newdata);
            redirect('/Principal');
        }else{ 
            $mensagem = true;
             $this->session->set_flashdata('mensagem','Seu produto foi cadastrado com sucesso.');
             redirect('/');
        }
    }
}
