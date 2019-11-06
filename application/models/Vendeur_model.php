<?php

//    phpinfo();

class Vendeur_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }
    
    public function can_login_vendeur($login, $password){
           $this->db->where('VENDEUR_login', $login);
           $this->db->where('VENDEUR_mot_de_passe', $password);
           $query = $this->db->get('VENDEUR');
           //SELECT * FROM users WHERE username = '$username' AND password = '$password'
           if($query->num_rows() > 0)
           {
                return true;
           }
           else
           {
                return false;
           }
    }
    
	public function get_info_vendeur($VENDEUR_login){
        $sql = "SELECT DISTINCT VENDEUR_login, VENDEUR_nom, VENDEUR_prenom, VENDEUR_mot_de_passe, POINT_RETRAIT_nom, POINT_RETRAIT_adresse, COMMANDE_code FROM VENDEUR LEFT JOIN POINT_RETRAIT USING(POINT_RETRAIT_id) LEFT JOIN COMMANDE USING(POINT_RETRAIT_id) LEFT JOIN CLIENT USING(CLIENT_id) LEFT JOIN COMMANDE_CONTIENT_GOODIES USING (COMMANDE_id) LEFT JOIN GOODIE USING(GOODIE_ID) WHERE VENDEUR_login = '$VENDEUR_login';";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_info_commande($VENDEUR_login){
        $sql = "SELECT CLIENT_nom, CLIENT_prenom, CLIENT_mail, COMMANDE_etat, COMMANDE_date, COMMANDE_date_retrait, COMMANDE_code, CCG_quantite, COMMANDE_id, GOODIE_nom, GOODIE_prix FROM VENDEUR LEFT JOIN POINT_RETRAIT USING(POINT_RETRAIT_id) LEFT JOIN COMMANDE USING(POINT_RETRAIT_id) LEFT JOIN CLIENT USING(CLIENT_id) LEFT JOIN COMMANDE_CONTIENT_GOODIES USING (COMMANDE_id) LEFT JOIN GOODIE USING(GOODIE_ID) WHERE VENDEUR_login = '$VENDEUR_login';";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function change_password($VENDEUR_login, $VENDEUR_mot_de_passe){
        $sql = "update vendeur set VENDEUR_mot_de_passe='$VENDEUR_mot_de_passe' where VENDEUR_login='$VENDEUR_login';";
        $query = $this->db->query($sql,array());

    
    }
    
} ?>