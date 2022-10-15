<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensualidad_model extends CI_Model {


	public function listaMensualidad()
	{
        $this->db->select('idMensualidad, mes, anio, monto,
        estudiante.nombres ENombre, estudiante.apellidoPaterno EApP, estudiante.apellidoMaterno EApM'); //select *
        $this->db->from('mensualidad'); //tabla
        $this->db->join('inscripcion', 'mensualidad.idInscripcion = inscripcion.idInscripcion');
        $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarMensualidad($data)
    {
        $this->db->insert('mensualidad',$data); //tabla
        return $this->db->insert_id();
    }

    public function eliminarMensualidad($idMensualidad)
    {
        $this->db->where('idMensualidad',$idMensualidad);
        $this->db->delete('mensualidad');
    }

    public function recuperarMensualidad($idMensualidad)
    {
        $this->db->select('*'); //select *
        $this->db->from('mensualidad'); //tabla
        $this->db->where('idMensualidad',$idMensualidad);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarMensualidad($idMensualidad,$data)
    {
        $this->db->where('idMensualidad',$idMensualidad);
        $this->db->update('mensualidad',$data);
    }

}
