<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clase_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->model("Clase_model","clase");
    }

    public function clasesPorCurso($crs_id,$lugar=''){

        $query = $this->db->select('*')
                        ->from('clase c')
                        ->join('nivel n','c.nvl_id = n.nvl_id')
                        ->where('crs_id',$crs_id)
                        ->get();
        $clases = $query->result_array();

        if(count($clases)>0){
            $this->load->model("Horario_model","horario");
            foreach ($clases as $key => $clase) {
                $clases[$key]['horarios'] = $this->horario->getHorarios($clase['cls_id'],$lugar);
            }
        }

        return $clases;
    }

}

?>
