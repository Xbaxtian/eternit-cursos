<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model("Curso_model","curso");
        header('Content-Type: application/json');
    }

    public function listarcursos(){
        $usr_id = $this->input->get('usr_id');
        $lista = $this->curso->listarTodos($usr_id);
        $lista = json_encode($lista);
        $lista = $this->quitarPrefijos($lista);
        echo $lista;
    }

    public function detallecurso(){
        $usr_id = $this->input->get('usr_id');
        $crs_id = $this->input->get('id');
        $orden = $this->input->get('orden');
        $lugar = $this->input->get('lugar');

        $lista = $this->curso->getCurso($usr_id,$crs_id,$orden,$lugar);
        $lista = json_encode($lista);
        $lista = $this->quitarPrefijos($lista);
        echo $lista;
    }

    public function registrarmatricula(){
        $usr_id = $this->input->get('usr_id');
        $cls_id = $this->input->get('cls_id');
        $hrr_id = $this->input->get('hrr_id');
        $result = $this->curso->matricular($usr_id,$cls_id,$hrr_id);
        /*$result = json_encode(array("result"=>))
        echo $result;*/
    }

    private function quitarPrefijos($json){
        $prefijos = array("crs_","cls_","hrr_");
        return str_replace($prefijos,"",$json);
    }

}



?>
