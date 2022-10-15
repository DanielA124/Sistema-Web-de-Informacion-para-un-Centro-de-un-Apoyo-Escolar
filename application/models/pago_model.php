<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pago_model extends CI_Model {


	public function listaPago()
	{
        $this->db->select('*'); //select *
        $this->db->from('pago'); //tabla
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarPago($data)
    {
        $this->db->insert('pago',$data); //tabla
        return $this->db->insert_id();
    }

    public function eliminarPago($idPago)
    {
        $this->db->where('idPago',$idPago);
        $this->db->delete('pago');
    }

    public function recuperarPago($idPago)
    {
        $this->db->select('*'); //select *
        $this->db->from('pago'); //tabla
        $this->db->where('idPago',$idPago);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarPago($idPago,$data)
    {
        $this->db->where('idPago',$idPago);
        $this->db->update('pago',$data);
    }

}
