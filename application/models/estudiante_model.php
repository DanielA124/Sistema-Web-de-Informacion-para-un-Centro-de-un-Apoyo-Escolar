<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante_model extends CI_Model {


	public function listaEstudiantes()
	{
        $this->db->select('idEstudiante, nombres, apellidoPaterno, apellidoMaterno, edad, sexo, colegio, grado, estado, fechaReg, fechaAct'); //select *
        $this->db->from('estudiante'); //tabla
        $this->db->where('estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarEstudiante($data)
    {
        $this->db->trans_begin();
        $this->db->insert('estudiante',$data); //tabla
    }

    public function recuperarEstudiante($idEstudiante)
    {
        $this->db->select('idEstudiante, nombres, apellidoPaterno, apellidoMaterno, edad, sexo, colegio, grado, estado, fechaReg, fechaAct'); //select *
        $this->db->from('estudiante'); //tabla;
        $this->db->where('estudiante.idEstudiante', $idEstudiante);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarEstudiante($idEstudiante,$data)
    {

        $this->db->where('idEstudiante',$idEstudiante);
        $this->db->update('estudiante', $data);

    }

    public function listaestudiantesdeshabilitados()
    {
        $this->db->select('idEstudiante, nombres, apellidoPaterno, apellidoMaterno, edad, sexo, colegio, grado, estado, fechaReg, fechaAct'); //select *
        $this->db->from('estudiante'); //tabla
        $this->db->where('estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
