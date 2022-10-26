<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detalle extends CI_Controller {
    
    public function index()
    {

        if ($this->session->userdata('tipo') == 'admin') {
            $lista = $this->detalle_model->listaDetalle();
            $data['detallepago'] = $lista;

            $this->load->view('inc/headersbadmin2');
            $this->load->view('inc/sidebarsbadmin2');
            $this->load->view('inc/topbarsbadmin2');
            $this->load->view('detalle/lista', $data);
            $this->load->view('inc/creditossbadmin2');
            $this->load->view('inc/footersbadmin2');

            /*$this->load->view('inc/header');
        $this->load->view('lista_read',$data);
        $this->load->view('inc/footer');*/
        } else {
            redirect('usuarios/panel', 'refresh');
        }
    }

    public function agregar()
    {

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('detalle/insert');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
    }


    public function buscar()
    {
        $search_data = $this->input->post('producto');

        $query = $this->detalle_model->buscarProducto($search_data);
        $datos = json_encode($query->result());
        if (!empty($query->result())) {


            foreach ($query->result() as $row) {
                echo "<li class='list-group-item'><a href='javascript:void(0)' data-producto='producto'>$row->nombreMarca</a></li>";
            }
        } else {
            echo "<li> <em> No se encuentra... </em> </li>";
        }
    }

    public function estudianteList()
    {
        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->estudiante_model->getEstudiante($postData);

        echo json_encode($data);
    }

     public function insertVenta()
    {
        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->detalle_model->registrar($postData);

        echo json_encode($data);
    }

    public function reportepdf()
    {

            $req = $this->detalle_model->detalle($_POST['idPago']);
            $req = $req->result(); //convertir a array bidemencional

            $this->pdf = new Pdf();
            $this->pdf->addPage('P', 'A5');
            $this->pdf->AliasNbPages();
            $this->pdf->SetTitle("Observaciones"); //título en el encabezado

            $this->pdf->SetLeftMargin(20); //margen izquierdo
            $this->pdf->SetRightMargin(20); //margen derecho
            $this->pdf->SetFillColor(210, 210, 210); //color de fondo
            $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
            $this->pdf->Cell(0,5,'COMPROBANTE',0,1,'C',1);
            $this->pdf->Cell(0,5,'DETALLE DE PAGO',0,1,'C',1);
            
            $this->pdf->Ln(0);

            $actividad = $this->detalle_model->detalle($_POST['idPago']);
            $actividad = $actividad->result();
            foreach ($actividad as $rowa) {
                $act = $rowa->PNombre.' '.$rowa->PPaterno.' '.$rowa->PMaterno;
            }
            $this->pdf->Cell(50, 7, utf8_decode('Cliente:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($act), 0, 1, 'L', 0);

            $this->pdf->Ln(0);
            $actividad = $this->detalle_model->detalle($_POST['idPago']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $num =($rows->numReferencia);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Celular:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($num), 0, 1, 'L', 0);


            $this->pdf->Ln(0);
             $actividad = $this->detalle_model->detalle($_POST['idPago']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $usuario =$rows->nombreUsuario;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Usuario asignado:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($usuario), 0, 1, 'L', 0);
            
            $this->pdf->Ln(0);
             $actividad = $this->detalle_model->detalle($_POST['idPago']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $turno =$rows->horario;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Horario Elegido:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($turno), 0, 1, 'L', 0);
            

            $this->pdf->Ln(0);
            $actividad = $this->detalle_model->detalle($_POST['idPago']);
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
            $this->pdf->Cell(55, 8, utf8_decode('Estudiante'), 1, 0, 'C', 0);
            $this->pdf->Cell(15, 8, utf8_decode('Mes'), 1, 0, 'C', 0);
            $this->pdf->Cell(20, 8, utf8_decode('Año'), 1, 0, 'C', 0);
            $this->pdf->Cell(17, 8, utf8_decode('Monto'), 1, 1, 'C', 0);


            $num = 1;
            foreach ($req as $row) {

                $estudiante = $row->ENombre.' '.$row->EPaterno.' '.$row->EMaterno;
                $mes = $row->mes;
                $anio = $row->anio;
                $monto = $row->monto;

                $this->pdf->SetFont('Arial', '', 10);
                $this->pdf->Cell(10, 5, $num, 1, 0, 'C', 0);
                $this->pdf->Cell(55, 5, utf8_decode($estudiante), 1, 0, 'L', false);
                $this->pdf->Cell(15, 5, utf8_decode($mes), 1, 0, 'C', false);
                $this->pdf->Cell(20, 5, utf8_decode($anio), 1, 0, 'C', false);
                $this->pdf->Cell(17, 5, utf8_decode($monto), 1, 0, 'C', false);

                $this->pdf->Ln();

                $num++;
            }
            $totalLiteral = $row->total;
            $this->pdf->Ln(5);
            $this->pdf->MultiCell(0, 5, utf8_decode(convertir($totalLiteral)), 0, 'J', 0);
            $this->pdf->Ln(5);
            $this->pdf->MultiCell(0, 5, utf8_decode('El presente es un comprobante de la compra realizada por el cliente.'), 0, 'J', 0);

            $this->pdf->Ln(50);
            $this->pdf->Cell(50,7,utf8_decode('Fecha de imprecion:'),0,0,'L',0);
            $this->pdf->SetFont('Arial','',11);
            $this->pdf->Cell(160,7,utf8_decode(date("d/m/Y")),0,1,'L',0);

            $this->pdf->Output("FacturaPago.pdf", "I");
    }

    

  }
