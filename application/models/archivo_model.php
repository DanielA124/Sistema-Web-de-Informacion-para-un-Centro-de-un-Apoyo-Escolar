<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivo_model extends CI_Model {


	public function listaArchivo()
	{
        $this->db->select('idArchivo, plantilla.nombre nombre, tipo, archivos.idPlantilla idPlantilla'); //select *
        $this->db->from('archivos'); //tabla
        $this->db->join('plantilla', 'archivos.idPlantilla = plantilla.idPlantilla');
        $this->db->where('plantilla.estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
	}    

    public function agregarArchivos($data)
    {
        $this->db->insert('archivos',$data); //tabla
    }

    public function recuperarArchivos($idArchivo)
    {
        $this->db->select('*'); //select *
        $this->db->from('archivos'); //tabla
        $this->db->where('idArchivo',$idArchivo);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarArchivos($idArchivo,$data)
    {
        $this->db->where('idArchivo',$idArchivo);
        $this->db->update('archivos',$data);
    }

    public function listadatosdeshabilitados()
    {
        $this->db->select('idArchivo, plantilla.nombre,tipo, archivo.idPlantilla'); //select *
        $this->db->from('archivos'); //tabla
        $this->db->join('plantilla', 'archivos.idPlantilla = plantilla.idPlantilla');
        $this->db->where('plantilla.estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}