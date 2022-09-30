<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscripcion extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->inscripcion_model->listainscritos();
        $data['inscripcion']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('inscripcion/lista',$data);
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
        $this->load->view('inscripcion/insert');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

        public function agregarbd()
    {
        $data['idApoderado']=$_POST['idApoderado'];
        $data['idEstudiante']=$_POST['idEstudiante'];
        $data['observaciones']=mb_strtoupper($_POST['observaciones'], 'UTF-8');
        
        
        $this->inscripcion_model->agregarInscripcion($data);
        redirect('inscripcion/index','refresh');
    }

    public function modificar()
    {
        $idApoderado=$_POST['idApoderado'];
        $idEstudiante=$_POST['idEstudiante'];
        $data['infoInscritos']=$this->inscripcion_model->recuperarInscritos($idApoderado,$idEstudiante);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('inscripcion/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $idApoderado=$_POST['idApoderado'];
        $idEstudiante=$_POST['idEstudiante'];
        $data['observaciones']=mb_strtoupper($_POST['observaciones'], 'UTF-8');
        $this->inscripcion_model->modificarInscritos($idApoderado,$idEstudiante,$data);
        redirect('inscripcion/index','refresh');
    }

    public function deshabilitarbd()
    {
        $idApoderado=$_POST['idApoderado'];
        $idEstudiante=$_POST['idEstudiante'];
        $data['estado']='0';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->inscripcion_model->modificarPersona($idApoderado,$idEstudiante,$data);
        redirect('inscripcion/index','refresh');
    }

    public function deshabilitados()
    {
        $lista=$this->profesor_model->listaprofesoresdeshabilitados();
        $data['inscritos']=$lista;
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('inscripcion/listadeshabilitados',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

        public function habilitarbd()
    {
        $idApoderado=$_POST['idPersona'];
        $idEstudiante=$_POST['idPersona'];
        $data['estado']='1';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->inscripcion_model->modificarPersona($idApoderado,$idEstudiante,$data);
        redirect('inscripcion/index','refresh');
    }
}