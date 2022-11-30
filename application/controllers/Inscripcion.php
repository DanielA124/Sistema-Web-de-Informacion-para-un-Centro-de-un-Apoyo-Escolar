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

    public function inscripcionPDF()
    {
        $idInscripcion=$_POST['idInscripcion'];
        $lista=$this->inscripcion_model->PDF($idInscripcion);
        $lista=$lista->result();

        $this->pdf=new Pdf();
        $this->pdf->AddPage('P','Letter');

        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("Lista de Usuarios");//Configuaraion del titulo
        $this->pdf->SetLeftMargin(20);//Configuaraion del margen izquierdo
        $this->pdf->SetRightMargin(20);//Configuaraion del margen derecho
        $this->pdf->SetFillColor(210,210,210);//Configuaraion del color de fondo
        $this->pdf->SetFont('Arial','B',16);//Configuaraion de la fuente de la letre
        $this->pdf->Cell(0,10,'CENTRO INTEGRAL DE APRENDIZAJE',0,1,'C',0);
        $this->pdf->SetFillColor(210,210,210);//Configuaraion del color de fondo
        $this->pdf->SetFont('Arial','B',18);//Configuaraion de la fuente de la letre
        $this->pdf->Cell(0,10,'"CRUZ DEL SUR"',0,1,'C',0);
        $this->pdf->Ln();
        //$this->pdf->Image("uploads/membrete1.png", 150, 23, 50, 50, 'PNG');
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Ln(0);

        foreach ($lista as $rows) {
            $nombre =$rows->ENombre.' '.$rows->EApP.' '.$rows->EApM;
            $hora= $rows->horario;
            $sexo= ' ';
            if ($rows->ESexo == 'H'){
                      $sexo='HOMBRE';
                  }
                  else{
                      $sexo='MUJER';
                  }
            $edad= $rows->EEdad;
            $cole= $rows->colegio;
            $curso= $rows->grado;
            $nombreA =$rows->ANombre.' '.$rows->AApP.' '.$rows->AApM;
            $edadA= $rows->AEdad;
            $estado= $rows->estadoCivil;
            $direccion= $rows->direccion;
            $telefono= $rows->numReferencia;
            $observaciones= $rows->observaciones;
        }
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(130, 5, utf8_decode('NOMBRE COMPLETO: '.$nombre), 0, 0, 'L', 0);
        $this->pdf->Cell(0, 5, utf8_decode('HORARIO: '.$hora), 0, 1, 'L', 0);
        $this->pdf->Cell(130, 5, utf8_decode('LUGAR DE NACIMIENTO: '), 0, 0, 'L', 0);
        $this->pdf->Cell(0, 5, utf8_decode('SEXO: '.$sexo), 0, 1, 'L', 0);
        $this->pdf->Cell(130, 5, utf8_decode('FECHA NACIMIENTO:'), 0, 0, 'l', 0);
        $this->pdf->Cell(0, 5, utf8_decode('EDAD: '.$edad), 0, 1, 'L', 0);
        $this->pdf->Cell(130, 5, utf8_decode('DOMICILIO:'), 0, 0, 'l', 0);
        $this->pdf->Cell(0, 5, utf8_decode('TELÉFONO:'), 0, 1, 'L', 0);
        $this->pdf->Cell(130, 5, utf8_decode('UNIDAD EDUCATIVA: '.$cole), 0, 0, 'l', 0);
        $this->pdf->Cell(0, 5, utf8_decode('CURSO: '.$curso), 0, 1, 'L', 0);
        $this->pdf->Ln(8);

        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(130, 5, utf8_decode('NOMBRE APODERADO: '.$nombreA), 0, 0, 'L', 0);
        $this->pdf->Cell(0, 5, utf8_decode('EDAD: '.$edadA), 0, 1, 'L', 0);        
        $this->pdf->Cell(130, 5, utf8_decode('OCUPACIÓN: '), 0, 1, 'L', 0);
        $this->pdf->Cell(130, 5, utf8_decode('EDUCACIÓN: '), 0, 0, 'L', 0);
        $this->pdf->Cell(0, 5, utf8_decode('EST. CIVIL: '.$estado), 0, 1, 'l', 0);
        $this->pdf->Cell(130, 5, utf8_decode('DOMICILIO: '.$direccion), 0, 0, 'L', 0);       
        $this->pdf->Cell(0, 5, utf8_decode('TELÉFONO: '.$telefono), 0, 1, 'L', 0);
        $this->pdf->Ln(8);

        //$this->pdf->SetFont('Arial', '', 11);
        //$this->pdf->Cell(130, 5, utf8_decode('NOMBRE DE LA MADRE: '), 0, 0, 'L', 0);
        //$this->pdf->Cell(0, 5, utf8_decode('EDAD: '), 0, 1, 'L', 0);        
        //$this->pdf->Cell(130, 5, utf8_decode('OCUPACIÓN: '), 0, 1, 'L', 0);
        //$this->pdf->Cell(130, 5, utf8_decode('EDUCACIÓN: '), 0, 0, 'L', 0);
        //$this->pdf->Cell(0, 5, utf8_decode('EST. CIVIL:'), 0, 1, 'l', 0);
        //$this->pdf->Cell(130, 5, utf8_decode('DOMICILIO:'), 0, 0, 'L', 0);       
        //$this->pdf->Cell(0, 5, utf8_decode('TELÉFONO:'), 0, 1, 'L', 0);
        //$this->pdf->Ln(8);//COMO UN MARGEN


        $this->pdf->SetFont('Arial','B',11);
        $this->pdf->Cell(85,5,utf8_decode('HERMANO (A)'),'TBLR',0,'C',0);
        $this->pdf->Cell(30,5,utf8_decode('EDAD'),'TBLR',0,'C',0);
        $this->pdf->Cell(60,5,utf8_decode('OCUPACIÓN'),'TBLR',1,'C',0);
        $this->pdf->Cell(85,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(30,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(60,5,' ','TBLR',1,'C',0);
        $this->pdf->Cell(85,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(30,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(60,5,' ','TBLR',1,'C',0);
        $this->pdf->Cell(85,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(30,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(60,5,' ','TBLR',1,'C',0);
        $this->pdf->Cell(85,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(30,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(60,5,' ','TBLR',1,'C',0);
        $this->pdf->Cell(85,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(30,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(60,5,' ','TBLR',1,'C',0);
        $this->pdf->Cell(85,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(30,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(60,5,' ','TBLR',1,'C',0);
        $this->pdf->Cell(85,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(30,5,' ','TBLR',0,'C',0);
        $this->pdf->Cell(60,5,' ','TBLR',1,'C',0);
        $this->pdf->Ln(8);//COMO UN MARGEN
        
        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(0, 5, utf8_decode('RELIGIÓN: '), 0, 1, 'L', 0);
        $this->pdf->Ln(8);//COMO UN MARGEN

        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(130, 5, utf8_decode('FAMILIAR: '), 0, 0, 'L', 0);
        $this->pdf->Cell(0, 5, utf8_decode('EDAD: '), 0, 1, 'L', 0);
        $this->pdf->Cell(130, 5, utf8_decode('PARENTESCO: '), 0, 0, 'L', 0);
        $this->pdf->Cell(0, 5, utf8_decode('TELÉFONO:'), 0, 1, 'l', 0);
        $this->pdf->Cell(130, 5, utf8_decode('EDUCACIÓN:'), 0, 0, 'L', 0);       
        $this->pdf->Cell(0, 5, utf8_decode('OCUPACIÓN:'), 0, 1, 'L', 0);
        $this->pdf->Ln(8);//COMO UN MARGEN

        $this->pdf->SetFont('Arial', '', 11);
        $this->pdf->Cell(130, 5, utf8_decode('OBSERVACIONES: '.$observaciones), 0, 1, 'L', 0);
        $this->pdf->Ln(4);
        $this->pdf->SetFont('Arial', '', 10);
        $this->pdf->Cell(0, 5, utf8_decode('Yo '), 0, 0, 'L', 0);        
        $this->pdf->Cell(0, 5, utf8_decode('doy mi consentimiento, para que mi'), 0, 1, 'R', 0);     
        $this->pdf->Cell(0, 5, utf8_decode('hijo o apoderado '), 0, 0, 'L', 0);        
        $this->pdf->Cell(0, 5, utf8_decode('participe de esta institución.'), 0, 1, 'R', 0);   
        $this->pdf->Ln(10);
        
        $this->pdf->Cell(0, 5, utf8_decode('..............................'), 0, 1, 'C', 0);


        

        $this->pdf->Output("PLANTILLA - ".$nombre.".pdf","I");
    }
}