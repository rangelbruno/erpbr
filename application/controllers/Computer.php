<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Computer extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


		public  function index()
		{
			//$this->verificar_sessao();
			$this->load->view('includes/header.php');
			$this->load->view('includes/menu.php');
			$variaveis['computers'] = $this->c_computer->get();
			$this->load->view('listar_computer', $variaveis);
			//$this->load->view('listar_usuario');
			$this->load->view('includes/footer.php');
		}

 }
