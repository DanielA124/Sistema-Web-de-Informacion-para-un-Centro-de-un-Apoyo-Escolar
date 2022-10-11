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
        $data['horario']=mb_strtoupper($_POST['horario'], 'UTF-8');
        
        
        $this->inscripcion_model->agregarInscripcion($data);
        redirect('inscripcion/index','refresh');
    }

    public function modificar()
    {
        $idInscripcion=$_POST['idInscripcion'];
        $data['infoInscritos']=$this->inscripcion_model->recuperarInscritos($idInscripcion);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('inscripcion/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $idInscripcion=$_POST['idInscripcion'];
        $data['idApoderado']=$_POST['idApoderado'];
        $data['idEstudiante']=$_POST['idEstudiante'];
        $data['observaciones']=mb_strtoupper($_POST['observaciones'], 'UTF-8');
        $data['horario']=mb_strtoupper($_POST['horario'], 'UTF-8');
        $this->inscripcion_model->modificarInscritos($idInscripcion,$data);
        redirect('inscripcion/index','refresh');
    }

    public function deshabilitarbd()
    {
        $idInscripcion=$_POST['idInscripcion'];
        $data['estado']='0';
        $this->inscripcion_model->modificarInscritos($idInscripcion,$data);
        redirect('inscripcion/index','refresh');
    }

    public function deshabilitados()
    {
        $lista=$this->inscripcion_model->listaInscritosdeshabilitados();
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
        $idInscripcion=$_POST['idInscripcion'];
        $data['estado']='1';
        $this->inscripcion_model->modificarInscritos($idInscripcion,$data);
        redirect('inscripcion/index','refresh');
    }
}