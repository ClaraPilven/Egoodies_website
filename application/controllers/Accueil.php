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
    
    
    
    
    
    
    
    
    
    
    
    
    /* VENDEUR */
    
    public function login_vendeur(){
         //$this->load->model('afficherActualites');
         $this->load->view('visiteur_haut.php');
		 $this->load->view('vendeur_login');
         $this->load->view('visiteur_bas.php');
	 }
    
    public function enter_as_vendeur($nom_utilisateur_vendeur, $check){
        $this->load->library('form_validation');
        $this->load->helper('form');
        $session_data = array('username' => $nom_utilisateur_vendeur );
        $this->session->set_userdata($session_data); 
        $this->afficher_accueil_vendeur();
    }
    
    public function afficher_accueil_vendeur(){
        $this->load->model('Vendeur_model');
        $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($_SESSION["username"]);
        $this->load->vars($data);
        $this->load->view('vendeur_haut.php');
        $this->load->view('vendeur_accueil');
        $this->load->view('vendeur_bas.php');
    }

    public function afficher_commandes(){
        if(!isset($_SESSION["username"])){
            $this->afficher();
        }
        else{
            $this->load->model('Vendeur_model');
            $data['commandes'] = $this->Vendeur_model->get_info_commande($_SESSION["username"]);
            $data['commandesp'] = $this->Vendeur_model->get_info_commandes_prepare($_SESSION["username"]);
            $data['commandesx'] = $this->Vendeur_model->get_info_commandes_expedie($_SESSION["username"]);
            $data['commandesd'] = $this->Vendeur_model->get_info_commandes_disponible($_SESSION["username"]);
            $data['commandesr'] = $this->Vendeur_model->get_info_commandes_retire($_SESSION["username"]);
            $data['commandese'] = $this->Vendeur_model->get_info_commandes_expire($_SESSION["username"]); 
            $data['commandesa'] = $this->Vendeur_model->get_info_commandes_annule($_SESSION["username"]);
            $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($_SESSION["username"]);
            $this->load->vars($data);
            $this->load->view('vendeur_haut');
            $this->load->view('vendeur_commandes');
            $this->load->view('vendeur_bas'); 
        }

    }
    
    public function vendeur_voir_une_commande($COMMANDE_id){
        if(!isset($_SESSION["username"])){
            $this->afficher();
        }
        else{
            $this->load->model('Vendeur_model');
            $data['commande'] = $this->Vendeur_model->get_info_une_commande($COMMANDE_id);
            $this->load->vars($data);
            $this->load->view('vendeur_haut');
            $this->load->view('vendeur_voir_une_commande');
            $this->load->view('vendeur_bas');
        }
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
        $this->load->view('visiteur_haut.php');
        $this->load->view('vendeur_login');
        $this->load->view('visiteur_bas.php');
    }

   public function test_login_vendeur(){
        // bgHybWiJ
        // YucaXnRRGvdqYzbBnUmd
        $this->form_validation->set_rules('nom_utilisateur_vendeur', 'nom_utilisateur_vendeur', 'required');
        $this->form_validation->set_rules('mdp_utilisateur_vendeur', 'mdp_utilisateur_vendeur', 'required');
        if($this->form_validation->run()){

            $nom_utilisateur = $this->input->post('nom_utilisateur_vendeur');
            $mdp_utilisateur = $this->input->post('mdp_utilisateur_vendeur');
            $salt = "OnRajouteBeaucoupDeSelPourAllongerleMDPdel'4dMiN123!!45678__Test";
            $salt2 = "EtVoilAUnD3uxiemeSelP0urBiLlileeeeeeeeeeeenEmbrouiller!!";
            $password = hash('sha256', $salt.$mdp_utilisateur.$salt2);
            $this->load->model('Vendeur_model');
            $this->load->model('Admin_model');
            
            if($this->Vendeur_model->can_login_vendeur($nom_utilisateur,$password)) {// on vérifie si les identifiants correspondent a notre bdd
                $this->enter_as_vendeur($nom_utilisateur, $password);
            }
            else if($this->Admin_model->can_login_admin($nom_utilisateur,$password)) {// on vérifie si les identifiants correspondent a notre bdd
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
        if(!isset($_SESSION["username"])){
            $this->afficher();
        }
        else{
            session_destroy();
            $this->afficher();
        }
    }
    
    public function info_vendeur(){
        if(!isset($_SESSION["username"])){
            $this->afficher();
        }
        else{
            $this->load->model('Vendeur_model');
            $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($_SESSION["username"]);
            $data['passwordchanged'] = false;
            $this->load->vars($data);
            $this->load->view('vendeur_haut');
            $this->load->view('vendeur_profil');
            $this->load->view('vendeur_bas');      
        }
    }
    
    public function modifier_vendeur(){
        if(!isset($_SESSION["username"])){
            $this->afficher();
        }
        else{
            $this->load->model('Vendeur_model');
            $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($_SESSION["username"]);
            $data['logintaken'] = false;
            $this->load->vars($data);
            $this->load->view('vendeur_haut');
            $this->load->view('vendeur_profil_modif');
            $this->load->view('vendeur_bas');
        }
    }
    
    public function modifier_lemdp_vendeur(){
        if(!isset($_SESSION["username"])){
            $this->afficher();
        }
        else{
            $this->load->model('Vendeur_model');
            $data['mdpdifférents'] = false;
            $data['falseoldmdp'] = false;
            $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($_SESSION["username"]);
            $this->load->vars($data);
            $this->load->view('vendeur_haut');
            $this->load->view('vendeur_profil_modif_mdp');
            $this->load->view('vendeur_bas');
        }
    }
    
    public function modifier_donnees_vendeur(){
        if(!isset($_SESSION["username"])){
            $this->afficher();
        }
        else{
            $this->load->model('Vendeur_model');
            $this->load->model('Admin_model');
            $this->form_validation->set_rules('login', 'login', 'required');
            $this->form_validation->set_rules('nom', 'nom', 'required');
            $this->form_validation->set_rules('prenom', 'prenom', 'required');
            
            if($this->form_validation->run()){
                $login = $this->input->post('login');
                $nom = $this->input->post('nom');
                $prenom = $this->input->post('prenom');
                
                $res = $this->Admin_model->can_take_login($login);
                $res2 = $this->Admin_model->can_take_login2($login);
                if ($res[0]["COUNT(1)"]+$res2[0]["COUNT(1)"]==0 or $login == $_SESSION["username"]){
                    
                    $this->Vendeur_model->modifier_infos_vendeur($_SESSION["username"], $login, $nom, $prenom);
                    $session_data = array('username' => $login);
                    $this->session->set_userdata($session_data); 
                    $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($_SESSION["username"]);
                    $data['passwordchanged'] = true;
                    $this->load->vars($data);
                    $this->load->view('vendeur_haut');
                    $this->load->view('vendeur_profil');
                    $this->load->view('vendeur_bas');
                }
                else{
                    $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($_SESSION["username"]);
                    $data['logintaken'] = true;
                    $this->load->vars($data);
                    $this->load->view('vendeur_haut');
                    $this->load->view('vendeur_profil_modif');
                    $this->load->view('vendeur_bas');
                }
            }
            else{
                $this->modifier_vendeur();
            }
        }
    }
    
    public function modifier_mdp_vendeur(){
        if(!isset($_SESSION["username"])){
            $this->afficher();
        }
        else{
            $this->load->model('Vendeur_model');
            $this->form_validation->set_rules('oldpassword', 'oldpassword', 'required');
            $this->form_validation->set_rules('newpassword', 'newpassword', 'required');
            $this->form_validation->set_rules('newpassword2', 'newpassword2', 'required');

            if($this->form_validation->run()){

                $oldpassword = $this->input->post('oldpassword');
                $newpassword = $this->input->post('newpassword');
                $newpassword2 = $this->input->post('newpassword2');
                $salt = "OnRajouteBeaucoupDeSelPourAllongerleMDPdel'4dMiN123!!45678__Test";
                $salt2 = "EtVoilAUnD3uxiemeSelP0urBiLlileeeeeeeeeeeenEmbrouiller!!";
                $oldpassword = hash('sha256', $salt.$oldpassword.$salt2);

                if($oldpassword!=$this->Vendeur_model->get_password($_SESSION["username"])[0]["VENDEUR_mot_de_passe"]){
                    $this->load->model('Vendeur_model');
                    $data['falseoldmdp'] = true;
                    $data['mdpdifférents'] = false;
                    $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($_SESSION["username"]);
                    $this->load->vars($data);
                    $this->load->view('vendeur_haut');
                    $this->load->view('vendeur_profil_modif_mdp');
                    $this->load->view('vendeur_bas');
                }
                else if($newpassword2 != $newpassword){
                    $this->load->model('Vendeur_model');
                    $data['falseoldmdp'] = false;
                    $data['mdpdifférents'] = true;
                    $data['logintaken'] = false;
                    $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($_SESSION["username"]);
                    $this->load->vars($data);
                    $this->load->view('vendeur_haut');
                    $this->load->view('vendeur_profil_modif_mdp');
                    $this->load->view('vendeur_bas');
                }
                else{
                    $newpassword = hash('sha256', $salt.$newpassword.$salt2);
                    $this->load->model('Vendeur_model');
                    $this->Vendeur_model->change_password($_SESSION["username"], $newpassword);

                    $data['vendeur'] = $this->Vendeur_model->get_info_vendeur($_SESSION["username"]);
                    $data['passwordchanged'] = true;
                    $this->load->vars($data);
                    $this->load->view('vendeur_haut');
                    $this->load->view('vendeur_profil');
                    $this->load->view('vendeur_bas');
                }

            }
            else{
                $this->modifier_lemdp_vendeur();
            }
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    /* CONNEXION DE L'ADMIN */
    
    public function enter_as_admin($nom_utilisateur_admin){
        $this->load->library('form_validation');
        $this->load->helper('form');
        $session_data = array('usernamead' => $nom_utilisateur_admin );
        $this->session->set_userdata($session_data); 
        $this->afficher_accueil();
    }
    
    public function afficher_accueil(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        $this->load->model('Admin_model');
        $data['admin'] = $this->Admin_model->get_info_admin($_SESSION["usernamead"]);
        $this->load->vars($data);
        $this->load->view('admin_haut');
        $this->load->view('admin_accueil');
        $this->load->view('admin_bas');
    }
    
    public function voir_commandes(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $data['commandes'] = $this->Admin_model->get_info_commandes();
            $data['commandesp'] = $this->Admin_model->get_info_commandes_prepare();
            $data['commandesx'] = $this->Admin_model->get_info_commandes_expedie();
            $data['commandesd'] = $this->Admin_model->get_info_commandes_disponible();
            $data['commandesr'] = $this->Admin_model->get_info_commandes_retire();
            $data['commandese'] = $this->Admin_model->get_info_commandes_expire(); 
            $data['commandesa'] = $this->Admin_model->get_info_commandes_annule();
            $data['pointretraits'] = $this->Admin_model->get_info_points_retrait();
            $data['admin'] = $this->Admin_model->get_info_admin($_SESSION["usernamead"]);
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_commandes');
            $this->load->view('admin_bas');
        }
    }
    
    public function admin_voir_une_commande($COMMANDE_id){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $data['commande'] = $this->Admin_model->get_info_commande($COMMANDE_id);
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_voir_une_commande');
            $this->load->view('admin_bas');
        }
    }
    
    public function logout_as_admin(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            session_destroy();
            $this->afficher();
        }
    }

    public function afficher_point_retrait(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $data['pointretraits'] = $this->Admin_model->get_info_points_retrait();
            $data['admin'] = $this->Admin_model->get_info_admin($_SESSION["usernamead"]);
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_afficher_point_retrait');
            $this->load->view('admin_bas');
        }
    }
    
    public function admin_voir_commandes_point_retrait(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->form_validation->set_rules('point_retrait_id', 'point_retrait_id', 'required');
            $this->form_validation->set_rules('admin_login', 'admin_login', 'required');
            $POINT_RETRAIT_id = $this->input->post('point_retrait_id');

            $this->load->model('Admin_model');
            $data['commandes'] = $this->Admin_model->get_commandes_point_retrait($POINT_RETRAIT_id);
            $data['admin'] = $this->Admin_model->get_info_admin($_SESSION["usernamead"]);
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_afficher_commandes_point_retrait');
            $this->load->view('admin_bas');
        }
    }
    
    
    public function info_admin(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $data['admin'] = $this->Admin_model->get_info_admin($_SESSION["usernamead"]);
            $data['passwordchanged'] = false;
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_profil');
            $this->load->view('admin_bas');
        }
    }

    public function modifier_donnees_admin(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $this->form_validation->set_rules('login', 'login', 'required');
            if($this->form_validation->run()){
                $login = $this->input->post('login');
                $res = $this->Admin_model->can_take_login($login);
                $res2 = $this->Admin_model->can_take_login2($login);
                if ($res[0]["COUNT(1)"]+$res2[0]["COUNT(1)"]==0 or $login == $_SESSION["usernamead"]){
                    
                    $this->Admin_model->modifier_infos_admin($_SESSION["usernamead"], $login);
                    $session_data = array('usernamead' => $login);
                    $this->session->set_userdata($session_data); 
                    $data['admin'] = $this->Admin_model->get_info_admin($_SESSION["usernamead"]);
                    $data['passwordchanged'] = true;
                    $this->load->vars($data);
                    $this->load->view('admin_haut');
                    $this->load->view('admin_profil');
                    $this->load->view('admin_bas');
                }
                else{
                    $data['admin'] = $this->Admin_model->get_info_admin($_SESSION["usernamead"]);
                    $data['logintaken'] = true;
                    $this->load->vars($data);
                    $this->load->view('admin_haut');
                    $this->load->view('admin_profil_modif');
                    $this->load->view('admin_bas');
                }
            }
            else{
                $this->modifier_admin();
            }
        }
    }
    
    public function modifier_lemdp_admin(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $data['falseoldmdp'] = false;
            $data['mdpdifférents'] = false;
            $data['admin'] = $this->Admin_model->get_info_admin($_SESSION["usernamead"]);
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_profil_modif_mdp');
            $this->load->view('admin_bas');
        }
    }
    
    public function modifier_admin(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $data['falseoldmdp'] = false;
            $data['logintaken'] = false;
            $data['admin'] = $this->Admin_model->get_info_admin($_SESSION["usernamead"]);
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_profil_modif');
            $this->load->view('admin_bas');
        }
    }

    public function voir_comptes(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $data['compte_cree'] = false;
            $data['comptes'] = $this->Admin_model->get_info_vendeurs();
            $data['source'] = $this->Admin_model->verify_source_admin($_SESSION["usernamead"]);
            $data['compte_admin'] = $this->Admin_model->get_info_admins();
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_voir_comptes');
            $this->load->view('admin_bas');
        }
    }
    
    public function voir_comptes_avec_creation(){
    if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $data['compte_cree'] = true;
            $data['comptes'] = $this->Admin_model->get_info_vendeurs();
            $data['source'] = $this->Admin_model->verify_source_admin($_SESSION["usernamead"]);
            $data['compte_admin'] = $this->Admin_model->get_info_admins();
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_voir_comptes');
            $this->load->view('admin_bas');
        }
    }

    public function ajouter_vendeur(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $data['logintaken'] = false;
            $data['mdpequivalents'] = true;
            $data['point_retrait'] = $this->Admin_model->get_noms_point_retrait();
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_ajouter_vendeur');
            $this->load->view('admin_bas');
        }
    }

    public function ajouter_admin(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $data['mdpequivalents'] = true;
            $data['logintaken'] = false;
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_ajouter_admin');
            $this->load->view('admin_bas');
        }
    }

    public function ajout_du_vendeur(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->form_validation->set_rules('Login', 'Login', 'required');
            $this->form_validation->set_rules('Nom', 'Nom', 'required');
            $this->form_validation->set_rules('Prenom', 'Prenom', 'required');
            $this->form_validation->set_rules('Mot_de_passe', 'Mot_de_passe', 'required');
            $this->form_validation->set_rules('verif_mot_de_passe', 'verif_mot_de_passe', 'required');
            $this->form_validation->set_rules('Point_retrait', 'Point_retrait', 'required');

            if($this->form_validation->run()){
                $VENDEUR_login = $this->input->post('Login');
                $VENDEUR_nom = $this->input->post('Nom');
                $VENDEUR_prenom = $this->input->post('Prenom');
                $VENDEUR_mot_de_passe = $this->input->post('Mot_de_passe');
                $VENDEUR_point_retrait = $this->input->post('Point_retrait');
                $VENDEUR_verif_mot_de_passe = $this->input->post('verif_mot_de_passe');
                if($VENDEUR_mot_de_passe == $VENDEUR_verif_mot_de_passe){
                    $this->load->model('Admin_model');
                    $res = $this->Admin_model->can_take_login($VENDEUR_login);
                    $res2 = $this->Admin_model->can_take_login2($VENDEUR_login);
                    if ($res[0]["COUNT(1)"]+$res2[0]["COUNT(1)"]==0){

                        $salt = "OnRajouteBeaucoupDeSelPourAllongerleMDPdel'4dMiN123!!45678__Test";
                        $salt2 = "EtVoilAUnD3uxiemeSelP0urBiLlileeeeeeeeeeeenEmbrouiller!!";
                        $password = hash('sha256', $salt.$VENDEUR_mot_de_passe.$salt2);
                        $VENDEUR_point_retrait = $this->Admin_model->get_id_from_nom_pt_retrait($VENDEUR_point_retrait)[0]["POINT_RETRAIT_id"];
                        print_r($VENDEUR_point_retrait);
                        $this->Admin_model->Ajouter_vendeur($VENDEUR_login, $VENDEUR_nom, $VENDEUR_prenom, $password, $VENDEUR_point_retrait);
                        $this->voir_comptes_avec_creation();
                    }
                    else{
                        $data['logintaken'] = true;
                        $data['mdpequivalents'] = true;
                        $this->load->vars($data);
                        $this->load->view('admin_haut');
                        $this->load->view('admin_ajouter_vendeur');
                        $this->load->view('admin_bas');
                    }
                }
                else{
                    $data['logintaken'] = false;
                    $data['mdpequivalents'] = false;
                    $this->load->vars($data);
                    $this->load->view('admin_haut');
                    $this->load->view('admin_ajouter_vendeur');
                    $this->load->view('admin_bas');
                }
            }
            else{
                $ADMIN_login = $this->input->post('admin_login');
                $this->ajouter_vendeur();
            }
        }
    }

        public function ajout_de_admin(){
            if(!isset($_SESSION["usernamead"])){
                $this->afficher();
            }
            else{
                $this->form_validation->set_rules('Login', 'Login', 'required');
                $this->form_validation->set_rules('Mot_de_passe', 'Mot_de_passe', 'required');
                $this->form_validation->set_rules('verif_mot_de_passe', 'verif_mot_de_passe', 'required');

                if($this->form_validation->run()){
                    $this->load->model('Admin_model');
                    $ADMIN_new_login = $this->input->post('Login');
                    $ADMIN_new_mot_de_passe = $this->input->post('Mot_de_passe');
                    $ADMIN_new_mot_de_passe_verif = $this->input->post('verif_mot_de_passe');
                    if($ADMIN_new_mot_de_passe == $ADMIN_new_mot_de_passe_verif){
                        
                        $res = $this->Admin_model->can_take_login($ADMIN_new_login);
                        $res2 = $this->Admin_model->can_take_login2($ADMIN_new_login);
                        if ($res[0]["COUNT(1)"]+$res2[0]["COUNT(1)"]==0){    

                            $salt = "OnRajouteBeaucoupDeSelPourAllongerleMDPdel'4dMiN123!!45678__Test";
                            $salt2 = "EtVoilAUnD3uxiemeSelP0urBiLlileeeeeeeeeeeenEmbrouiller!!";
                            $password = hash('sha256', $salt.$ADMIN_new_mot_de_passe.$salt2);
                            $this->Admin_model->Ajouter_admin($ADMIN_new_login, $password);
                            $this->voir_comptes_avec_creation();
                            }
                        else{
                            $data['logintaken'] = true;
                            $data['mdpequivalents'] = true;
                            $this->load->vars($data);
                            $this->load->view('admin_haut');
                            $this->load->view('admin_ajouter_admin');
                            $this->load->view('admin_bas');
                        }
                    }
                    else{
                        $data['logintaken'] = false;
                        $data['mdpequivalents'] = false;
                        $this->load->vars($data);
                        $this->load->view('admin_haut');
                        $this->load->view('admin_ajouter_admin');
                        $this->load->view('admin_bas');
                    }
                }
                else{
                    $this->ajouter_admin();
                }
            }
    }

    public function modifier_mdp_admin(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $this->form_validation->set_rules('oldpassword', 'oldpassword', 'required');
            $this->form_validation->set_rules('newpassword', 'newpassword', 'required');
            $this->form_validation->set_rules('newpassword2', 'newpassword2', 'required');

            if($this->form_validation->run()){

                $oldpassword = $this->input->post('oldpassword');
                $newpassword = $this->input->post('newpassword');
                $newpassword2 = $this->input->post('newpassword2');
                $salt = "OnRajouteBeaucoupDeSelPourAllongerleMDPdel'4dMiN123!!45678__Test";
                $salt2 = "EtVoilAUnD3uxiemeSelP0urBiLlileeeeeeeeeeeenEmbrouiller!!";
                $oldpassword = hash('sha256', $salt.$oldpassword.$salt2);

                if($oldpassword!=$this->Admin_model->get_password($_SESSION["usernamead"])[0]["LTQCLAC_mot_de_passe"]){
                    $data['falseoldmdp'] = true;
                    $data['mdpdifférents'] = false;
                    $data['admin'] = $this->Admin_model->get_info_admin($_SESSION["usernamead"]);
                    $this->load->vars($data);
                    $this->load->view('admin_haut');
                    $this->load->view('admin_profil_modif_mdp');
                    $this->load->view('admin_bas');
                }
                else if($newpassword2 != $newpassword){
                    $this->load->model('Vendeur_model');
                    $data['falseoldmdp'] = false;
                    $data['mdpdifférents'] = true;
                    $data['admin'] = $this->Admin_model->get_info_admin($_SESSION["usernamead"]);
                    $this->load->vars($data);
                    $this->load->view('admin_haut');
                    $this->load->view('admin_profil_modif_mdp');
                    $this->load->view('admin_bas');
                }
                else{
                    $newpassword = hash('sha256', $salt.$newpassword.$salt2);
                    $this->Admin_model->change_password($_SESSION["usernamead"], $newpassword);
                    $data['admin'] = $this->Admin_model->get_info_admin($_SESSION["usernamead"]);
                    $data['passwordchanged'] = true;
                    $this->load->vars($data);
                    $this->load->view('admin_haut');
                    $this->load->view('admin_profil');
                    $this->load->view('admin_bas');
                }

            }
            else{
                $this->modifier_lemdp_admin();
            }
        }
    }

    public function voir_actualites(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $data['actualites'] = $this->Admin_model->get_actualites();
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_afficher_actualites');
            $this->load->view('admin_bas');
        }
    }

    public function voir_galerie_admin(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $data['goodies'] = $this->Admin_model->get_goodies();
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_galerie');
            $this->load->view('admin_bas');
        }
    }

    public function modifier_etat_commande($COMMANDE_id){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->load->model('Admin_model');
            $data['commandes'] = $this->Admin_model->get_info_commande($COMMANDE_id);
            $this->load->vars($data);
            $this->load->view('admin_haut');
            $this->load->view('admin_modifier_etat_commande');
            $this->load->view('admin_bas');
        }
    }
    
    public function modification_etat_commande(){
        if(!isset($_SESSION["usernamead"])){
            $this->afficher();
        }
        else{
            $this->form_validation->set_rules('COMMANDE_etat', 'COMMANDE_etat', 'required');
            $this->form_validation->set_rules('COMMANDE_id', 'COMMANDE_id', 'required');
            $this->load->model('Admin_model');

            if($this->form_validation->run()){
                $COMMANDE_etat = $this->input->post('COMMANDE_etat');
                $COMMANDE_id = $this->input->post('COMMANDE_id');
                $this->Admin_model->modifier_etat_commande($COMMANDE_etat, $COMMANDE_id);
                $this->voir_commandes();
            }
            else{
                $this->modifier_etat_commande($COMMANDE_id);
            }
        }
    }
    
    //public function ajouter_actualites(){
        
    //}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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

    public function supprimer_commande_client($COMMANDE_id){
        $this->load->model('Commande_model');
        $this->Commande_model->supprimer_commande($COMMANDE_id);
        $this->afficher();
    }
    
    
    
}
?>
