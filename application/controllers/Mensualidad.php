<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensualidad extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->mensualidad_model->listaMensualidad();
        $data['mensualidad']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('mensualidad/lista',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        }
        else
        {
            redirect('mensualidad/panel','refresh');
        }
		
	}

    public function help()
    {
        if($this->session->userdata('tipo')=='ayudante')
        {
        $lista=$this->mensualidad_model->listaMensualidad();
        $data['mensualidad']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('mensualidad/listaH',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        }
        else
        {
            redirect('mensualidad/panel','refresh');
        }
    }

        public function agregar()
	{
      
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('mensualidad/insert');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
		
	}

        public function agregarbd()
	{
        $data['mes']=mb_strtoupper($_POST['mes'], 'UTF-8');
        $data['anio']=$_POST['anio'];
        $data['monto']=$_POST['monto'];
        $data['idInscripcion']=$_POST['idInscripcion'];


        $this->mensualidad_model->agregarMensualidad($data);
        redirect('mensualidad/index','refresh');
	}


        public function modificar()
    {
        $idMensualidad=$_POST['idMensualidad'];
        $data['infoMensualidad']=$this->mensualidad_model->recuperarMensualidad($idMensualidad);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('mensualidad/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $idMensualidad=$_POST['idMensualidad'];
        $data['mes']=$_POST['mes'];
        $data['anio']=$_POST['anio'];
        $data['monto']=$_POST['monto'];
        $data['idInscripcion']=$_POST['idInscripcion'];

        $this->mensualidad_model->modificarMensualidad($idMensualidad,$data);
        redirect('mensualidad/index','refresh');
    }
    
  }
