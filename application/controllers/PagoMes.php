<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagoMes extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->pagosmes_model->listaInicial();
        $data['pago']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('pagoMes/lista',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
		
	}

    public function pagado()
    {
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->pagosmes_model->listaPagos();
        $data['pago']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('pagoMes/listaPagados',$data);
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
        $lista=$this->pagosmes_model->listaPagos();
        $data['pago']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('pagoMes/listaH',$data);
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
        $this->load->view('pagoMes/insert');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
		
	}

        public function estudianteList()
    {
        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->estudiante_model->getEstudiante($postData);

        echo json_encode($data);
    }

        public function agregarbd()
	{
        $data['idInscripcion']=$_POST['idInscripcion'];
        $data['total']=$_POST['total'];
        $data['pagado']=0;
        $data['deuda'] = $data['total'] - $data['pagado'];
        if ($data['total'] == $data['pagado']){
            $data['estado']=1;

        }
        else{
            $data['estado']=0;
        }

        $data['mes']=$_POST['mes'];
        $data['anio']=$_POST['anio'];
        $data['fecha']=date("Y-m-d");
        $data['idUsuario']=$this->session->userdata('idusuario');

        $idPagoMen1= $this->pagosmes_model->agregarPago($data);

        $dato['saldo']=$_POST['saldo'];
        $dato['idPagoMen']=$idPagoMen1;
        $this->pagosmes_model->agregarSaldo($dato);

        $idPagoMen= $idPagoMen1;
        $datos['pagado']=$dato['saldo'];
        $datos['deuda'] = $data['total'] - $datos['pagado'];
        $this->pagosmes_model->modificarPagos($idPagoMen, $datos);

        redirect('pagoMes/reportemodal','refresh');
	}

    public function reportemodal()
    {
      
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('pagoMes/modal');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }


        public function modificar()
    {
        $idPagoMen=$_POST['idPagoMen'];
        $data['infoPagoMen']=$this->pagosmes_model->recuperarPago($idPagoMen);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('pagoMes/update',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function modificarbd()
    {
        $dato['saldo']=$_POST['saldoPagado'];
        $dato['idPagoMen']=$_POST['idPagoMen'];
        $this->pagosmes_model->agregarSaldo($dato);

        $idPagoMen=$_POST['idPagoMen'];
        $deuda=$_POST['saldoPagado'];
        $total=$_POST['total'];
        $pagado=$_POST['pagado'];
        $aumpago=$pagado+$deuda;
        $resdeuda=$total-$aumpago;
        $datos['deuda']=$resdeuda;
        $datos['pagado']=$aumpago;
        if ($total == $aumpago){
            $datos['estado']=1;
        }
        else{
            $datos['estado']=0;
        }
        $datos['fechaAct']=date("Y-m-d (H:i:s)");

        $this->pagosmes_model->modificarPagos($idPagoMen,$datos);
        redirect('pagoMes/index','refresh');
    }

    public function deshabilitados()
    {
        $lista=$this->pagosmes_model->listaPagosDeudas();
        $data['pago']=$lista;
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('pagoMes/listadeshabilitados',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

    public function reportepdf()
    {
            
            $req = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $req = $req->result(); //convertir a array bidemencional

            $this->pdf = new Pdf();
            $this->pdf->addPage('P', 'letter');
            $this->pdf->AliasNbPages();
            $this->pdf->SetTitle("Factura"); //título en el encabezado

            $this->pdf->SetLeftMargin(20); //margen izquierdo
            $this->pdf->SetRightMargin(20); //margen derecho
            $this->pdf->SetFillColor(210, 210, 210); //color de fondo
            $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
            $this->pdf->Cell(0,5,'COMPROBANTE',0,1,'C',1);
            $this->pdf->Cell(0,5,'DETALLE DE PAGO',0,1,'C',1);
            $this->pdf->Ln();
            $this->pdf->Image("img/CruzdelSur.png", 160, 30, 40, 40, 'PNG');
            $this->pdf->SetFont('Arial', 'B', 10);
            $this->pdf->Ln(0);
            $this->pdf->Ln(0);

            $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rowa) {
                $act = $rowa->PNombre.' '.$rowa->PPaterno.' '.$rowa->PMaterno;
            }
            $this->pdf->Cell(50, 7, utf8_decode('Cliente:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($act), 0, 1, 'L', 0);

            $this->pdf->Ln(0);
            $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $num =($rows->numReferencia);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Celular:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($num), 0, 1, 'L', 0);


            $this->pdf->Ln(0);
             $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $usuario =$rows->nombreUsuario;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Usuario asignado:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($usuario), 0, 1, 'L', 0);
            
            $this->pdf->Ln(0);
             $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $turno =$rows->horario;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Horario Elegido:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($turno), 0, 1, 'L', 0);
            

            $this->pdf->Ln(0);
            $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $fechaRegistro =formatearFecha($rows->fecha);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Fecha Registro:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($fechaRegistro), 0, 1, 'L', 0);

   
            $this->pdf->Ln(5);

            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(10, 8, 'Nro.', 'LTRB', 0, 'C', 0);
            $this->pdf->Cell(70, 8, utf8_decode('Estudiante'), 1, 0, 'C', 0);
            $this->pdf->Cell(25, 8, utf8_decode('Mes'), 1, 0, 'C', 0);
            $this->pdf->Cell(20, 8, utf8_decode('Año'), 1, 0, 'C', 0);
            $this->pdf->Cell(25, 8, utf8_decode('Monto (Bs.)'), 1, 0, 'C', 0);
            $this->pdf->Cell(25, 8, utf8_decode('Debe (Bs.)'), 1, 1, 'C', 0);


            $num = 1;
            foreach ($req as $row) {

                $estudiante = $row->ENombre.' '.$row->EPaterno.' '.$row->EMaterno;
                $mes = $row->mes;
                $anio = $row->anio;
                $monto = $row->pagado;
                $deuda = $row->deuda;

                $this->pdf->SetFont('Arial', '', 10);
                $this->pdf->Cell(10, 5, $num, 1, 0, 'C', 0);
                $this->pdf->Cell(70, 5, utf8_decode($estudiante), 1, 0, 'L', false);
                $this->pdf->Cell(25, 5, utf8_decode($mes), 1, 0, 'C', false);
                $this->pdf->Cell(20, 5, utf8_decode($anio), 1, 0, 'C', false);
                $this->pdf->Cell(25, 5, utf8_decode($monto), 1, 0, 'C', false);
                $this->pdf->Cell(25, 5, utf8_decode($deuda), 1, 0, 'C', false);

                $this->pdf->Ln();

                $num++;
            }
            $totalLiteral = $row->pagado;
            $this->pdf->Ln(25);
            $this->pdf->Cell(10,5,utf8_decode('Son:'),0,0,'L',0);
            $this->pdf->Cell(0, 5, utf8_decode(convertir($totalLiteral)), 0,1, 'J', 0);
            $this->pdf->Ln(5);
            $this->pdf->MultiCell(0, 5, utf8_decode('El presente es un comprobante de la compra realizada por el cliente.'), 0, 'J', 0);

            $this->pdf->Output("FacturaPago.pdf", "I");
    }

    public function reportepdfCopia()
    {
            
            $req = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $req = $req->result(); //convertir a array bidemencional

            $this->pdf = new Pdf();
            $this->pdf->addPage('P', 'letter');
            $this->pdf->AliasNbPages();
            $this->pdf->SetTitle("Factura Copia"); //título en el encabezado

            $this->pdf->SetLeftMargin(20); //margen izquierdo
            $this->pdf->SetRightMargin(20); //margen derecho
            $this->pdf->SetFillColor(210, 210, 210); //color de fondo
            $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
            $this->pdf->Cell(0,5,'COMPROBANTE',0,1,'C',1);
            $this->pdf->Cell(0,5,'DETALLE DE PAGO (COPIA)',0,1,'C',1);
            $this->pdf->Ln();
            $this->pdf->Image("img/CruzdelSur.png", 160, 30, 40, 40, 'PNG');
            $this->pdf->SetFont('Arial', 'B', 10);
            $this->pdf->Ln(0);
            $this->pdf->Ln(0);

            $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rowa) {
                $act = $rowa->PNombre.' '.$rowa->PPaterno.' '.$rowa->PMaterno;
            }
            $this->pdf->Cell(50, 7, utf8_decode('Cliente:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($act), 0, 1, 'L', 0);

            $this->pdf->Ln(0);
            $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $num =($rows->numReferencia);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Celular:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($num), 0, 1, 'L', 0);


            $this->pdf->Ln(0);
             $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $usuario =$rows->nombreUsuario;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Usuario asignado:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($usuario), 0, 1, 'L', 0);
            
            $this->pdf->Ln(0);
             $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $turno =$rows->horario;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Horario Elegido:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($turno), 0, 1, 'L', 0);
            

            $this->pdf->Ln(0);
            $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $fechaRegistro =formatearFecha($rows->fecha);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Fecha Registro:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($fechaRegistro), 0, 1, 'L', 0);

   
            $this->pdf->Ln(5);

            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(10, 8, 'Nro.', 'LTRB', 0, 'C', 0);
            $this->pdf->Cell(70, 8, utf8_decode('Estudiante'), 1, 0, 'C', 0);
            $this->pdf->Cell(25, 8, utf8_decode('Mes'), 1, 0, 'C', 0);
            $this->pdf->Cell(20, 8, utf8_decode('Año'), 1, 0, 'C', 0);
            $this->pdf->Cell(25, 8, utf8_decode('Monto (Bs.)'), 1, 0, 'C', 0);
            $this->pdf->Cell(25, 8, utf8_decode('Debe (Bs.)'), 1, 1, 'C', 0);


            $num = 1;
            foreach ($req as $row) {

                $estudiante = $row->ENombre.' '.$row->EPaterno.' '.$row->EMaterno;
                $mes = $row->mes;
                $anio = $row->anio;
                $monto = $row->pagado;
                $deuda = $row->deuda;

                $this->pdf->SetFont('Arial', '', 10);
                $this->pdf->Cell(10, 5, $num, 1, 0, 'C', 0);
                $this->pdf->Cell(70, 5, utf8_decode($estudiante), 1, 0, 'L', false);
                $this->pdf->Cell(25, 5, utf8_decode($mes), 1, 0, 'C', false);
                $this->pdf->Cell(20, 5, utf8_decode($anio), 1, 0, 'C', false);
                $this->pdf->Cell(25, 5, utf8_decode($monto), 1, 0, 'C', false);
                $this->pdf->Cell(25, 5, utf8_decode($deuda), 1, 0, 'C', false);

                $this->pdf->Ln();

                $num++;
            }
            $totalLiteral = $row->pagado;
            $this->pdf->Ln(25);
            $this->pdf->Cell(10,5,utf8_decode('Son:'),0,0,'L',0);
            $this->pdf->Cell(0, 5, utf8_decode(convertir($totalLiteral)), 0,1, 'J', 0);
            $this->pdf->Ln(5);
            $this->pdf->MultiCell(0, 5, utf8_decode('El presente es un comprobante de la compra realizada por el cliente.'), 0, 'J', 0);

            $this->pdf->Output("FacturaPagoCopy.pdf", "I");
    }

    public function historial()
    {
        $idPagoMen=$_POST['idPagoMen'];
        $data['idPagoMen']=$idPagoMen;
        $data['infoHistorial']=$this->pagosmes_model->historial($idPagoMen);
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('pagoMes/historial',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }

    public function historialPDF()
    {
            
            $req = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $req = $req->result(); //convertir a array bidemencional
            $his = $this->pagosmes_model->historial($_POST['idPagoMen']);
            $his = $his->result(); //convertir a array bidemencional

            $this->pdf = new Pdf();
            $this->pdf->addPage('P', 'letter');
            $this->pdf->AliasNbPages();
            $this->pdf->SetTitle("Factura"); //título en el encabezado

            $this->pdf->SetLeftMargin(20); //margen izquierdo
            $this->pdf->SetRightMargin(20); //margen derecho
            $this->pdf->SetFillColor(210, 210, 210); //color de fondo
            $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
            $this->pdf->Cell(0,5,'HISTORIAL DE PAGOS',0,1,'C',1);
            $this->pdf->Ln();
            $this->pdf->Image("img/CruzdelSur.png", 160, 30, 40, 40, 'PNG');
            $this->pdf->SetFont('Arial', 'B', 10);
            $this->pdf->Ln(0);
            $this->pdf->Ln(0);

            $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rowa) {
                $act = $rowa->PNombre.' '.$rowa->PPaterno.' '.$rowa->PMaterno;
            }
            $this->pdf->Cell(50, 7, utf8_decode('Cliente:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($act), 0, 1, 'L', 0);

            $this->pdf->Ln(0);
            $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $num =($rows->numReferencia);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Celular:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($num), 0, 1, 'L', 0);


            $this->pdf->Ln(0);
             $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $usuario =$rows->nombreUsuario;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Usuario asignado:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($usuario), 0, 1, 'L', 0);
            
            $this->pdf->Ln(0);
             $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $turno =$rows->horario;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Turno Asignado:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($turno), 0, 1, 'L', 0);
            

            $this->pdf->Ln(0);
            $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $fechaRegistro =formatearFecha($rows->fecha);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Fecha Inscrito:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($fechaRegistro), 0, 1, 'L', 0);


            $this->pdf->Ln(0);
            $actividad = $this->pagosmes_model->reporteFactura($_POST['idPagoMen']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $estudiante =$rows->ENombre.' '.$rows->EPaterno.' '.$rows->EMaterno;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Estudiante:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($estudiante), 0, 1, 'L', 0);
   
            $this->pdf->Ln(20);

            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(30, 8, ' ', 0, 0, 'C', 0);
            $this->pdf->Cell(30, 8, 'Nro.', 'LTRB', 0, 'C', 0);
            $this->pdf->Cell(40, 8, utf8_decode('Saldo'), 1, 0, 'C', 0);
            $this->pdf->Cell(40, 8, utf8_decode('Fecha Pagado'), 1, 1, 'C', 0);


            $num = 1;
            foreach ($his as $row) {

                $saldo = $row->saldo.' Bs.';
                $fechaPago = formatearFecha($row->fechaReg);

                $this->pdf->SetFont('Arial', '', 10);
                $this->pdf->Cell(30, 8, ' ', 0, 0, 'C', 0);
                $this->pdf->Cell(30, 5, $num, 1, 0, 'C', 0);
                $this->pdf->Cell(40, 5, utf8_decode($saldo), 1, 0, 'C', false);
                $this->pdf->Cell(40, 5, utf8_decode($fechaPago), 1, 0, 'C', false);

                $this->pdf->Ln();

                $num++;
            }

            

            $this->pdf->Output("Historial.pdf", "I");
    }

  }
