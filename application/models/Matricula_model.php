<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matricula_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function getMatriculasAsistidas($usr_id, $cls_id){
        $query = $this->db->select('*')
                            ->from('matricula m')
                            ->join('horario h', 'm.hrr_id = h.hrr_id')
                            ->where(array('m.usr_id'=>$usr_id, 'h.cls_id'=>$cls_id))
                            ->get();
        if (count($query->result_array())>0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function agregarMatricula($usr_id, $clase, $hrr_id){
        print_r($clase);
    }

}

?>
