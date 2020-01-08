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
        $sql = "SELECT DISTINCT VENDEUR_login, VENDEUR_nom, VENDEUR_prenom, VENDEUR_mot_de_passe, POINT_RETRAIT_nom, POINT_RETRAIT_adresse FROM VENDEUR LEFT JOIN POINT_RETRAIT USING(POINT_RETRAIT_id) LEFT JOIN COMMANDE USING(POINT_RETRAIT_id) LEFT JOIN CLIENT USING(CLIENT_id) LEFT JOIN COMMANDE_CONTIENT_GOODIES USING (COMMANDE_id) LEFT JOIN GOODIE USING(GOODIE_ID) WHERE VENDEUR_login = '$VENDEUR_login';";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_info_commande($VENDEUR_login){
        $sql = "SELECT COMMANDE_etat, COMMANDE_date, COMMANDE_date_retrait, COMMANDE_code, COMMANDE_id FROM VENDEUR LEFT JOIN POINT_RETRAIT USING(POINT_RETRAIT_id) LEFT JOIN COMMANDE USING(POINT_RETRAIT_id) WHERE VENDEUR_login = '$VENDEUR_login' ORDER BY COMMANDE_date DESC;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_info_une_commande($commande_id){
        $sql = "SELECT DISTINCT CLIENT_nom, CLIENT_prenom, CLIENT_mail, COMMANDE_etat, COMMANDE_date, COMMANDE_date_retrait, COMMANDE_code, CCG_quantite, COMMANDE_id, GOODIE_nom, GOODIE_prix FROM VENDEUR LEFT JOIN POINT_RETRAIT USING(POINT_RETRAIT_id) LEFT JOIN COMMANDE USING(POINT_RETRAIT_id) LEFT JOIN CLIENT USING(CLIENT_id) LEFT JOIN COMMANDE_CONTIENT_GOODIES USING (COMMANDE_id) LEFT JOIN GOODIE USING(GOODIE_ID) WHERE COMMANDE_id = '$commande_id'";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function change_password($VENDEUR_login, $VENDEUR_mot_de_passe){
        $sql = "update VENDEUR set VENDEUR_mot_de_passe='$VENDEUR_mot_de_passe' where VENDEUR_login='$VENDEUR_login';";
        $query = $this->db->query($sql,array());
    }

    public function get_password($VENDEUR_login){
        $sql = "SELECT`VENDEUR_mot_de_passe` FROM `VENDEUR` WHERE VENDEUR_login = '$VENDEUR_login'";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function modifier_infos_vendeur($oldlogin, $login, $nom, $prenom){
        $sql = "UPDATE `vendeur` SET `VENDEUR_login`='$login',`VENDEUR_nom`='$nom',`VENDEUR_prenom`='$prenom' WHERE VENDEUR_login = '$oldlogin';";
        $query = $this->db->query($sql,array());
    }
    
    public function can_take_login($login){
        $sql = "SELECT COUNT(1) FROM vendeur WHERE VENDEUR_login = '$login'";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    public function can_take_login2($login){
        $sql = "SELECT COUNT(1) FROM latablequicontientlesadministrateurscools WHERE LTQCLAC_login = '$login'";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_info_commandes_prepare($login){
        $sql = "SELECT COMMANDE_id, COMMANDE_etat, COMMANDE_date, POINT_RETRAIT_nom, COMMANDE_date_retrait, vendeur.VENDEUR_login FROM `commande` LEFT JOIN point_retrait USING(POINT_RETRAIT_id) LEFT JOIN vendeur USING(POINT_RETRAIT_id) WHERE VENDEUR_login = '$login' and COMMANDE_etat = 'p' ORDER BY COMMANDE_date DESC;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_info_commandes_expedie($login){
        $sql = "SELECT COMMANDE_id, COMMANDE_etat, COMMANDE_date, POINT_RETRAIT_nom, COMMANDE_date_retrait, vendeur.VENDEUR_login FROM `commande` LEFT JOIN point_retrait USING(POINT_RETRAIT_id) LEFT JOIN vendeur USING(POINT_RETRAIT_id) WHERE VENDEUR_login = '$login' and COMMANDE_etat = 'x' ORDER BY COMMANDE_date DESC;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_info_commandes_disponible($login){
        $sql = "SELECT COMMANDE_id, COMMANDE_etat, COMMANDE_date, POINT_RETRAIT_nom, COMMANDE_date_retrait, vendeur.VENDEUR_login FROM `commande` LEFT JOIN point_retrait USING(POINT_RETRAIT_id) LEFT JOIN vendeur USING(POINT_RETRAIT_id) WHERE VENDEUR_login = '$login' and COMMANDE_etat = 'd' ORDER BY COMMANDE_date DESC;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_info_commandes_retire($login){
        $sql = "SELECT COMMANDE_id, COMMANDE_etat, COMMANDE_date, POINT_RETRAIT_nom, COMMANDE_date_retrait, vendeur.VENDEUR_login FROM `commande` LEFT JOIN point_retrait USING(POINT_RETRAIT_id) LEFT JOIN vendeur USING(POINT_RETRAIT_id) WHERE VENDEUR_login = '$login' and COMMANDE_etat = 'r' ORDER BY COMMANDE_date DESC;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_info_commandes_expire($login){
        $sql = "SELECT COMMANDE_id, COMMANDE_etat, COMMANDE_date, POINT_RETRAIT_nom, COMMANDE_date_retrait, vendeur.VENDEUR_login FROM `commande` LEFT JOIN point_retrait USING(POINT_RETRAIT_id) LEFT JOIN vendeur USING(POINT_RETRAIT_id) WHERE VENDEUR_login = '$login' and COMMANDE_etat = 'e' ORDER BY COMMANDE_date DESC; ";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_info_commandes_annule($login){
        $sql = "SELECT COMMANDE_id, COMMANDE_etat, COMMANDE_date, POINT_RETRAIT_nom, COMMANDE_date_retrait, vendeur.VENDEUR_login FROM `commande` LEFT JOIN point_retrait USING(POINT_RETRAIT_id) LEFT JOIN vendeur USING(POINT_RETRAIT_id) WHERE VENDEUR_login = '$login' and COMMANDE_etat = 'a' ORDER BY COMMANDE_date DESC;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
} ?>