<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->usuario_model->listadatos();
        $data['usuario']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('usuario/lista',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
		
	}

    public function help()
    {
        if($this->session->userdata('tipo')=='ayudante')
        {
        $lista=$this->usuario_model->listadatos();
        $data['usuario']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('usuario/listaH',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
    }

        public function agregar()
	{
      
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('usuario/insert');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
		
	}

        public function agregarbd()
	{
        $data['nombres']=mb_strtoupper($_POST['nombres'], 'UTF-8');
        $data['apellidoPaterno']=mb_strtoupper($_POST['apellidoPaterno'], 'UTF-8');
        $data['apellidoMaterno']=mb_strtoupper($_POST['apellidoMaterno'], 'UTF-8');
        $data['direccion']=mb_strtoupper($_POST['direccion'], 'UTF-8');
        $data['horario']=mb_strtoupper($_POST['horario'], 'UTF-8');
        $data['numeroCel']=$_POST['numeroCel'];
        $data['nombreUsuario']=$_POST['nombreUsuario'];
        $data['password']=md5($_POST['password']);

        $this->usuario_model->agregarUsuario($data);
        redirect('usuario/index','refresh');
	}


        public function modificar()
    {
        $idUsuario=$_POST['idUsuario'];
        $data['infoUsuario']=$this->usuario_model->recuperardatos($idUsuario);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('usuario/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $idUsuario=$_POST['idUsuario'];
        $data['nombres']=mb_strtoupper($_POST['nombres'], 'UTF-8');
        $data['apellidoPaterno']=mb_strtoupper($_POST['apellidoPaterno'], 'UTF-8');
        $data['apellidoMaterno']=mb_strtoupper($_POST['apellidoMaterno'], 'UTF-8');
        $data['direccion']=mb_strtoupper($_POST['direccion'], 'UTF-8');
        $data['horario']=mb_strtoupper($_POST['horario'], 'UTF-8');
        $data['numeroCel']=$_POST['numeroCel'];
        $data['nombreUsuario']=$_POST['nombreUsuario'];
        $data['password']=md5($_POST['password']);
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        
        $this->usuario_model->modificardatos($idUsuario,$data);
        redirect('usuario/index','refresh');
    }

    public function deshabilitarbd()
    {
        $idUsuario=$_POST['idUsuario'];
        $data['estado']='0';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->usuario_model->modificardatos($idUsuario,$data);
        redirect('usuario/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->usuario_model->listadatosdeshabilitados();
        $data['usuario']=$lista;
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('usuario/listadeshabilitados',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

        public function habilitarbd()
    {
        $idUsuario=$_POST['idUsuario'];
        $data['estado']='1';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->usuario_model->modificardatos($idUsuario,$data);
        redirect('usuario/deshabilitados','refresh');
    }

    
  }
