<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function getMes() //select
   {
      $this->db->select('COUNT(idMensualidad) Num, mes Mes'); //select*
      $this->db->from('mensualidad'); //tabla]
      $this->db->group_by('Mes');

      $query = $this->db->get(); //devolucion del resultado de la consulta
      return $query->result();
   }
      
}
