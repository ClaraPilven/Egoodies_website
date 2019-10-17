<?php

//    phpinfo();

class afficherActualites extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

	public function get_actu(){
        $sql = "SELECT ACTUALITE_titre, ACTUALITE_description, original_nom_image FROM ACTUALITE INNER JOIN actualite_se_refere_a_original USING(ACTUALITE_id) INNER JOIN original USING (ORIGINAL_id) ORDER BY RAND();";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    public function get_random_goodie(){
        $sql = "SELECT GOODIE_nom, GOODIE_nom_image, GOODIE_prix FROM GOODIE WHERE GOODIE_nb_en_stock > 0 ORDER BY RAND() LIMIT 16;";
        $query = $this->db->query($sql,array());
        return $query->result_array();
    }
    
    function can_login($login, $password)
      {
           $this->db->where('VENDEUR_login', $login);
           $this->db->where('VENDEUR_mot_de_passe', $password);
           $query = $this->db->get('vendeur');
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
