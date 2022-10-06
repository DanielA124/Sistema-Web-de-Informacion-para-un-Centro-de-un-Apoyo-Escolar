<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

     public function index()
     {
        if($this->session->userdata('nombreUsuario'))
        {
                redirect('login/panel','refresh');
        }
        else
        {
                $this->load->view('inc/header');
                $this->load->view('login/login');
                $this->load->view('inc/footer');
        }               
     }

     public function validar()
     {
        $nombreUsuario=$_POST['nombreUsuario'];
        $password=md5($_POST['password']);

        $consulta=$this->login_model->validar($nombreUsuario,$password);

        if ($consulta->num_rows()>0)
        {
              foreach($consulta->result() as $row)
                {
                        $this->session->set_userdata('idusuario',$row->idUsuario);
                        $this->session->set_userdata('nombreUsuario',$row->nombreUsuario);
                        $this->session->set_userdata('tipo',$row->tipo);
                        redirect('login/panel','refresh');
                }
        }
        else
        {
              redirect('login/index','refresh');  
        }
     }

     public function panel()
     {
        if($this->session->userdata('nombreUsuario'))
        {
            if($this->session->userdata('tipo')=='admin')
            {
                redirect('usuario/index','refresh');
            }
            else
            {
                redirect('persona/help','refresh');
            }
        }
        else
        {
                redirect('login/index','refresh');
        }
     }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login/index','refresh');
    }    
}