<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detalle extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->detalle_model->listaDetalle();
        $data['detallepago']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('detalle/lista',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        }
        else
        {
            redirect('usuario/panel','refresh');
        }
		
	}
    
  }
