<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pago extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->pago_model->listaPago();
        $data['pago']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('pago/lista',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        }
        else
        {
            redirect('pago/panel','refresh');
        }
		
	}

    public function help()
    {
        if($this->session->userdata('tipo')=='ayudante')
        {
        $lista=$this->pago_model->listaPago();
        $data['pago']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('pago/listaH',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        }
        else
        {
            redirect('pago/panel','refresh');
        }
    }

        public function agregar()
	{
      
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('pago/insert');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
		
	}

        public function agregarbd()
	{
        $data['total']=$_POST['total'];
        $data['fecha']=date("Y-m-d");
        $data['idUsuario']=$this->session->userdata('idusuario');


        $this->pago_model->agregarPago($data);
        redirect('pago/index','refresh');
	}


        public function modificar()
    {
        $idPago=$_POST['idPago'];
        $data['infoPago']=$this->pago_model->recuperarPago($idPago);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('pago/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $idPago=$_POST['idPago'];
        $data['total']=$_POST['total'];
        $data['fecha']=date("Y-m-d");
        $data['idUsuario']=$this->session->userdata('idusuario');

        $this->pago_model->modificarPago($idPago,$data);
        redirect('pago/index','refresh');
    }
    
  }
