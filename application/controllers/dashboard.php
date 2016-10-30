<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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

		//public function verificar_sessao()
		//{
			//if ($this->session->userdata('logado') == false) {
				//redirect('dashboard/login');
			//}
		//}

		public function index()
		{
			//$this->verificar_sessao();
			$this->load->view('includes/header.php');
			$this->load->view('includes/menu.php');
			$variaveis['users'] = $this->m_cadastros->get();
			$this->load->view('dashboard', $variaveis);
			$this->load->view('includes/footer.php');
		}

		//public function login()
		 //{
			//$this->load->view('includes/header.php');
			//$this->load->view('login');
			//$this->load->view('includes/footer.php');
		 //}

		 //public function logar()
		 //{
			 //$username = $this->input->post('username');
			 //$password = md5($this->input->post('password'));

			 //$this->db->where('password', $password);
			 //$this->db->where('username', $username);
			 //$this->db->where('username', 1);

			 //$data['users'] = $this->db->get('users')->result();

			 //if(count($data['users']) == 1)
			 //{
				 //$dados['name'] = $data['users'][0]->name;
				 //$dados['id'] = $data['users'][0]->id;
				 //$dados['logado'] = true;
				 //$this->session->set_userdata($dados);
				 //redirect('dashboard');
			 //}else
			 //{
				// redirect('dashboard/login');
			 //}
		 //}

		// public function logout()
		 //{
			 //$this->session->session_destroy();
			 //redirect('dashboard');
		 //}

 }
