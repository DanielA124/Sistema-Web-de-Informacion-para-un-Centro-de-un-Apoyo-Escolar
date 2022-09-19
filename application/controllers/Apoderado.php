<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoderado extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->apoderado_model->listapadres();
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
        $idPersona= $this->persona_model->agregarpersona($data);

        $datos['idApoderado']=$idPersona;
        $datos['edad']=$_POST['edad'];
        $datos['numReferencia']=$_POST['numReferencia'];
        $datos['estadoCivil']=mb_strtoupper($_POST['estadoCivil'], 'UTF-8');
        
        $this->apoderado_model->agregarpadre($datos);
        redirect('apoderado/index','refresh');
    }

    public function modificar()
    {
        $idApoderado=$_POST['idPersona'];
        $data['infopadre']=$this->apoderado_model->recuperarpadre($idApoderado);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('padres/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $idApoderado=$_POST['idPersona'];
        $data['nombres']=mb_strtoupper($_POST['nombres'], 'UTF-8');
        $data['apellidoPaterno']=mb_strtoupper($_POST['apellidoPaterno'], 'UTF-8');
        $data['apellidoMaterno']=mb_strtoupper($_POST['apellidoMaterno'], 'UTF-8');
        $data['direccion']=mb_strtoupper($_POST['direccion'], 'UTF-8');
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->apoderado_model->modificarPersona($idApoderado,$data);

        $datos['edad']=$_POST['edad'];
        $datos['numReferencia']=$_POST['numReferencia'];
        $datos['estadoCivil']=mb_strtoupper($_POST['estadoCivil'], 'UTF-8');
        $this->apoderado_model->modificarPadre($idApoderado,$datos);
        redirect('apoderado/index','refresh');
    }

    public function deshabilitarbd()
    {
        $idApoderado=$_POST['idPersona'];
        $data['estado']='0';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->apoderado_model->modificarPersona($idApoderado,$data);
        redirect('apoderado/index','refresh');
    }

    public function deshabilitados()
    {
        $lista=$this->apoderado_model->listapadresdeshabilitados();
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
        $idApoderado=$_POST['idPersona'];
        $data['estado']='1';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->apoderado_model->modificarPersona($idApoderado,$data);
        redirect('apoderado/index','refresh');
    }
    
  }
