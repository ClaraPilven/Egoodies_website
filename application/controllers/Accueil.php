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
	}

	public function afficher(){
        $this->load->model('AfficherActualites');
        $data['actu'] = $this->AfficherActualites->get_actu();
        $data['randomgoodies'] = $this->AfficherActualites->get_random_goodie();
        $this->load->vars($data);
        $this->load->view('visiteur_haut.php');
        $this->load->view('index.php');
        $this->load->view('visiteur_bas.php');

    }

	 public function login_vendeur(){
         //$this->load->model('afficherActualites');
         $this->load->view('visiteur_haut.php');
		 $this->load->view('vendeur_login');
         $this->load->view('visiteur_bas.php');
	 }
    
    public function voir_galerie(){
        $this->load->model('Admin_model');
        $data['originaux'] = $this->Admin_model->get_originaux();
        $this->load->vars($data);
        $this->load->view('visiteur_haut');
        $this->load->view('visiteur_galerie');
        $this->load->view('visiteur_bas');
    }

    public function afficher_goodie_original($ORIGINAL_id){
        $this->load->model('Visiteur_model');
        $data['goodies'] = $this->Visiteur_model->get_goodies($ORIGINAL_id);
        $this->load->vars($data);
        $this->load->view('visiteur_haut');
        $this->load->view('visiteur_affichage_original_et_goodies');
        $this->load->view('visiteur_bas');
    }
    
    public function enter_as_vendeur($nom_utilisateur_vendeur){
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('Vendeur_model');
        $data['commandes'] = $this->Vendeur_model->get_info_commande($nom_utilisateur_vendeur);
        $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($nom_utilisateur_vendeur);
        $this->load->vars($data);
        $this->load->view('vendeur_haut');
        $this->load->view('vendeur_commandes');
    }

    public function view_form_vendeur(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //$this->load->model('afficherActualites');
        $data['containserror'] = false;
        $this->load->vars($data);

        $this->load->view('visiteur_haut.php');
        $this->load->view('vendeur_login');
        $this->load->view('visiteur_bas.php');
    }

    public function view_form_vendeur_erreur(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //$this->load->model('afficherActualites');
        $data['containserror'] = true;
        $this->load->vars($data);
        $this->load->view('vendeur_haut.php');
        $this->load->view('login_vendeur');
        $this->load->view('vendeur_bas.php');
    }

   public function test_login_vendeur(){
        // bgHybWiJ
        // YucaXnRRGvdqYzbBnUmd
        $this->form_validation->set_rules('nom_utilisateur_vendeur', 'nom_utilisateur_vendeur', 'required');
        $this->form_validation->set_rules('mdp_utilisateur_vendeur', 'mdp_utilisateur_vendeur', 'required');
        if($this->form_validation->run()){

            $nom_utilisateur = $this->input->post('nom_utilisateur_vendeur');
            $mdp_utilisateur = $this->input->post('mdp_utilisateur_vendeur');
            $this->load->model('Vendeur_model');
            $this->load->model('Admin_model');
            
            if($this->Vendeur_model->can_login_vendeur($nom_utilisateur,$mdp_utilisateur)) {// on vérifie si les identifiants correspondent a notre bdd
                $this->enter_as_vendeur($nom_utilisateur); 
            }
            else if($this->Admin_model->can_login_admin($nom_utilisateur,$mdp_utilisateur)) {// on vérifie si les identifiants correspondent a notre bdd
                $this->enter_as_admin($nom_utilisateur);
            }
            else{
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
    
    public function info_vendeur($VENDEUR_login){
        $this->load->model('Vendeur_model');
        $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($VENDEUR_login);
        $data['passwordchanged'] = false;
        $this->load->vars($data);
        $this->load->view('vendeur_haut');
        $this->load->view('vendeur_profil');
        $this->load->view('vendeur_haut');

        
    }
    
    public function modifier_vendeur($VENDEUR_login){
        $this->load->model('Vendeur_model');
        $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($VENDEUR_login);
        $this->load->vars($data);
        $this->load->view('vendeur_haut');
        $this->load->view('vendeur_profil_modif');
        $this->load->view('vendeur_bas');
    }
    
    public function modifier_mdp_vendeur(){
       
        $this->form_validation->set_rules('login', 'login', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if($this->form_validation->run()){

            $VENDEUR_login = $this->input->post('login');
            $VENDEUR_password = $this->input->post('password');
            
            $this->load->model('Vendeur_model');
            $this->Vendeur_model->change_password($VENDEUR_login, $VENDEUR_password);
            
            $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($VENDEUR_login);
            $data['passwordchanged'] = true;
            $this->load->vars($data);
            $this->load->view('vendeur_haut');
            $this->load->view('vendeur_profil');
            $this->load->view('vendeur_bas');
        }
    }
    
    
    
    /* CONNEXION DE L'ADMIN */
    
    public function enter_as_admin($nom_utilisateur_admin){
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('Admin_model');
        $data['commandes'] = $this->Admin_model->get_info_commandes();
        $data['pointretraits'] = $this->Admin_model->get_info_points_retrait();
        $data['admin'] = $this->Admin_model->get_info_admin($nom_utilisateur_admin);
        $this->load->vars($data);
        $this->load->view('admin_haut');
        $this->load->view('admin_commandes');
        $this->load->view('admin_bas');

    }
    
    public function logout_as_admin(){
        $this->afficher();
    }

    public function afficher_point_retrait($ADMIN_login){
        $this->load->model('Admin_model');
        $data['pointretraits'] = $this->Admin_model->get_info_points_retrait();
        $data['admin'] = $this->Admin_model->get_info_admin($ADMIN_login);
        $this->load->vars($data);
        $this->load->view('admin_haut');
        $this->load->view('admin_afficher_point_retrait');
        $this->load->view('admin_bas');

    }
    
    public function admin_voir_commandes_point_retrait(){
        $this->form_validation->set_rules('point_retrait_id', 'point_retrait_id', 'required');
        $this->form_validation->set_rules('admin_login', 'admin_login', 'required');
        $POINT_RETRAIT_id = $this->input->post('point_retrait_id');
        $ADMIN_login = $this->input->post('admin_login');
        
        $this->load->model('Admin_model');
        $data['commandes'] = $this->Admin_model->get_commandes_point_retrait($POINT_RETRAIT_id);
        $data['admin'] = $this->Admin_model->get_info_admin($ADMIN_login);
        $this->load->vars($data);
        $this->load->view('admin_haut');
        $this->load->view('admin_afficher_commandes_point_retrait');
        $this->load->view('admin_bas');
    }
    
    
    public function info_admin($ADMIN_login){
        $this->load->model('Admin_model');
        $data['admin'] = $this->Admin_model->get_info_admin($ADMIN_login);
        $data['passwordchanged'] = false;
        $this->load->vars($data);
        $this->load->view('admin_haut');
        $this->load->view('admin_profil');
        $this->load->view('admin_bas');
    }

    public function modifier_admin($ADMIN_login){
        $this->load->model('Admin_model');
        $data['admin'] = $this->Admin_model->get_info_admin($ADMIN_login);
        $this->load->vars($data);
        $this->load->view('admin_haut');
        $this->load->view('admin_profil_modif');
        $this->load->view('admin_bas');
    }

    public function voir_comptes($ADMIN_login){
        $this->load->model('Admin_model');
        $data['admin'] = $this->Admin_model->get_info_admin($ADMIN_login);
        $data['comptes'] = $this->Admin_model->get_info_vendeurs();
        $data['source'] = $this->Admin_model->verify_source_admin($ADMIN_login);
        $data['compte_admin'] = $this->Admin_model->get_info_admins();
        $this->load->vars($data);
        $this->load->view('admin_haut');
        $this->load->view('admin_voir_comptes');
        $this->load->view('admin_bas');
    }

    public function ajouter_vendeur($ADMIN_login){
        $this->load->model('Admin_model');
        $data['point_retrait'] = $this->Admin_model->get_point_retrait();
        $data['admin'] = $this->Admin_model->get_info_admin($ADMIN_login);
        $this->load->vars($data);
        $this->load->view('admin_haut');
        $this->load->view('admin_ajouter_vendeur');
        $this->load->view('admin_bas');
    }

    public function ajouter_admin($ADMIN_login){
        $this->load->model('Admin_model');
        $data['admin'] = $this->Admin_model->get_info_admin($ADMIN_login);
        $this->load->vars($data);
        $this->load->view('admin_haut');
        $this->load->view('admin_ajouter_admin');
        $this->load->view('admin_bas');
    }

    public function ajout_du_vendeur(){
        $this->form_validation->set_rules('admin_login', 'admin_login', 'required');
        $this->form_validation->set_rules('Login', 'Login', 'required');
        $this->form_validation->set_rules('Nom', 'Nom', 'required');
        $this->form_validation->set_rules('Prenom', 'Prenom', 'required');
        $this->form_validation->set_rules('Mot_de_passe', 'Mot_de_passe', 'required');
        $this->form_validation->set_rules('Point_retrait', 'Point_retrait', 'required');

        if($this->form_validation->run()){
            $ADMIN_login = $this->input->post('admin_login');
            $VENDEUR_login = $this->input->post('Login');
            $VENDEUR_nom = $this->input->post('Nom');
            $VENDEUR_prenom = $this->input->post('Prenom');
            $VENDEUR_mot_de_passe = $this->input->post('Mot_de_passe');
            $VENDEUR_point_retrait = $this->input->post('Point_retrait');
            $VENDEUR_point_retrait = $VENDEUR_point_retrait[0];

            $this->load->model('Admin_model');
            $this->Admin_model->Ajouter_vendeur($VENDEUR_login, $VENDEUR_nom, $VENDEUR_prenom, $VENDEUR_mot_de_passe, $VENDEUR_point_retrait);

            $this->voir_comptes($ADMIN_login);
        }
        else{
            $ADMIN_login = $this->input->post('admin_login');
            $this->ajouter_vendeur($ADMIN_login);
        }
    }

    public function ajout_de_admin(){
        $this->form_validation->set_rules('admin_login', 'admin_login', 'required');
        $this->form_validation->set_rules('Login', 'Login', 'required');
        $this->form_validation->set_rules('Mot_de_passe', 'Mot_de_passe', 'required');
        $ADMIN_login = $this->input->post('admin_login');

        if($this->form_validation->run()){
            $ADMIN_new_login = $this->input->post('Login');
            $ADMIN_new_mot_de_passe = $this->input->post('Mot_de_passe');
            
            $this->load->model('Admin_model');
            $this->Admin_model->Ajouter_admin($ADMIN_new_login, $ADMIN_new_mot_de_passe);
            $this->voir_comptes($ADMIN_login);
        }
        else{
            $this->ajouter_vendeur($ADMIN_login);
        }
    }

    public function modifier_mdp_admin(){
       
        $this->form_validation->set_rules('login', 'login', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if($this->form_validation->run()){

            $ADMIN_login = $this->input->post('login');
            $ADMIN_password = $this->input->post('password');

            $this->load->model('Admin_model');
            $this->Admin_model->change_password($ADMIN_login, $ADMIN_password);

            $data['admin'] = $this->Admin_model->get_info_admin($ADMIN_login);
            $data['passwordchanged'] = true;
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_profil');
        $this->load->view('admin_bas');
        }
    }

    public function voir_actualites($ADMIN_login){
        $this->load->model('Admin_model');
        $data['admin'] = $this->Admin_model->get_info_admin($ADMIN_login);
        $data['actualites'] = $this->Admin_model->get_actualites();
        $this->load->vars($data);
        $this->load->view('admin_haut');
        $this->load->view('admin_afficher_actualites');
        $this->load->view('admin_bas');
    }

    public function voir_galerie_admin($ADMIN_login){
        $this->load->model('Admin_model');
        $data['admin'] = $this->Admin_model->get_info_admin($ADMIN_login);
        $data['goodies'] = $this->Admin_model->get_goodies();
        $this->load->vars($data);
        $this->load->view('admin_haut');
        $this->load->view('admin_galerie');
        $this->load->view('admin_bas');
    }

    public function modifier_etat_commande(){
        $ADMIN_login=$_GET['LTQCLAC_login'];
        $COMMANDE_id=$_GET['COMMANDE_id'];
        
        $this->load->model('Admin_model');
        $data['admin'] = $this->Admin_model->get_info_admin($ADMIN_login);
        $data['commandes'] = $this->Admin_model->get_info_commande($COMMANDE_id);
        $this->load->vars($data);
        $this->load->view('admin_haut');
        $this->load->view('admin_modifier_etat_commande');
        $this->load->view('admin_bas');

    }
    
    public function modification_etat_commande(){
        $this->form_validation->set_rules('admin_login', 'admin_login', 'required');
        $this->form_validation->set_rules('COMMANDE_etat', 'COMMANDE_etat', 'required');
        $this->form_validation->set_rules('COMMANDE_id', 'COMMANDE_id', 'required');
        $ADMIN_login = $this->input->post('admin_login');
        $this->load->model('Admin_model');
        $data['admin'] = $this->Admin_model->get_info_admin($ADMIN_login);

        if($this->form_validation->run()){
            $COMMANDE_etat = $this->input->post('COMMANDE_etat');
            $COMMANDE_id = $this->input->post('COMMANDE_id');
            $this->Admin_model->modifier_etat_commande($COMMANDE_etat, $COMMANDE_id);
            $this->enter_as_admin($ADMIN_login);
        }
        else{
            $this->modifier_etat_commande();
        }
    }
    
    
    
    /* 'CONNEXION' DU CLIENT */

    public function enter_for_commande($code_commande){
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('Commande_model');
        $data['commandeinfo'] = $this->Commande_model->get_info_commande($code_commande);
        $this->load->vars($data);
        $this->load->view('visiteur_haut.php');
        $this->load->view('client_check_commande');
        $this->load->view('visiteur_bas.php');
    }

    public function view_form_commande(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //$this->load->model('afficherActualites');
        $data['containserror'] = false;
        $this->load->vars($data);

        $this->load->view('visiteur_haut.php');
        $this->load->view('client_login_commande');
        $this->load->view('visiteur_bas.php');
    }

    public function view_form_commande_erreur(){
        $this->load->library('form_validation');
        $this->load->helper('form');
        //$this->load->model('afficherActualites');
        $data['containserror'] = true;
        $this->load->vars($data);
        $this->load->view('visiteur_haut.php');
        $this->load->view('client_login_commande');
        $this->load->view('visiteur_bas.php');
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
