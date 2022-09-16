<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona_model extends CI_Model {


	public function listadatos()
	{
        $this->db->select('*'); //select *
        $this->db->from('persona'); //tabla
        $this->db->where('estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarpersona($data)
    {
        $this->db->insert('persona',$data); //tabla
        return $this->db->insert_id();
    }

    public function eliminardatos($idPersona)
    {
        $this->db->where('idPersona',$idPersona);
        $this->db->delete('persona');
    }

    public function recuperardatos($idPersona)
    {
        $this->db->select('*'); //select *
        $this->db->from('persona'); //tabla
        $this->db->where('idPersona',$idPersona);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificardatos($idPersona,$data)
    {
        $this->db->where('idPersona',$idPersona);
        $this->db->update('persona',$data);
    }

    public function listadatosdeshabilitados()
    {
        $this->db->select('*'); //select *
        $this->db->from('persona'); //tabla
        $this->db->where('estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}
