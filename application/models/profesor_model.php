<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor_model extends CI_Model {


	public function listaprofesores()
	{
        $this->db->select('persona.idPersona, persona.nombres, persona.apellidoPaterno, persona.apellidoMaterno, persona.direccion, horario, numeroCel'); //select *
        $this->db->from('profesor'); //tabla
        $this->db->join('persona', 'profesor.idProfesor=persona.idPersona');
        $this->db->where('persona.estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarprofesor($datos)
    {
        $this->db->trans_begin();
        $this->db->insert('profesor',$datos); //tabla

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    public function recuperarprofesor($idProfesor)
    {
        $this->db->select('persona.idPersona, persona.nombres, persona.apellidoPaterno, persona.apellidoMaterno, persona.direccion, horario, numeroCel'); //select *
        $this->db->from('profesor'); //tabla
        $this->db->join('persona', 'profesor.idProfesor=persona.idPersona');
        $this->db->where('profesor.idProfesor', $idProfesor);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarPersona($idProfesor,$data)
    {
        $this->db->trans_begin();
        $this->db->where('idPersona',$idProfesor);
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

    public function modificarProfesor($idPersona,$datos)
    {
        $this->db->trans_begin();
        $this->db->where('idProfesor',$idPersona);
        $this->db->update('profesor', $datos);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    public function listaprofesoresdeshabilitados()
    {
        $this->db->select('persona.idPersona, persona.nombres, persona.apellidoPaterno, persona.apellidoMaterno, persona.direccion, horario, numeroCel'); //select *
        $this->db->from('profesor'); //tabla
        $this->db->join('persona', 'profesor.idProfesor=persona.idPersona');
        $this->db->where('persona.estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
