<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CadastroComputer extends CI_Controller {

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
		$this->load->view('edit_computer', $variaveis);
		$this->load->view('includes/footer.php');
	}

	/**
  * Processa o formulário para salvar os dados
  */
	public function salvar(){

		// Recupera os contatos através do model
		$contatos = $this->contatos_model->GetAll('ip_atual');
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
		$this->load->view('listar_computer',$dados);

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
		                'field' => 'tipo',
		                'label' => 'Tipo',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'ip_atual',
		                'label' => 'IP',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'hostname',
		                'label' => 'Hostname',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'mac',
		                'label' => 'MAC',
		                'rules' => 'required'
		        ),
		        array(
		                'field' => 'setor',
		                'label' => 'Setor',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'processador',
		                'label' => 'Processador',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'usuario',
		                'label' => 'Usuario',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'memoria',
		                'label' => 'Memoria',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'so',
		                'label' => 'Sistema Operacional',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'mem',
		                'label' => 'Capacidade Memoria',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'hd',
		                'label' => 'HD',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'modelo',
		                'label' => 'Placa Mae',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'tipo_monitor',
		                'label' => 'Tipo Monitor',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'monitor',
		                'label' => 'Polegadas',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'avaliacao',
		                'label' => 'Avaliacao',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'serie_gabinete',
		                'label' => 'Patrimonio Gabinete',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'serie_monitor',
		                'label' => 'Patrimonio Monitor',
		                'rules' => 'required'
		        ),
						array(
		                'field' => 'observacao',
		                'label' => 'Observacao',
		                'rules' => 'required'
		        )
		);

		$this->form_validation->set_rules($regras);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('includes/header.php');
			$this->load->view('includes/menu.php');
			$variaveis['titulo'] = 'Novo Registro';
			$this->load->view('edit_computer', $variaveis);
			$this->load->view('includes/footer.php');
		} else {

			$id = $this->input->post('id');

			$dados = array(

				"tipo" => $this->input->post('tipo'),
				"ip_atual" => $this->input->post('ip_atual'),
				"hostname" => $this->input->post('hostname'),
				"mac" => $this->input->post('mac'),
				"setor" => $this->input->post('setor'),
				"ip_novo" => $this->input->post('ip_novo'),
				"usuario" => $this->input->post('usuario'),
				"processador" => $this->input->post('processador'),
				"memoria" => $this->input->post('memoria'),
				"so" => $this->input->post('so'),
				"mem" => $this->input->post('mem'),
				"hd" => $this->input->post('hd'),
				"modelo" => $this->input->post('modelo'),
				"tipo_monitor" => $this->input->post('tipo_monitor'),
				"monitor" => $this->input->post('monitor'),
				"avaliacao" => $this->input->post('avaliacao'),
				"serie_gabinete" => $this->input->post('serie_gabinete'),
				"serie_monitor" => $this->input->post('serie_monitor'),
				"observacao" => $this->input->post('observacao')
			);
			if ($this->c_computer->store($dados, $id)) {
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
			$computers = $this->c_computer->get($id);

			if ($computers->num_rows() > 0 ) {
				$variaveis['titulo'] = 'Edição de Registro';
				$variaveis['id'] = $computers->row()->id;
				$variaveis['tipo'] = $computers->row()->tipo;
				$variaveis['ip_atual'] = $computers->row()->ip_atual;
				$variaveis['hostname'] = $computers->row()->hostname;
				$variaveis['mac'] = $computers->row()->mac;
				$variaveis['setor'] = $computers->row()->setor;
				$variaveis['ip_novo'] = $computers->row()->ip_novo;
				$variaveis['usuario'] = $computers->row()->usuario;
				$variaveis['processador'] = $computers->row()->processador;
				$variaveis['memoria'] = $computers->row()->memoria;
				$variaveis['so'] = $computers->row()->so;
				$variaveis['clock'] = $computers->row()->clock;
				$variaveis['mem'] = $computers->row()->mem;
				$variaveis['hd'] = $computers->row()->hd;
				$variaveis['modelo'] = $computers->row()->modelo;
				$variaveis['tipo_monitor'] = $computers->row()->tipo_monitor;
				$variaveis['monitor'] = $computers->row()->monitor;
				$variaveis['avaliacao'] = $computers->row()->avaliacao;
				$variaveis['serie_gabinete'] = $computers->row()->serie_gabinete;
				$variaveis['serie_monitor'] = $computers->row()->serie_monitor;
				$variaveis['observacao'] = $computers->row()->observacao;
				$this->load->view('edit_computer', $variaveis);
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
		if ($this->c_computer->delete($id)) {
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
				$rules['ip_atual'] = array('trim', 'required', 'min_length[3]');
				$rules['setor'] = array('trim', 'required', 'min_length[3]');
				$rules['processador'] = array('trim', 'required', 'min_length[3]');
				$rules['meoria'] = array('trim', 'required', 'min_length[3]');
				$rules['mac'] = array('trim', 'required', 'min_length[3]');
				$rules['usuario'] = array('trim', 'required', 'min_length[3]');
				$rules['so'] = array('trim', 'required', 'min_length[3]');
				$rules['clock'] = array('trim', 'required', 'min_length[3]');
				$rules['mem'] = array('trim', 'required', 'min_length[3]');
				$rules['hd'] = array('trim', 'required', 'min_length[3]');
				$rules['modelo'] = array('trim', 'required', 'min_length[3]');
				$rules['tipo_monitor'] = array('trim', 'required', 'min_length[3]');
				$rules['monitor'] = array('trim', 'required', 'min_length[3]');
				$rules['avaliacao'] = array('trim', 'required', 'min_length[3]');
				$rules['serie_gabinete'] = array('trim', 'required', 'min_length[3]');
				$rules['serie_monitor'] = array('trim', 'required', 'min_length[3]');
				$rules['observacao'] = array('trim', 'required', 'min_length[3]');
				break;
			case 'update':
			$rules['ip_atual'] = array('trim', 'required', 'min_length[3]');
			$rules['setor'] = array('trim', 'required', 'min_length[3]');
			$rules['processador'] = array('trim', 'required', 'min_length[3]');
			$rules['meoria'] = array('trim', 'required', 'min_length[3]');
			$rules['mac'] = array('trim', 'required', 'min_length[3]');
			$rules['usuario'] = array('trim', 'required', 'min_length[3]');
			$rules['so'] = array('trim', 'required', 'min_length[3]');
			$rules['clock'] = array('trim', 'required', 'min_length[3]');
			$rules['mem'] = array('trim', 'required', 'min_length[3]');
			$rules['hd'] = array('trim', 'required', 'min_length[3]');
			$rules['modelo'] = array('trim', 'required', 'min_length[3]');
			$rules['tipo_monitor'] = array('trim', 'required', 'min_length[3]');
			$rules['monitor'] = array('trim', 'required', 'min_length[3]');
			$rules['avaliacao'] = array('trim', 'required', 'min_length[3]');
			$rules['serie_gabinete'] = array('trim', 'required', 'min_length[3]');
			$rules['serie_monitor'] = array('trim', 'required', 'min_length[3]');
			$rules['observacao'] = array('trim', 'required', 'min_length[3]');
				break;
			default:
			$rules['ip_atual'] = array('trim', 'required', 'min_length[3]');
			$rules['setor'] = array('trim', 'required', 'min_length[3]');
			$rules['processador'] = array('trim', 'required', 'min_length[3]');
			$rules['meoria'] = array('trim', 'required', 'min_length[3]');
			$rules['mac'] = array('trim', 'required', 'min_length[3]');
			$rules['usuario'] = array('trim', 'required', 'min_length[3]');
			$rules['so'] = array('trim', 'required', 'min_length[3]');
			$rules['clock'] = array('trim', 'required', 'min_length[3]');
			$rules['mem'] = array('trim', 'required', 'min_length[3]');
			$rules['hd'] = array('trim', 'required', 'min_length[3]');
			$rules['modelo'] = array('trim', 'required', 'min_length[3]');
			$rules['tipo_monitor'] = array('trim', 'required', 'min_length[3]');
			$rules['monitor'] = array('trim', 'required', 'min_length[3]');
			$rules['avaliacao'] = array('trim', 'required', 'min_length[3]');
			$rules['serie_gabinete'] = array('trim', 'required', 'min_length[3]');
			$rules['serie_monitor'] = array('trim', 'required', 'min_length[3]');
			$rules['observacao'] = array('trim', 'required', 'min_length[3]');
				break;
		}

		$this->form_validation->set_rules('ip_atual', 'IP', $rules['ip_atual']);
		$this->form_validation->set_rules('setor', 'Setor', $rules['setor']);
		$this->form_validation->set_rules('processador', 'Processador', $rules['processador']);
		$this->form_validation->set_rules('memoria', 'Memoria', $rules['memoria']);
		$this->form_validation->set_rules('mac', 'MAC', $rules['mac']);
		$this->form_validation->set_rules('ip_novo', 'IPNovo', $rules['ip_novo']);
		$this->form_validation->set_rules('usuario', 'Usuario', $rules['usuario']);
		$this->form_validation->set_rules('so', 'Sistema Operacional', $rules['so']);
		$this->form_validation->set_rules('clock', 'Clock', $rules['clock']);
		$this->form_validation->set_rules('mem', 'MEM', $rules['mem']);
		$this->form_validation->set_rules('hd', 'HD', $rules['hd']);
		$this->form_validation->set_rules('modelo', 'Placa Mae', $rules['modelo']);
		$this->form_validation->set_rules('tipo_monitor', 'Tipo Monitor', $rules['tipo_monitor']);
		$this->form_validation->set_rules('monitor', 'Polegada', $rules['monitor']);
		$this->form_validation->set_rules('avaliacao', 'Avaliacao', $rules['avaliacao']);
		$this->form_validation->set_rules('serie_gabinete', 'Patrimonio Gabinete', $rules['serie_gabinete']);
		$this->form_validation->set_rules('serie_monitor', 'Patrimonio Monitor', $rules['serie_monitor']);
		$this->form_validation->set_rules('observacao', 'Observação', $rules['observacao']);
		// Executa a validação e retorna o status
		return $this->form_validation->run();
	}

}
