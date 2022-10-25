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
                $act = $rowa->nombres.' '.$rowa->apellidoPaterno;
            }
            $this->pdf->Cell(50, 7, utf8_decode('Cliente:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($act), 0, 1, 'L', 0);

            $this->pdf->Ln(0);
            $actividad = $this->detalle_model->detalle($_POST['idPago']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $ci =($rows->colegio);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('C.I.:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($ci), 0, 1, 'L', 0);


            $this->pdf->Ln(0);
             $actividad = $this->detalle_model->detalle($_POST['idPago']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $usuario =$rows->apellidoMaterno;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Usuario asignado:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($usuario), 0, 1, 'L', 0);
            
            $this->pdf->Ln(0);
             $actividad = $this->detalle_model->detalle($_POST['idPago']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $nombreSucursal =$rows->edad;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Sucursal:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($nombreSucursal), 0, 1, 'L', 0);
            

            $this->pdf->Ln(0);
            $actividad = $this->detalle_model->detalle($_POST['idPago']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $fechaRegistro =formatearFecha($rows->fechaReg);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('fecha y hora de registro:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($fechaRegistro), 0, 1, 'L', 0);

   
            $this->pdf->Ln(5);

            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(10, 8, 'Nro.', 'LTRB', 0, 'C', 0);
            $this->pdf->Cell(55, 8, utf8_decode('Venta'), 1, 0, 'C', 0);
            $this->pdf->Cell(15, 8, utf8_decode('P/U'), 1, 0, 'C', 0);
            $this->pdf->Cell(20, 8, utf8_decode('Cantidad'), 1, 0, 'C', 0);
            $this->pdf->Cell(17, 8, utf8_decode('Total Bs'), 1, 1, 'C', 0);


            $num = 1;
            foreach ($req as $row) {

                $descripcion = $row->mes;
                $precio = $row->anio;
                $cantidad = $row->monto;
                $total = $row->total;

                $this->pdf->SetFont('Arial', '', 10);
                $this->pdf->Cell(10, 5, $num, 1, 0, 'C', 0);
                $this->pdf->Cell(55, 5, utf8_decode($descripcion), 1, 0, 'L', false);
                $this->pdf->Cell(15, 5, utf8_decode($precio), 1, 0, 'C', false);
                $this->pdf->Cell(20, 5, utf8_decode($cantidad), 1, 0, 'C', false);
                $this->pdf->Cell(17, 5, utf8_decode($total), 1, 0, 'C', false);

                $this->pdf->Ln();

                $num++;
            }
            $total1 = $row->total;
            $this->pdf->Ln(5);
            $this->pdf->MultiCell(0, 5, utf8_decode(convertir($total1)), 0, 'J', 0);
            $this->pdf->Ln(5);
            $this->pdf->MultiCell(0, 5, utf8_decode('El presente es un comprobante de la compra realizada por el cliente.'), 0, 'J', 0);

            $this->pdf->Ln(50);
            $this->pdf->Cell(50,7,utf8_decode('Fecha de imprecion:'),0,0,'L',0);
            $this->pdf->SetFont('Arial','',11);
            $this->pdf->Cell(160,7,utf8_decode(date("d/m/Y")),0,1,'L',0);

            $this->pdf->Output("DetalleRequerimiento.pdf", "I");
    }

    

  }
