<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->profesor_model->listaprofesores();
        $data['profesor']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('profesor/lista',$data);
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
        $this->load->view('profesor/insert');
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

        $datos['idProfesor']=$idPersona;
        $datos['horario']=mb_strtoupper($_POST['horario'], 'UTF-8');
        $datos['numeroCel']=$_POST['numeroCel'];

        $this->profesor_model->agregarprofesor($datos);
        redirect('profesor/index','refresh');
    }

    public function modificar()
    {
        $idProfesor=$_POST['idPersona'];
        $data['infoprofesor']=$this->profesor_model->recuperarprofesor($idProfesor);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('profesor/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $idProfesor=$_POST['idPersona'];
        $data['nombres']=mb_strtoupper($_POST['nombres'], 'UTF-8');
        $data['apellidoPaterno']=mb_strtoupper($_POST['apellidoPaterno'], 'UTF-8');
        $data['apellidoMaterno']=mb_strtoupper($_POST['apellidoMaterno'], 'UTF-8');
        $data['direccion']=mb_strtoupper($_POST['direccion'], 'UTF-8');
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->profesor_model->modificarPersona($idProfesor,$data);

        $datos['horario']=mb_strtoupper($_POST['horario'], 'UTF-8');
        $datos['numeroCel']=$_POST['numeroCel'];
        $this->profesor_model->modificarProfesor($idProfesor,$datos);
        redirect('profesor/index','refresh');
    }

    
    
  }
