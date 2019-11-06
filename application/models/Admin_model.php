<?php

//    phpinfo();

class Admin_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function can_login_admin($login, $password){
           $this->db->where('LTQCLAC_login', $login);
           $this->db->where('LTQCLAC_mot_de_passe', $password);
           $query = $this->db->get('latablequicontientlesadministrateurscools');
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

	public function get_info_admin($LTQCLAC_login){
        $sql = "SELECT DISTINCT LTQCLAC_mot_de_passe, LTQCLAC_login FROM latablequicontientlesadministrateurscools WHERE LTQCLAC_login = '$LTQCLAC_login';";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }

    public function get_info_commande($COMMANDE_id){
        $sql = "SELECT CLIENT_nom, CLIENT_prenom, CLIENT_mail, COMMANDE_id, COMMANDE_etat, COMMANDE_date, COMMANDE_date_retrait, COMMANDE_code, CCG_quantite, GOODIE_nom, GOODIE_prix FROM COMMANDE LEFT JOIN CLIENT USING(CLIENT_id) LEFT JOIN COMMANDE_CONTIENT_GOODIES USING (COMMANDE_id) LEFT JOIN GOODIE USING(GOODIE_ID) WHERE COMMANDE_id = '$COMMANDE_id' ORDER BY COMMANDE_id;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }

    public function modifier_etat_commande($COMMANDE_etat, $COMMANDE_id){
        $sql = "update COMMANDE set COMMANDE_etat='$COMMANDE_etat' where COMMANDE_id='$COMMANDE_id';";
        $query = $this->db->query($sql,array());
    }
        
    public function get_info_commandes(){
        $sql = "SELECT CLIENT_nom, CLIENT_prenom, CLIENT_mail, COMMANDE_id, COMMANDE_etat, COMMANDE_date, COMMANDE_date_retrait, COMMANDE_code, CCG_quantite, GOODIE_nom, GOODIE_prix FROM COMMANDE LEFT JOIN CLIENT USING(CLIENT_id) LEFT JOIN COMMANDE_CONTIENT_GOODIES USING (COMMANDE_id) LEFT JOIN GOODIE USING(GOODIE_ID) ORDER BY COMMANDE_id;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function change_password($LTQCLAC_login, $LTQCLAC_mot_de_passe){
        $sql = "update latablequicontientlesadministrateurscools set LTQCLAC_mot_de_passe='$LTQCLAC_mot_de_passe' where LTQCLAC_login='$LTQCLAC_login';";
        $query = $this->db->query($sql,array());
    }

    public function get_info_points_retrait(){
        $sql = "SELECT POINT_RETRAIT_id, POINT_RETRAIT_nom, POINT_RETRAIT_adresse FROM POINT_RETRAIT ORDER BY POINT_RETRAIT_id;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }

    public function get_info_vendeurs(){
        $sql = "SELECT DISTINCT VENDEUR_id, VENDEUR_login, VENDEUR_nom, VENDEUR_prenom, VENDEUR_mot_de_passe, POINT_RETRAIT_nom, POINT_RETRAIT_adresse FROM VENDEUR LEFT JOIN POINT_RETRAIT USING(POINT_RETRAIT_id);";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function verify_source_admin($LTQCLAC_login){
        $sql = "SELECT LTQCLAC_source FROM latablequicontientlesadministrateurscools WHERE LTQCLAC_login = '$LTQCLAC_login'";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_info_admins(){
        $sql = "SELECT DISTINCT LTQCLAC_id, LTQCLAC_login, LTQCLAC_source, LTQCLAC_mot_de_passe FROM latablequicontientlesadministrateurscools;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function Ajouter_vendeur($VENDEUR_login, $VENDEUR_nom, $VENDEUR_prenom, $VENDEUR_mot_de_passe, $VENDEUR_point_retrait){
        $sql = "INSERT INTO `vendeur`(`VENDEUR_login`, `VENDEUR_nom`, `VENDEUR_prenom`, `VENDEUR_mot_de_passe`, `POINT_RETRAIT_id`) VALUES ('$VENDEUR_login', '$VENDEUR_nom', '$VENDEUR_prenom', '$VENDEUR_mot_de_passe', '$VENDEUR_point_retrait')";
        $query = $this->db->query($sql,array());
    }
    
    public function Ajouter_admin($ADMIN_new_login, $ADMIN_new_mot_de_passe){
        $sql = "INSERT INTO `latablequicontientlesadministrateurscools`(`LTQCLAC_login`, `LTQCLAC_mot_de_passe`, `LTQCLAC_source`) VALUES ('$ADMIN_new_login', '$ADMIN_new_mot_de_passe', '0')";
        $query = $this->db->query($sql,array());
    }
    
    public function get_point_retrait(){
        $sql = "SELECT DISTINCT POINT_RETRAIT_id, POINT_RETRAIT_nom, POINT_RETRAIT_adresse FROM POINT_RETRAIT;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_actualites(){
        $sql = "SELECT ACTUALITE_id, ACTUALITE_titre, ACTUALITE_description, ACTUALITE_date, ORIGINAL_titre FROM `actualite` LEFT JOIN actualite_se_refere_a_original USING(ACTUALITE_id) LEFT JOIN ORIGINAL USING(ORIGINAL_id);";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_commandes_point_retrait($POINT_RETRAIT_id){
        $sql = "SELECT CLIENT_nom, CLIENT_prenom, CLIENT_mail, COMMANDE_id, COMMANDE_etat, COMMANDE_date, COMMANDE_date_retrait, COMMANDE_code, CCG_quantite, GOODIE_nom, GOODIE_prix, POINT_RETRAIT_nom, POINT_RETRAIT_adresse FROM POINT_RETRAIT LEFT JOIN COMMANDE USING(POINT_RETRAIT_id) LEFT JOIN CLIENT USING(CLIENT_id) LEFT JOIN COMMANDE_CONTIENT_GOODIES USING (COMMANDE_id) LEFT JOIN GOODIE USING(GOODIE_ID) where POINT_RETRAIT_id = '$POINT_RETRAIT_id' ORDER BY COMMANDE_id";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_goodies(){
        $sql = "SELECT ORIGINAL_id, GOODIE_id, GOODIE_nom, GOODIE_nb_en_stock, GOODIE_description, GOODIE_nom_image, GOODIE_prix, ORIGINAL_titre FROM `goodie` LEFT JOIN original_contient_goodies USING(GOODIE_id) LEFT JOIN ORIGINAL USING(ORIGINAL_id) ORDER BY ORIGINAL_id;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_originaux(){
        $sql = "SELECT ORIGINAL_id, ORIGINAL_titre, ORIGINAL_nom_image FROM ORIGINAL;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
} ?>