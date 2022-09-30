<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivo extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->archivo_model->listaArchivo();
        $data['archivos']=$lista;

        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('archivo/documento/lista',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
		
	}

    ///////////////////// Agregar Archivos Formato Word
    public function agregarWord()
    {
      
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('archivo/documento/insertW');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

    public function agregarbdWord()
    {
        $data['idPlantilla']=$_POST['idPlantilla'];

        $nombrearchivo=$data['idPlantilla'].'.docx';

        // Ruta donde se guardan los archivos
        $config['upload_path']='./files';
        //Nombre del archivo
        $config['file_name']=$nombrearchivo;
        $config['remove_spaces']=$nombrearchivo;
        $direccion="./files/".$nombrearchivo;

        if(file_exists($direccion))
        {
            unlink($direccion); // para borrar archivo
        }
        
        // Tipos de archivos permitidos
        $config['allowed_types']='docx';
        $this->load->library('upload',$config);

        if(!$this->upload->do_upload())
        {
            $data['error']=$this->upload->display_errors(); 
        }
        else
        {
            $data['tipo']=$nombrearchivo;
        }
        

        $this->archivo_model->agregarArchivos($data);
        redirect('archivo/index','refresh');        
    }

    /////////////////// Fin de Insercion Word

    ///////////////////// Agregar Archivos Formato Excel
    public function agregarExcel()
    {
      
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('archivo/documento/insertE');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

    public function agregarbdExcel()
    {
        $data['idPlantilla']=$_POST['idPlantilla'];

        $nombrearchivo=$data['idPlantilla'].'.xls';

        // Ruta donde se guardan los archivos
        $config['upload_path']='./files';
        //Nombre del archivo
        $config['file_name']=$nombrearchivo;
        $config['remove_spaces']=$nombrearchivo;
        $direccion="./files/".$nombrearchivo;

        if(file_exists($direccion))
        {
            unlink($direccion); // para borrar archivo
        }
        
        // Tipos de archivos permitidos
        $config['allowed_types']='xls';
        $this->load->library('upload',$config);

        if(!$this->upload->do_upload())
        {
            $data['error']=$this->upload->display_errors(); 
        }
        else
        {
            $data['tipo']=$nombrearchivo;
        }
        

        $this->archivo_model->agregarArchivos($data);
        redirect('archivo/index','refresh');        
    }

    /////////////////// Fin de Insercion Excel
    
    ///////////////////// Agregar Archivos Formato PDF
    public function agregarPDF()
    {
      
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('archivo/documento/insertP');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

    public function agregarbdPDF()
    {
        $data['idPlantilla']=$_POST['idPlantilla'];

        $nombrearchivo=$data['idPlantilla'].'.pdf';

        // Ruta donde se guardan los archivos
        $config['upload_path']='./files';
        //Nombre del archivo
        $config['file_name']=$nombrearchivo;
        $config['remove_spaces']=$nombrearchivo;
        $direccion="./files/".$nombrearchivo;

        if(file_exists($direccion))
        {
            unlink($direccion); // para borrar archivo
        }
        
        // Tipos de archivos permitidos
        $config['allowed_types']='pdf';
        $this->load->library('upload',$config);

        if(!$this->upload->do_upload())
        {
            $data['error']=$this->upload->display_errors(); 
        }
        else
        {
            $data['tipo']=$nombrearchivo;
        }
        

        $this->archivo_model->agregarArchivos($data);
        redirect('archivo/index','refresh');        
    }

    /////////////////// Fin de Insercion Excel

    ///////////////////// Agregar Archivos Formato PNG
    public function agregarJPG()
    {
      
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('archivo/documento/insertJ');
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

    public function agregarbdJPG()
    {
        $data['idPlantilla']=$_POST['idPlantilla'];

        $nombrearchivo=$data['idPlantilla'].'.jpg';

        // Ruta donde se guardan los archivos
        $config['upload_path']='./files';
        //Nombre del archivo
        $config['file_name']=$nombrearchivo;
        $config['remove_spaces']=$nombrearchivo;
        $direccion="./files/".$nombrearchivo;

        if(file_exists($direccion))
        {
            unlink($direccion); // para borrar archivo
        }
        
        // Tipos de archivos permitidos
        $config['allowed_types']='jpg';
        $this->load->library('upload',$config);

        if(!$this->upload->do_upload())
        {
            $data['error']=$this->upload->display_errors(); 
        }
        else
        {
            $data['tipo']=$nombrearchivo;
        }
        

        $this->archivo_model->agregarArchivos($data);
        redirect('archivo/index','refresh');        
    }

    /////////////////// Fin de Insercion Excel

    public function deshabilitarbd()
    {
        $idArchivo=$_POST['idArchivo'];
        $data['estado']='0';
        $this->archivo_model->modificarArchivos($idArchivo,$data);
        redirect('archivo/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->archivo_model->listadatosdeshabilitados();
        $data['archivos']=$lista;
        $this->load->view('inc/headersbadmin2');
        $this->load->view('inc/sidebarsbadmin2');
        $this->load->view('inc/topbarsbadmin2');
        $this->load->view('archivo/documento/listadeshabilitados',$data);
        $this->load->view('inc/creditossbadmin2');
        $this->load->view('inc/footersbadmin2');
        
    }

        public function habilitarbd()
    {
        $idArchivo=$_POST['idArchivo'];
        $data['estado']='1';
        $this->archivo_model->modificarArchivos($idArchivo,$data);
        redirect('archivo/deshabilitados','refresh');
    }
  }
