<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoderado_model extends CI_Model {


	public function listaPadres()
	{
        $this->db->select('idApoderado, nombres, apellidoPaterno, apellidoMaterno, direccion, edad, numReferencia, estadoCivil, estado, fechaReg, fechaAct'); //select *
        $this->db->from('apoderado'); //tabla
        $this->db->where('estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarPadre($data)
    {
        $this->db->insert('apoderado',$data); //tabla
    }

    public function recuperarPadre($idApoderado)
    {
        $this->db->select('idApoderado, nombres, apellidoPaterno, apellidoMaterno, direccion, edad, numReferencia, estadoCivil, estado, fechaReg, fechaAct'); //select *
        $this->db->from('apoderado'); //tabla
        $this->db->where('apoderado.idApoderado', $idApoderado);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarPadre($idApoderado,$data)
    {
        $this->db->where('idApoderado',$idApoderado);
        $this->db->update('apoderado', $data);
    }

    public function listaPadresdeshabilitados()
    {
        $this->db->select('idApoderado, nombres, apellidoPaterno, apellidoMaterno, direccion, edad, numReferencia, estadoCivil, estado, fechaReg, fechaAct'); //select *
        $this->db->from('apoderado'); //tabla
        $this->db->where('estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
