<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->estudiante_model->listaEstudiantes();
        $data['estudiante']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('estudiante/lista',$data);
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
        $this->load->view('estudiante/insert');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

        public function agregarbd()
    {
        $data['nombres']=mb_strtoupper($_POST['nombres'], 'UTF-8');
        $data['apellidoPaterno']=mb_strtoupper($_POST['apellidoPaterno'], 'UTF-8');
        $data['apellidoMaterno']=mb_strtoupper($_POST['apellidoMaterno'], 'UTF-8');
        $data['edad']=$_POST['edad'];
        $data['sexo']=$_POST['sexo'];
        $data['colegio']=mb_strtoupper($_POST['colegio'], 'UTF-8');
        $data['grado']=mb_strtoupper($_POST['grado'], 'UTF-8');
        
        $this->estudiante_model->agregarEstudiante($data);
        redirect('estudiante/index','refresh');
    }

    public function modificar()
    {
        $idEstudiante=$_POST['idEstudiante'];
        $data['infoestudiante']=$this->estudiante_model->recuperarEstudiante($idEstudiante);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('estudiante/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $idEstudiante=$_POST['idEstudiante'];
        $data['nombres']=mb_strtoupper($_POST['nombres'], 'UTF-8');
        $data['apellidoPaterno']=mb_strtoupper($_POST['apellidoPaterno'], 'UTF-8');
        $data['apellidoMaterno']=mb_strtoupper($_POST['apellidoMaterno'], 'UTF-8');
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $data['edad']=$_POST['edad'];
        $data['sexo']=$_POST['sexo'];
        $data['colegio']=mb_strtoupper($_POST['colegio'], 'UTF-8');
        $data['grado']=mb_strtoupper($_POST['grado'], 'UTF-8');
        $this->estudiante_model->modificarEstudiante($idEstudiante,$data);
        redirect('estudiante/index','refresh');
    }

    public function deshabilitarbd()
    {
        $idEstudiante=$_POST['idEstudiante'];
        $data['estado']='0';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->estudiante_model->modificarEstudiante($idEstudiante,$data);
        redirect('estudiante/index','refresh');
    }

    public function deshabilitados()
    {
        $lista=$this->estudiante_model->listaEstudiantesdeshabilitados();
        $data['apoderado']=$lista;
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('estudiante/listadeshabilitados',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

        public function habilitarbd()
    {
        $idEstudiante=$_POST['idEstudiante'];
        $data['estado']='1';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->estudiante_model->modificarEstudiante($idEstudiante,$data);
        redirect('estudiante/index','refresh');
    }
    
  }
