<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detalle_model extends CI_Model {


	public function listaDetalle()
	{
        $this->db->select('detallepago.idPago, usuario.nombreUsuario, pago.fecha, pago.total, 
                          detallepago.idMensualidad, mensualidad.mes, mensualidad.anio, mensualidad.monto,
                          estudiante.nombres, estudiante.apellidoPaterno, estudiante.apellidoMaterno, detallepago.estado '); //select *
        $this->db->from('detallepago'); //tabla]
        $this->db->join('pago', 'detallepago.idPago = pago.idPago');
        $this->db->join('usuario', 'pago.idUsuario = usuario.idUsuario');
        $this->db->join('mensualidad', 'detallepago.idMensualidad = mensualidad.idMensualidad');
        $this->db->join('inscripcion', 'mensualidad.idInscripcion = inscripcion.idInscripcion');
        $this->db->join('estudiante', 'inscripcion.idEstudiante = estudiante.idEstudiante');
        $this->db->where('detallepago.estado','1');

        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarDetalle($data)
    {
        $this->db->insert('detallepago',$data); //tabla
        return $this->db->insert_id();
    }

    public function recuperarPago($idPago, $idMensualidad)
    {
        $this->db->select('*'); //select *
        $this->db->from('detallepago'); //tabla
        $this->db->where('idPago',$idPago);
        $this->db->where('idMensualidad',$idMensualidad);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarPago($idPago,$idMensualidad,$data)
    {
        $this->db->where('idPago',$idPago);
        $this->db->where('îdMensualidad',$idPago);
        $this->db->update('detallepago',$data);
    }

}
