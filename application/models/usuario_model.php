<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {


	public function listadatos()
	{
        $this->db->select('*'); //select *
        $this->db->from('usuario'); //tabla
        $this->db->where('estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarUsuario($data)
    {
        $this->db->insert('usuario',$data); //tabla
        return $this->db->insert_id();
    }

    public function eliminardatos($idUsuario)
    {
        $this->db->where('idUsuario',$idUsuario);
        $this->db->delete('usuario');
    }

    public function recuperardatos($idUsuario)
    {
        $this->db->select('*'); //select *
        $this->db->from('usuario'); //tabla
        $this->db->where('idUsuario',$idUsuario);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificardatos($idUsuario,$data)
    {
        $this->db->where('idUsuario',$idUsuario);
        $this->db->update('usuario',$data);
    }

    public function listadatosdeshabilitados()
    {
        $this->db->select('*'); //select *
        $this->db->from('usuario'); //tabla
        $this->db->where('estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}
