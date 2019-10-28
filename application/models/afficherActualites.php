<?php

//    phpinfo();

class afficherActualites extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

	public function get_actu(){
        $sql = "SELECT ACTUALITE_titre, ACTUALITE_description, original_nom_image FROM ACTUALITE INNER JOIN ACTUALITE_SE_REFERE_A_ORIGINAL USING(ACTUALITE_id) INNER JOIN ORIGINAL USING (ORIGINAL_id) ORDER BY RAND();";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_random_goodie(){
        $sql = "SELECT GOODIE_nom, GOODIE_nom_image, GOODIE_prix FROM GOODIE WHERE GOODIE_nb_en_stock > 0 ORDER BY RAND() LIMIT 16;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function verify_command_codes($codeclient, $codecommande){
      $sql = "SELECT CLIENT_code, COMMANDE_code FROM CLIENT LEFT JOIN COMMANDE USING(CLIENT_id) where CLIENT_code = '$codeclient' and COMMANDE_code = '$codecommande'";
      $query = $this->db->query($sql,array());
      if($query->num_rows()>0){
        return true;
      }
      else{
        return false;
      }
    }





    public function can_login_vendeur($login, $password)
      {
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


    
/* SAMPLE
        public function get_MesReservations($nom_groupe){
        
        $data=array('nom_groupe'=>htmlspecialchars($nom_groupe));      
        $sql="SELECT * FROM atm._concert inner join atm._groupe on atm._concert.groupe_id = atm._groupe.groupe_id where nom_groupe = ?;";
            
        return $this->db->query($sql, $data)->result_array();
    }
*/
}
?>
