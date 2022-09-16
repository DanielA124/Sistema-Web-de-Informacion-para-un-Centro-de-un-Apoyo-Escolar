<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plantilla_model extends CI_Model {


	public function listaplantilla()
	{
        $this->db->select('idPlantilla, nombre,documento, fechaReg, fechaAct, plantilla.idMateria, idProfesor, materia.nombreMateria'); //select *
        $this->db->from('plantilla'); //tabla
        $this->db->join('materia', 'plantilla.idMateria = materia.idMateria');
        $this->db->where('estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
	}    

    public function agregardatos($data)
    {
        $this->db->insert('plantilla',$data); //tabla
    }

    public function recuperardatos($idPlantilla)
    {
        $this->db->select('*'); //select *
        $this->db->from('plantilla'); //tabla
        $this->db->where('idPlantilla',$idPlantilla);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificardatos($idPlantilla,$data)
    {
        $this->db->where('idPlantilla',$idPlantilla);
        $this->db->update('plantilla',$data);
    }

    public function listadatosdeshabilitados()
    {
        $this->db->select('idPlantilla, nombre,documento, fechaReg, fechaAct, plantilla.idMateria, idProfesor, materia.nombreMateria'); //select *
        $this->db->from('plantilla'); //tabla
        $this->db->join('materia', 'plantilla.idMateria = materia.idMateria');
        $this->db->where('estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}