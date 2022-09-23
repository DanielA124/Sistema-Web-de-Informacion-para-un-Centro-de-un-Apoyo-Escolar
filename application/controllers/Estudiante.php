<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->estudiante_model->listaestudiantes();
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
        $data['direccion']=mb_strtoupper($_POST['direccion'], 'UTF-8');
        $idPersona= $this->persona_model->agregarpersona($data);

        $datos['idEstudiante']=$idPersona;
        $datos['edad']=$_POST['edad'];
        $datos['sexo']=$_POST['sexo'];
        $datos['fechaNacimiento']=$_POST['fechaNacimiento'];
        $datos['colegio']=mb_strtoupper($_POST['colegio'], 'UTF-8');
        $datos['grado']=mb_strtoupper($_POST['grado'], 'UTF-8');
        
        $this->estudiante_model->agregarestudiante($datos);
        redirect('estudiante/index','refresh');
    }

    public function modificar()
    {
        $idEstudiante=$_POST['idPersona'];
        $data['infoestudiante']=$this->estudiante_model->recuperarestudiante($idEstudiante);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('estudiante/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $idEstudiante=$_POST['idPersona'];
        $data['nombres']=mb_strtoupper($_POST['nombres'], 'UTF-8');
        $data['apellidoPaterno']=mb_strtoupper($_POST['apellidoPaterno'], 'UTF-8');
        $data['apellidoMaterno']=mb_strtoupper($_POST['apellidoMaterno'], 'UTF-8');
        $data['direccion']=mb_strtoupper($_POST['direccion'], 'UTF-8');
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->estudiante_model->modificarPersona($idEstudiante,$data);

        $datos['edad']=$_POST['edad'];
        $datos['sexo']=$_POST['sexo'];
        $datos['fechaNacimiento']=$_POST['fechaNacimiento'];
        $datos['colegio']=mb_strtoupper($_POST['colegio'], 'UTF-8');
        $datos['grado']=mb_strtoupper($_POST['grado'], 'UTF-8');
        $this->estudiante_model->modificarEstudiante($idEstudiante,$datos);
        redirect('estudiante/index','refresh');
    }

    public function deshabilitarbd()
    {
        $idEstudiante=$_POST['idPersona'];
        $data['estado']='0';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->estudiante_model->modificarPersona($idEstudiante,$data);
        redirect('estudiante/index','refresh');
    }

    public function deshabilitados()
    {
        $lista=$this->estudiante_model->listaestudiantesdeshabilitados();
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
        $idEstudiante=$_POST['idPersona'];
        $data['estado']='1';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->estudiante_model->modificarPersona($idEstudiante,$data);
        redirect('estudiante/index','refresh');
    }
    
  }
