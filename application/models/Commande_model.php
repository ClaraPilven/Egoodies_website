<?php

//    phpinfo();

class Commande_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

	public function get_info_commande($codecommande){
        $sql = "SELECT COMMANDE_etat, COMMANDE_date, COMMANDE_date_retrait, POINT_RETRAIT_nom, point_retrait_adresse, GOODIE_nom, GOODIE_nom_image, GOODIE_prix, CCG_quantite FROM commande INNER JOIN commande_contient_goodies USING (COMMANDE_id) INNER JOIN point_retrait USING(point_retrait_id) INNER JOIN goodie USING (goodie_id) WHERE COMMANDE_code = '$codecommande'";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
} ?>