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
        $data['pagado']=$_POST['pagado'];
        $data['deuda'] = $data['total'] - $data['pagado'];
        if ($data['total'] == $data['pagado']){
            $data['estado']=1;

        }
        else{
            $data['estado']=0;
        }

        $data['mes']=$_POST['mes'];
        $data['anio']=date("Y");
        $data['fecha']=date("Y-m-d");
        $data['idUsuario']=$this->session->userdata('idusuario');

        $this->pagosmes_model->agregarPago($data);
        redirect('pagoMes/index','refresh');
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
        $idPagoMen=$_POST['idPagoMen'];
        $deuda=$_POST['saldoPagado'];
        $total=$_POST['total'];
        $pagado=$_POST['pagado'];
        $aumpago=$pagado+$deuda;
        $resdeuda=$total-$aumpago;
        $data['deuda']=$resdeuda;
        $data['pagado']=$aumpago;
        if ($total == $aumpago){
            $data['estado']=1;
        }
        else{
            $data['estado']=0;
        }
        $data['fechaAct']=date("Y-m-d (H:i:s)");

        $this->pagosmes_model->modificarPagos($idPagoMen,$data);
        redirect('pagoMes/deshabilitados','refresh');
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
  }
