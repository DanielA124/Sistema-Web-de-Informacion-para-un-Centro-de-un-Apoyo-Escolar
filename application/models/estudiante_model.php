<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante_model extends CI_Model {


	public function listaestudiantes()
	{
        $this->db->select('persona.idPersona, persona.nombres, persona.apellidoPaterno, persona.apellidoMaterno, persona.direccion, edad, sexo, fechaNacimiento, colegio, grado'); //select *
        $this->db->from('estudiante'); //tabla
        $this->db->join('persona', 'estudiante.idEstudiante=persona.idPersona');
        $this->db->where('persona.estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarestudiante($datos)
    {
        $this->db->trans_begin();
        $this->db->insert('estudiante',$datos); //tabla

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    public function recuperarestudiante($idEstudiante)
    {
        $this->db->select('persona.idPersona, persona.nombres, persona.apellidoPaterno, persona.apellidoMaterno, persona.direccion, edad, sexo, fechaNacimiento, colegio, grado'); //select *
        $this->db->from('estudiante'); //tabla
        $this->db->join('persona', 'estudiante.idEstudiante=persona.idPersona');
        $this->db->where('estudiante.idEstudiante', $idEstudiante);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarPersona($idEstudiante,$data)
    {
        $this->db->trans_begin();
        $this->db->where('idPersona',$idEstudiante);
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

    public function modificarEstudiante($idPersona,$datos)
    {
        $this->db->trans_begin();
        $this->db->where('idEstudiante',$idPersona);
        $this->db->update('estudiante', $datos);

        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }

    public function listaestudiantesdeshabilitados()
    {
        $this->db->select('persona.idPersona, persona.nombres, persona.apellidoPaterno, persona.apellidoMaterno, persona.direccion, edad, sexo, fechaNacimiento, colegio, grado'); //select *
        $this->db->from('estudiante'); //tabla
        $this->db->join('persona', 'estudiante.idEstudiante=persona.idPersona');
        $this->db->where('persona.estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
