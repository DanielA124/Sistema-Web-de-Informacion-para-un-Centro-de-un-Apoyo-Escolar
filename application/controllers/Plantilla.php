<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plantilla extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->plantilla_model->listaplantilla();
        $data['plantilla']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('archivo/lista',$data);
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
        $this->load->view('archivo/insert');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

        public function agregarbd()
    {
        $data['nombre']=mb_strtoupper($_POST['nombre'], 'UTF-8');
        $data['idMateria']=$_POST['idMateria'];
        $data['idUsuario']=$this->session->userdata('idusuario');

        $this->plantilla_model->agregardatos($data);
        redirect('plantilla/index','refresh');        
    }

    
    public function modificar()
    {
        $idPlantilla=$_POST['idPlantilla'];
        $data['infodatos']=$this->plantilla_model->recuperardatos($idPlantilla);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('archivo/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $idPlantilla=$_POST['idPlantilla'];
        $data['nombre']=mb_strtoupper($_POST['nombre'], 'UTF-8');
        $data['idMateria']=$_POST['idMateria'];
        $data['idUsuario']=$this->session->userdata('idusuario');
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->plantilla_model->modificardatos($idPlantilla,$data);
        redirect('plantilla/index','refresh');
    }

    public function deshabilitarbd()
    {
        $idPlantilla=$_POST['idPlantilla'];
        $data['estado']='0';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->plantilla_model->modificardatos($idPlantilla,$data);
        redirect('plantilla/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->plantilla_model->listadatosdeshabilitados();
        $data['plantilla']=$lista;
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('archivo/listadeshabilitados',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

        public function habilitarbd()
    {
        $idPlantilla=$_POST['idPlantilla'];
        $data['estado']='1';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->plantilla_model->modificardatos($idPlantilla,$data);
        redirect('plantilla/deshabilitados','refresh');
    }

  }
