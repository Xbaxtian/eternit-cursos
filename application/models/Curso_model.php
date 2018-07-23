<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model{

    function __construct(){
        parent::__construct();
        $this->load->model("Clase_model","clase");
    }

    public function listarTodos($usr_id=''){
        $query = $this->db->get('curso');
        $dataCursos = $query->result_array();
        if(isset($usr_id)){
            foreach ($dataCursos as $key => $curso) {
                $dataCursos[$key]['clases'] = $this->clase->clasesPorCurso($usr_id,$curso['crs_id']);
            }
        }
        return $dataCursos;
    }

    public function getCurso($usr_id,$crs_id,$orden='',$lugar=''){
        $curso = array("detalle"=>'',"clases"=>'');

        $curso['detalle'] = $this->getDetalle($crs_id);
        $curso['clases'] = $this->getClases($usr_id,$crs_id,$orden,$lugar);

        return $curso;
    }

    public function matricular($usr_id,$cls_id,$hrr_id){
        $clase = $this->clase->getClasePorId($cls_id,$usr_id);
        $this->load->model("Matricula_model","matricula");
        $response = $this->matricula->agregarMatricula($usr_id,$clase,$hrr_id);
        //return $response;
    }

    private function getDetalle($crs_id){
        $query = $this->db->get_where('curso',array('crs_id'=>$crs_id));
        return $query->result_array();
    }

    private function getClases($usr_id,$crs_id,$orden,$lugar=''){
        $clases = $this->clase->clasesPorCurso($crs_id,$lugar,$usr_id);
        /*switch ($orden) {
            case 'nivel':
                $clases = $this->ordenarPorNivel($clases);
                break;

            case 'calendario':
                $clases = $this->ordenarPorCalendario($clases);
                break;

            default:
                $clases = $this->ordenarPorNivel($clases);
                break;
        }*/
        return $clases;
    }

    private function ordenarPorNivel($clases){

    }
    private function ordenarPorCalendario($clases){

    }

}

?>
