<?php

//    phpinfo();

class Commande_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

	public function get_info_vendeur($VENDEUR_login){
        $sql = "SELECT VENDEUR_nom, VENDEUR_prenom, POINT_RETRAIT_nom, POINT_RETRAIT_adresse, CLIENT_nom, CLIENT_prenom, CLIENT_mail, COMMANDE_etat, COMMANDE_date, COMMANDE_date_retrait, COMMANDE_code, CCG_quantite, GOODIE_nom, GOODIE_prix FROM VENDEUR LEFT JOIN POINT_RETRAIT USING(POINT_RETRAIT_id) LEFT JOIN COMMANDE USING(POINT_RETRAIT_id) LEFT JOIN CLIENT USING(CLIENT_id) LEFT JOIN COMMANDE_CONTIENT_GOODIES USING (COMMANDE_id) LEFT JOIN GOODIE USING(GOODIE_ID) WHERE VENDEUR_id = $VENDEUR_login;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
} ?>