<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoderado extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->apoderado_model->listaPadres();
        $data['apoderado']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('padres/lista',$data);
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
        $this->load->view('padres/insert');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

        public function agregarbd()
    {
        $data['nombres']=mb_strtoupper($_POST['nombres'], 'UTF-8');
        $data['apellidoPaterno']=mb_strtoupper($_POST['apellidoPaterno'], 'UTF-8');
        $data['apellidoMaterno']=mb_strtoupper($_POST['apellidoMaterno'], 'UTF-8');
        $data['direccion']=mb_strtoupper($_POST['direccion'], 'UTF-8');
        $data['edad']=$_POST['edad'];
        $data['numReferencia']=$_POST['numReferencia'];
        $data['estadoCivil']=mb_strtoupper($_POST['estadoCivil'], 'UTF-8');
        
        $this->apoderado_model->agregarPadre($data);
        redirect('apoderado/index','refresh');
    }

    public function modificar()
    {
        $idApoderado=$_POST['idApoderado'];
        $data['infopadre']=$this->apoderado_model->recuperarPadre($idApoderado);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('padres/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $idApoderado=$_POST['idApoderado'];
        $data['nombres']=mb_strtoupper($_POST['nombres'], 'UTF-8');
        $data['apellidoPaterno']=mb_strtoupper($_POST['apellidoPaterno'], 'UTF-8');
        $data['apellidoMaterno']=mb_strtoupper($_POST['apellidoMaterno'], 'UTF-8');
        $data['direccion']=mb_strtoupper($_POST['direccion'], 'UTF-8');
        $data['edad']=$_POST['edad'];
        $data['numReferencia']=$_POST['numReferencia'];
        $data['estadoCivil']=mb_strtoupper($_POST['estadoCivil'], 'UTF-8');
        $this->apoderado_model->modificarPadre($idApoderado,$data);
        redirect('apoderado/index','refresh');
    }

    public function deshabilitarbd()
    {
        $idApoderado=$_POST['idApoderado'];
        $data['estado']='0';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->apoderado_model->modificarPadre($idApoderado,$data);
        redirect('apoderado/index','refresh');
    }

    public function deshabilitados()
    {
        $lista=$this->apoderado_model->listaPadresdeshabilitados();
        $data['apoderado']=$lista;
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('padres/listadeshabilitados',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

        public function habilitarbd()
    {
        $idApoderado=$_POST['idApoderado'];
        $data['estado']='1';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->apoderado_model->modificarPadre($idApoderado,$data);
        redirect('apoderado/index','refresh');
    }
    
  }
