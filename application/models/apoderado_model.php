<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apoderado_model extends CI_Model {


	public function listapadres()
	{
        $this->db->select('persona.idPersona, persona.nombres, persona.apellidoPaterno, persona.apellidoMaterno, persona.direccion, edad, numReferencia, estadoCivil'); //select *
        $this->db->from('apoderado'); //tabla
        $this->db->join('persona', 'apoderado.idApoderado=persona.idPersona');
        $this->db->where('persona.estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarpadre($datos)
    {
        $this->db->trans_begin();
        $this->db->insert('apoderado',$datos); //tabla

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    public function recuperarpadre($idApoderado)
    {
        $this->db->select('persona.idPersona, persona.nombres, persona.apellidoPaterno, persona.apellidoMaterno, persona.direccion, edad, numReferencia, estadoCivil'); //select *
        $this->db->from('apoderado'); //tabla
        $this->db->join('persona', 'apoderado.idApoderado=persona.idPersona');
        $this->db->where('apoderado.idApoderado', $idApoderado);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarPersona($idApoderado,$data)
    {
        $this->db->trans_begin();
        $this->db->where('idPersona',$idApoderado);
        $this->db->update('persona', $data);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    public function modificarPadre($idPersona,$datos)
    {
        $this->db->trans_begin();
        $this->db->where('idApoderado',$idPersona);
        $this->db->update('apoderado', $datos);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    public function listapadresdeshabilitados()
    {
        $this->db->select('persona.idPersona, persona.nombres, persona.apellidoPaterno, persona.apellidoMaterno, persona.direccion, edad, numReferencia, estadoCivil'); //select *
        $this->db->from('apoderado'); //tabla
        $this->db->join('persona', 'apoderado.idApoderado=persona.idPersona');
        $this->db->where('persona.estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
