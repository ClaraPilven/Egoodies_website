<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Accueil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
        $this->load->helper('html');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('form');
         $this->load->helper('cookie'); 
	}

	public function afficher(){
        $this->load->model('AfficherActualites');
        $data['actu'] = $this->AfficherActualites->get_actu();
        $data['randomgoodies'] = $this->AfficherActualites->get_random_goodie();
        $this->load->vars($data);
        $this->load->view('haut.php');
        $this->load->view('index.php');
        $this->load->view('bas.php');

    }

	 public function login_vendeur(){
         $this->load->library('form_validation');
         $this->load->helper('form');
         //$this->load->model('afficherActualites');
         $this->load->view('haut.php');
		 $this->load->view('login_vendeur');
         $this->load->view('bas.php');
	 }
    
    /*public function adminconnect(){            
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
       //$this->form_validation->set_message('required','il faut rentrer un %s');// fonction du formulaire

        if($this->form_validation->run()){
            //si le formulaire est bien rempli
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            //$hashed = md5($password);
            //fonction du modele qui vrérifiera les identifiants
            $this->load->model('AfficherActualites');
            
            if($this->AfficherActualites->can_login_vendeur($username,$password)) // on vérifie si les identifiants correspondent a notre bdd
            {
                 $session_data = array(
                      'username'     =>     $username
                 );
                 $this->session->set_userdata($session_data); // on initialise les variables de session
                 set_cookie('username_val', $username, 3600); 

                $this->enter_as_vendeur(); 
            
            }

            else {// si les identifiants sont incorrects

               
                 redirect($this->login());
            }
       }
       else
       {
            //si le formulaire n'est pas correctement rempli
            redirect($this->login());
        }
            
    }// fin de login validation
    */
    
    
    
    /* CONNEXION DU VENDEUR */
    
    /* SELECT VENDEUR_nom, VENDEUR_prenom, POINT_RETRAIT_nom, POINT_RETRAIT_adresse, CLIENT_nom, CLIENT_prenom, CLIENT_mail, COMMANDE_etat, COMMANDE_date, COMMANDE_date_retrait, COMMANDE_code, CCG_quantite, GOODIE_nom, GOODIE_prix FROM VENDEUR LEFT JOIN POINT_RETRAIT USING(POINT_RETRAIT_id) LEFT JOIN COMMANDE USING(POINT_RETRAIT_id) LEFT JOIN CLIENT USING(CLIENT_id) LEFT JOIN COMMANDE_CONTIENT_GOODIES USING (COMMANDE_id) LEFT JOIN GOODIE USING(GOODIE_ID) WHERE VENDEUR_id = 1;
    */
    
    public function enter_as_vendeur(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //$this->load->model('afficherActualites');
        $this->load->view('vendeur');
    }

    public function view_form_vendeur(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //$this->load->model('afficherActualites');
        $data['containserror'] = false;
        $this->load->vars($data);

        $this->load->view('haut.php');
        $this->load->view('login_vendeur');
        $this->load->view('bas.php');
    }

    public function view_form_vendeur_erreur(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //$this->load->model('afficherActualites');
        $data['containserror'] = true;
        $this->load->vars($data);
        $this->load->view('haut.php');
        $this->load->view('login_vendeur');
        $this->load->view('bas.php');
    }

   public function test_login_vendeur(){
        // bgHybWiJ
        // YucaXnRRGvdqYzbBnUmd
        $this->form_validation->set_rules('nom_utilisateur_vendeur', 'nom_utilisateur_vendeur', 'required');
        $this->form_validation->set_rules('mdp_utilisateur_vendeur', 'mdp_utilisateur_vendeur', 'required');
        if($this->form_validation->run()){

            $nom_utilisateur_vendeur = $this->input->post('nom_utilisateur_vendeur');
            $mdp_utilisateur_vendeur = $this->input->post('mdp_utilisateur_vendeur');
            $this->load->model('AfficherActualites');
            
            if($this->AfficherActualites->can_login_vendeur($nom_utilisateur_vendeur,$mdp_utilisateur_vendeur)) {// on vérifie si les identifiants correspondent a notre bdd
                $this->enter_as_vendeur(); 
            }
            else {
                $this->view_form_vendeur_erreur();
            }
        }
        else {
            $this->view_form_vendeur();
        }
    }
    
    public function logout_as_vendeur(){
        $this->afficher();
    }

    
    
    
    
    
    
    /* 'CONNEXION' DU CLIENT */

    public function enter_for_commande($code_commande){
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('Commande_model');
        $data['commandeinfo'] = $this->Commande_model->get_info_commande($code_commande);
        $this->load->vars($data);
        $this->load->view('haut.php');

        $this->load->view('check_commande');
        $this->load->view('bas.php');
    }

    public function view_form_commande(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //$this->load->model('afficherActualites');
        $data['containserror'] = false;
        $this->load->vars($data);

        $this->load->view('haut.php');
        $this->load->view('login_commande');
        $this->load->view('bas.php');
    }

    public function view_form_commande_erreur(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //$this->load->model('afficherActualites');
        $data['containserror'] = true;
        $this->load->vars($data);
        $this->load->view('haut.php');
        $this->load->view('login_commande');
        $this->load->view('bas.php');
    }

    public function test_login_commande(){
        // bgHybWiJ
        // YucaXnRRGvdqYzbBnUmd
        $this->form_validation->set_rules('code_client', 'code_client', 'required');
        $this->form_validation->set_rules('code_commande', 'code_commande', 'required');
        if($this->form_validation->run()){

            $code_client = $this->input->post('code_client');
            $code_commande = $this->input->post('code_commande');
            $this->load->model('AfficherActualites');
            if($this->AfficherActualites->verify_command_codes($code_client,$code_commande)) {// on vérifie si les identifiants correspondent a notre bdd
                $this->enter_for_commande($code_commande); 
            }
            else {
                $this->view_form_commande_erreur();
            }
        }
        else {
            $this->view_form_commande();
        }
    }
    
    
    
}
?>
