<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadastroUser extends CI_Controller {

	/**
	 * Carrega o formulário para novo cadastro
	 * @param nenhum
	 * @return view
	 */
	public function create()
	{
		$this->load->view('includes/header.php');
		$this->load->view('includes/menu.php');
		$variaveis['titulo'] = 'Novo Cadastro';
		$this->load->view('edit_user', $variaveis);
		$this->load->view('includes/footer.php');
	}

	/**
  * Processa o formulário para salvar os dados
  */
	public function salvar(){

		// Recupera os contatos através do model
		$contatos = $this->contatos_model->GetAll('name');
		// Passa os contatos para o array que será enviado à home
		$dados['contatos'] =$this->contatos_model->Formatar($contatos);
		// Executa o processo de validação do formulário
		$validacao = self::Validar();

		// Verifica o status da validação do formulário
		// Se não houverem erros, então insere no banco e informa ao usuário
		// caso contrário informa ao usuários os erros de validação
		if($validacao){
			// Recupera os dados do formulário
			$contato = $this->input->post();
			// Insere os dados no banco recuperando o status dessa operação
			$status = $this->contatos_model->Inserir($contato);
			// Checa o status da operação gravando a mensagem na seção
			if(!$status){
				$this->session->set_flashdata('error', 'Não foi possível inserir o contato.');
			}else{
				$this->session->set_flashdata('success', 'Contato inserido com sucesso.');
				// Redireciona o usuário para a home
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
		}
		// Carrega a home
		$this->load->view('listar_usuario',$dados);

	}
	/**
	 * Salva o registro no banco de dados.
	 * Caso venha o valor id, indica uma edição, caso contrário, um insert.
	 * @param campos do formulário
	 * @return view
	 */
	public function store(){

		$this->load->library('form_validation');

		$regras = array(
		        array(
		                'field' => 'name',
		                'label' => 'Nome',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'telefone',
		                'label' => 'telefone',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'email',
		                'label' => 'E-mail',
		                'rules' => 'required|valid_email'
		        ),
		        array(
		                'field' => 'username',
		                'label' => 'Usuario',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'roles_id',
		                'label' => 'Tipo',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'password',
		                'label' => 'Senha',
		                'rules' => 'required'
		        )
		);

		$this->form_validation->set_rules($regras);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/header.php');
			$this->load->view('includes/menu.php');
			$variaveis['titulo'] = 'Novo Registro';
			$this->load->view('edit_user', $variaveis);
			$this->load->view('includes/footer.php');
		} else {

			$id = $this->input->post('id');

			$dados = array(

				"name" => $this->input->post('name'),
				"telefone" => $this->input->post('telefone'),
				"email" => $this->input->post('email'),
				"username" => $this->input->post('username'),
				"roles_id" => $this->input->post('roles_id'),
				"password" => $this->input->post('password')

			);
			if ($this->m_cadastros->store($dados, $id)) {
				$variaveis['mensagem'] = "Dados gravados com sucesso!";
				$this->load->view('v_sucesso', $variaveis);
			} else {
				$variaveis['mensagem'] = "Ocorreu um erro. Por favor, tente novamente.";
				$this->load->view('errors/html/v_erro', $variaveis);
			}

		}
	}
	/**
	 * Chama o formulário com os campos preenchidos pelo registro selecioando.
	 * @param $id do registro
	 * @return view
	 */
	public function edit($id = null){

		if ($id) {
			$this->load->view('includes/header.php');
			$this->load->view('includes/menu.php');
			$users = $this->m_cadastros->get($id);

			if ($users->num_rows() > 0 ) {
				$variaveis['titulo'] = 'Edição de Registro';
				$variaveis['id'] = $users->row()->id;
				$variaveis['name'] = $users->row()->name;
				$variaveis['telefone'] = $users->row()->telefone;
				$variaveis['email'] = $users->row()->email;
				$variaveis['username'] = $users->row()->username;
				$variaveis['roles_id'] = $users->row()->roles_id;
				$variaveis['password'] = $users->row()->password;
				$this->load->view('edit_user', $variaveis);
				$this->load->view('includes/footer.php');
			} else {
				$variaveis['mensagem'] = "Registro não encontrado." ;
				$this->load->view('errors/html/v_erro', $variaveis);
			}

		}

	}
	/**
	 * Função que exclui o registro através do id.
	 * @param $id do registro a ser excluído.
	 * @return boolean;
	 */
	public function delete($id = null) {
		if ($this->m_cadastros->delete($id)) {
			$variaveis['mensagem'] = "Registro excluído com sucesso!";
			$this->load->view('v_sucesso', $variaveis);
		}
	}

	/**
  * Valida os dados do formulário
  *
  * @param string $operacao Operação realizada no formulário: insert ou update
  *
  * @return boolean
  */
	private function Validar($operacao = 'insert'){
		// Com base no parâmetro passado
		// determina as regras de validação
		switch($operacao){
			case 'insert':
				$rules['name'] = array('trim', 'required', 'min_length[3]');
				$rules['telefone'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[contatos.email]');
				$rules['username'] = array('trim', 'required', 'min_length[3]');
				$rules['roles_id'] = array('trim', 'required', 'min_length[3]');
				$rules['password'] = array('trim', 'required', 'min_length[3]');
				break;
			case 'update':
				$rules['name'] = array('trim', 'required', 'min_length[3]');
				$rules['telefone'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email');
				$rules['username'] = array('trim', 'required', 'min_length[3]');
				$rules['roles_id'] = array('trim', 'required', 'min_length[3]');
				$rules['password'] = array('trim', 'required', 'min_length[3]');
				break;
			default:
				$rules['name'] = array('trim', 'required', 'min_length[3]');
				$rules['telefone'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[contatos.email]');
				$rules['username'] = array('trim', 'required', 'min_length[3]');
				$rules['roles_id'] = array('trim', 'required', 'min_length[3]');
				$rules['password'] = array('trim', 'required', 'min_length[3]');
				break;
		}

		$this->form_validation->set_rules('name', 'Nome', $rules['name']);
		$this->form_validation->set_rules('telefone', 'Telefone', $rules['telefone']);
		$this->form_validation->set_rules('email', 'Email', $rules['email']);
		$this->form_validation->set_rules('username', 'Usuario', $rules['username']);
		$this->form_validation->set_rules('roles_id', 'Tipo', $rules['roles_id']);
		$this->form_validation->set_rules('password', 'Senha', $rules['password']);

		// Executa a validação e retorna o status
		return $this->form_validation->run();
	}

}
