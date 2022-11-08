<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function index()
    {

        if ($this->session->userdata('tipo') == 'admin') {
            $this->load->view('inc/headersbadmin2');
            $this->load->view('inc/sidebarsbadmin2');
            $this->load->view('inc/topbarsbadmin2');
            $this->load->view('dashboard/reportes');
            $this->load->view('inc/creditossbadmin2');
            $this->load->view('inc/footersbadmin2');
        } else {
            redirect('usuarios/panel', 'refresh');
        }
    }

    public function getMeses()
    {
       $result = $this->dashboard_model->getMes();
       echo json_encode($result);
    }

    public function general()
    {

        if ($this->session->userdata('tipo') == 'admin') {
            $lista = $this->dashboard_model->detalleGeneral();
            $data['general'] = $lista;

            $total = $this->dashboard_model->totalGeneral();
            $data['total'] = $total;

            $this->load->view('inc/headersbadmin2');
            $this->load->view('inc/sidebarsbadmin2');
            $this->load->view('inc/topbarsbadmin2');
            $this->load->view('dashboard/general', $data);
            $this->load->view('inc/creditossbadmin2');
            $this->load->view('inc/footersbadmin2');

        } else {
            redirect('usuarios/panel', 'refresh');
        }
    }

    public function reportId()
    {

        if ($this->session->userdata('tipo') == 'admin') {
            $lista = $this->dashboard_model->detalleGeneral();
            $data['general'] = $lista;

            $this->load->view('inc/headersbadmin2');
            $this->load->view('inc/sidebarsbadmin2');
            $this->load->view('inc/topbarsbadmin2');
            $this->load->view('dashboard/buscador', $data);
            $this->load->view('inc/creditossbadmin2');
            $this->load->view('inc/footersbadmin2');

        } else {
            redirect('usuarios/panel', 'refresh');
        }
    }

    public function buscarId()
    {
        $idPago=$_POST['idPagoMen'];
        $data['general']=$this->dashboard_model->buscarId($idPago);
        
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('dashboard/buscador',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function deuda()
    {
        $lista=$this->dashboard_model->detalleDeuda();
        $data['general']=$lista;
        $total = $this->dashboard_model->totalDeudas();
        $data['total'] = $total;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('dashboard/deudas',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

    public function generalPDF()
    {
        $lista=$this->dashboard_model->detalleGeneral();
        $lista=$lista->result();
        $lista2=$this->dashboard_model->totalGeneral();
        $lista2=$lista2->result();

        $this->pdf=new Pdf();
         $this->pdf->addPage('P', 'letter');
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("General"); //título en el encabezado

        $this->pdf->SetLeftMargin(20); //margen izquierdo
        $this->pdf->SetRightMargin(20); //margen derecho
        $this->pdf->SetFillColor(210, 210, 210); //color de fondo
        $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
        $this->pdf->Cell(0,5,'DETALLE GENERAL',0,1,'C',1);
        
        $this->pdf->Ln(5);

        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 8, 'Nro.', 'LTRB', 0, 'C', 0);
        $this->pdf->Cell(65, 8, utf8_decode('Estudiante'), 1, 0, 'C', 0);
        $this->pdf->Cell(35, 8, utf8_decode('Mes'), 1, 0, 'C', 0);
        $this->pdf->Cell(25, 8, utf8_decode('Año'), 1, 0, 'C', 0);
        $this->pdf->Cell(25, 8, utf8_decode('Monto (Bs.)'), 1, 0, 'C', 0);
        $this->pdf->Cell(25, 8, utf8_decode('Debe (Bs.)'), 1, 1, 'C', 0);


        ;
        foreach ($lista as $row) {

            $num=$row->idPagoMen;
            $estudiante = $row->nombres.' '.$row->apellidoPaterno.' '.$row->apellidoMaterno;
            $mes = $row->mes;
            $anio = $row->anio;
            $monto = $row->pagado;
            $deuda = $row->deuda;

            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(10, 5, $num, 1, 0, 'C', 0);
            $this->pdf->Cell(65, 5, utf8_decode($estudiante), 1, 0, 'L', false);
            $this->pdf->Cell(35, 5, utf8_decode($mes), 1, 0, 'C', false);
            $this->pdf->Cell(25, 5, utf8_decode($anio), 1, 0, 'C', false);
            $this->pdf->Cell(25, 5, utf8_decode($monto), 1, 0, 'C', false);
            $this->pdf->Cell(25, 5, utf8_decode($deuda), 1, 0, 'C', false);

            $this->pdf->Ln();

        }

        foreach ($lista2 as $row) {

            $totalLiteral = $row->Suma;
        $this->pdf->Ln(25);
        $this->pdf->Cell(25,5,utf8_decode('Ganancias:'),0,0,'L',0);
        $this->pdf->Cell(0, 5, utf8_decode(convertir($totalLiteral)), 0,1, 'L', 0);
        $this->pdf->Ln(10);
        $this->pdf->Cell(50,7,utf8_decode('Fecha de Impresión:'),0,0,'L',0);
        $this->pdf->SetFont('Arial','',11);
        $this->pdf->Cell(160,7,utf8_decode(date("d/m/Y")),0,1,'L',0);
        }
        

        $this->pdf->Output("DetalleGeneral.pdf", "I");
    }

    public function deudasPDF()
    {
        $lista=$this->dashboard_model->detalleDeuda();
        $lista=$lista->result();
        $lista2=$this->dashboard_model->totalDeudas();
        $lista2=$lista2->result();

        $this->pdf=new Pdf();
         $this->pdf->addPage('P', 'letter');
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("General"); //título en el encabezado

        $this->pdf->SetLeftMargin(20); //margen izquierdo
        $this->pdf->SetRightMargin(20); //margen derecho
        $this->pdf->SetFillColor(210, 210, 210); //color de fondo
        $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
        $this->pdf->Cell(0,5,'DETALLE DEUDAS',0,1,'C',1);
        
        $this->pdf->Ln(5);

        $this->pdf->SetFont('Arial', 'B', 11);
        $this->pdf->Cell(10, 8, 'Nro.', 'LTRB', 0, 'C', 0);
        $this->pdf->Cell(65, 8, utf8_decode('Estudiante'), 1, 0, 'C', 0);
        $this->pdf->Cell(35, 8, utf8_decode('Mes'), 1, 0, 'C', 0);
        $this->pdf->Cell(25, 8, utf8_decode('Año'), 1, 0, 'C', 0);
        $this->pdf->Cell(25, 8, utf8_decode('Monto (Bs.)'), 1, 0, 'C', 0);
        $this->pdf->Cell(25, 8, utf8_decode('Debe (Bs.)'), 1, 1, 'C', 0);


        ;
        foreach ($lista as $row) {

            $num=$row->idPagoMen;
            $estudiante = $row->nombres.' '.$row->apellidoPaterno.' '.$row->apellidoMaterno;
            $mes = $row->mes;
            $anio = $row->anio;
            $monto = $row->pagado;
            $deuda = $row->deuda;

            $this->pdf->SetFont('Arial', '', 10);
            $this->pdf->Cell(10, 5, $num, 1, 0, 'C', 0);
            $this->pdf->Cell(65, 5, utf8_decode($estudiante), 1, 0, 'L', false);
            $this->pdf->Cell(35, 5, utf8_decode($mes), 1, 0, 'C', false);
            $this->pdf->Cell(25, 5, utf8_decode($anio), 1, 0, 'C', false);
            $this->pdf->Cell(25, 5, utf8_decode($monto), 1, 0, 'C', false);
            $this->pdf->Cell(25, 5, utf8_decode($deuda), 1, 0, 'C', false);

            $this->pdf->Ln();

        }

        foreach ($lista2 as $row) {

        $totalLiteral = $row->Suma;
        $this->pdf->Ln(25);
        $this->pdf->Cell(25,5,utf8_decode('Total Deudas:'),0,0,'L',0);
        $this->pdf->Cell(0, 5, utf8_decode(convertir($totalLiteral)), 0,1, 'L', 0);
        $this->pdf->Ln(10);
        $this->pdf->Cell(50,7,utf8_decode('Fecha de Impresión:'),0,0,'L',0);
        $this->pdf->SetFont('Arial','',11);
        $this->pdf->Cell(160,7,utf8_decode(date("d/m/Y")),0,1,'L',0);
        }
        

        $this->pdf->Output("DetalleDeudas.pdf", "I");
    }

  }
