<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiante_model extends CI_Model {


	public function listaEstudiantes()
	{
        $this->db->select('idEstudiante, nombres, apellidoPaterno, apellidoMaterno, edad, sexo, colegio, grado, estado, fechaReg, fechaAct'); //select *
        $this->db->from('estudiante'); //tabla
        $this->db->where('estado','1');
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarEstudiante($data)
    {
        $this->db->insert('estudiante',$data); //tabla
    }

    public function recuperarEstudiante($idEstudiante)
    {
        $this->db->select('idEstudiante, nombres, apellidoPaterno, apellidoMaterno, edad, sexo, colegio, grado, estado, fechaReg, fechaAct'); //select *
        $this->db->from('estudiante'); //tabla;
        $this->db->where('estudiante.idEstudiante', $idEstudiante);
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarEstudiante($idEstudiante,$data)
    {

        $this->db->where('idEstudiante',$idEstudiante);
        $this->db->update('estudiante', $data);

    }

    public function listaestudiantesdeshabilitados()
    {
        $this->db->select('idEstudiante, nombres, apellidoPaterno, apellidoMaterno, edad, sexo, colegio, grado, estado, fechaReg, fechaAct'); //select *
        $this->db->from('estudiante'); //tabla
        $this->db->where('estado','0');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    function getEstudiante($postData){
        // $postData['search'] = 7;
        $response2 = array();
        if(isset($postData['search']) ){
          // Select record
          $this->db->select('*');//Todo
          $this->db->from('inscripcion'); //tabla que usaras de ejemplo
          $this->db->join('estudiante', 'inscripcion.idEstudiante=estudiante.idEstudiante');
          $this->db->where("estudiante.nombres like '%".$postData['search']."%' "); //id que capturaras
          $this->db->where('inscripcion.estado','1'); //condición where estado = 1
        
          $records = $this->db->get()->result();
   
          foreach($records as $row ){
             $response2[] = array(
                "value"=>$row->nombres, 
                "idInscripcion"=>$row->idInscripcion, 
                "apellidoPaterno"=>$row->apellidoPaterno,
                "apellidoMaterno"=>$row->apellidoMaterno
            );
            }
   
        }
        return $response2;
    }

}
