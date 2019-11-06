<?php

//    phpinfo();

class Visiteur_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    
    public function get_goodies($ORIGINAL_id){
        $sql = "SELECT ORIGINAL_id, ORIGINAL_titre, ORIGINAL_description, ORIGINAL_nom_image, GOODIE_id, GOODIE_nom, GOODIE_nb_en_stock, GOODIE_description, GOODIE_nom_image, GOODIE_prix FROM `goodie` LEFT JOIN original_contient_goodies USING(GOODIE_id) LEFT JOIN ORIGINAL USING(ORIGINAL_id) WHERE ORIGINAL_id = '$ORIGINAL_id';";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }


}
