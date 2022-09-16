<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {


    public function validar($nombreUsuario,$password)
    {
        //$this->db->select('idUsuario,nombreUsuario,tipo'); //select *
        $this->db->select('*'); //select *
        $this->db->from('usuario'); //tabla
        $this->db->where('nombreUsuario',$nombreUsuario); //user
        $this->db->where('password',$password); //contra
        return $this->db->get(); //devolucion del resultado de la consulta
    }
}