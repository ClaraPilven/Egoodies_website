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
        $this->load->model('afficherActualites');
        $data['actu'] = $this->afficherActualites->get_actu();
        $data['randomgoodies'] = $this->afficherActualites->get_random_goodie();
        $this->load->vars($data);
        $this->load->view('haut.php');
        $this->load->view('index.php');
        $this->load->view('bas.php');

    }

	 public function login(){
         $this->load->library('form_validation');
         $this->load->helper('form');
         //$this->load->model('afficherActualites');
         $this->load->view('haut.php');
		 $this->load->view('login');
         $this->load->view('bas.php');
	 }
    
    public function adminconnect(){            
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
           //$this->form_validation->set_message('required','il faut rentrer un %s');// fonction du formulaire

            if($this->form_validation->run())
           {
                //si le formulaire est bien rempli
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                //$hashed = md5($password);
                //fonction du modele qui vrérifiera les identifiants
                $this->load->model('afficherActualites');
                
                if($this->afficherActualites->can_login($username,$password)) // on vérifie si les identifiants correspondent a notre bdd
                {
                     $session_data = array(
                          'username'     =>     $username
                     );
                     $this->session->set_userdata($session_data); // on initialise les variables de session
                     set_cookie('username_val', $username, 3600); 

                    $this->enter_as_vendeur(); 
                
                }

                else // si les identifiants sont incorrects
                {

                   
                     redirect($this->login());
                }
           }
           else
           {
                //si le formulaire n'est pas correctement rempli
                redirect($this->login());
           }
            
        }// fin de login validation
    
    public function enter_as_vendeur(){
        set_cookie('username_val', 'lol', 3600); 

        $this->load->library('form_validation');
         $this->load->helper('form');
         //$this->load->model('afficherActualites');
         $this->load->view('haut.php');
		 $this->load->view('cart');
         $this->load->view('bas.php');
    }
    
    public function fail_enter_as_vendeur(){
        delete_cookie($username_val);
        $this->load->library('form_validation');
        $this->load->helper('form');
        //$this->load->model('afficherActualites');
        $this->load->view('haut.php');
		$this->load->view('cart');
        $this->load->view('bas.php');
    }
}
?>
