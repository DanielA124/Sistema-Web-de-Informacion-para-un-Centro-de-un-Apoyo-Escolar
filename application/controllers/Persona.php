<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->persona_model->listadatos();
        $data['persona']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('persona/lista',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
		
	}

    public function help()
    {
        if($this->session->userdata('tipo')=='ayudante')
        {
        $lista=$this->persona_model->listadatos();
        $data['persona']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('persona/listaH',$data);
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
        $this->load->view('persona/insert');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
		
	}

        public function agregarbd()
	{
        $data['nombres']=mb_strtoupper($_POST['nombres'], 'UTF-8');
        $data['apellidoPaterno']=mb_strtoupper($_POST['apellidoPaterno'], 'UTF-8');
        $data['apellidoMaterno']=mb_strtoupper($_POST['apellidoMaterno'], 'UTF-8');
        $data['direccion']=mb_strtoupper($_POST['direccion'], 'UTF-8');

        $this->persona_model->agregarpersona($data);
        redirect('persona/index','refresh');
	}


        public function modificar()
    {
        $idPersona=$_POST['idPersona'];
        $data['infopersona']=$this->persona_model->recuperardatos($idPersona);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('persona/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $idPersona=$_POST['idPersona'];
        $data['nombres']=mb_strtoupper($_POST['nombres'], 'UTF-8');
        $data['apellidoPaterno']=mb_strtoupper($_POST['apellidoPaterno'], 'UTF-8');
        $data['apellidoMaterno']=mb_strtoupper($_POST['apellidoMaterno'], 'UTF-8');
        $data['direccion']=mb_strtoupper($_POST['direccion'], 'UTF-8');
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->persona_model->modificardatos($idPersona,$data);
        redirect('persona/index','refresh');
    }

    public function deshabilitarbd()
    {
        $idPersona=$_POST['idPersona'];
        $data['estado']='0';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->persona_model->modificardatos($idPersona,$data);
        redirect('persona/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->persona_model->listadatosdeshabilitados();
        $data['persona']=$lista;
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('persona/listadeshabilitados',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

        public function habilitarbd()
    {
        $idPersona=$_POST['idPersona'];
        $data['estado']='1';
        $data['fechaAct']=date("Y-m-d (H:i:s)");
        $this->persona_model->modificardatos($idPersona,$data);
        redirect('persona/deshabilitados','refresh');
    }

    public function listapdf()
    {
        $lista=$this->persona_model->listadatos();
        $lista=$lista->result();
        
        $this->pdf=new Pdf();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Lista de los Datos");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(210,210,210);
        $this->pdf->SetFont('Arial','B',11);
        $this->pdf->Cell(30);
        $this->pdf->Cell(120,10, 'LISTA DE LOS DATOS',0,0, 'C', 1);
        //ANCHO/ALTO/TEXTO/BORDE/ORDEN SIG CELDA/ALINEACION LEFT CENTER RIGHT LCR/FILL 0NO 1SI
        //ORDEN SIG CELDA   0DER    1SIG LINEA  2DEBAJO

        $this->pdf->Ln(10);
        $this->pdf->SetFont('Arial','',9);
        $num=1;
        foreach ($lista as $row) {
            $nombres=$row->nombres;
            $apellidoPaterno=$row->apellidoPaterno;
            $apellidoMaterno=$row->apellidoMaterno;
            $direccion=$row->direccion;

            $this->pdf->Cell(5,5,$num, 'TBLR',0, 'L',0);
            $this->pdf->Cell(40,5,$nombres, 'TBLR',0, 'L',0);
            $this->pdf->Cell(7,5,$apellidoPaterno, 'TBLR',0, 'L',0);
            $this->pdf->Cell(20,5,$apellidoMaterno, 'TBLR',0, 'L',0);
            $this->pdf->Cell(40,5,$direccion, 'TBLR',0, 'L',0);

            $this->pdf->Ln(5);

            $num++;
        }


        $this->pdf->Output("listainscritos.pdf","I"); 
    }
  }
