<?php

//    phpinfo();

class Commande_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

	public function get_info_commande($codecommande){
        $sql = "SELECT COMMANDE_id, COMMANDE_etat, COMMANDE_date, COMMANDE_date_retrait, POINT_RETRAIT_nom, point_retrait_adresse, GOODIE_nom, GOODIE_nom_image, GOODIE_prix, CCG_quantite FROM COMMANDE INNER JOIN COMMANDE_CONTIENT_GOODIES USING (COMMANDE_id) INNER JOIN POINT_RETRAIT USING(point_retrait_id) INNER JOIN GOODIE USING (goodie_id) WHERE COMMANDE_code = '$codecommande'";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }

    public function supprimer_commande($COMMANDE_id){
    	$sql = "CALL commande_annule($COMMANDE_id);";
        $query = $this->db->query($sql,array());
    }
} ?>