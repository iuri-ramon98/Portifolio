<?php

class etapaController extends controller{

    public function index(){ // função que irá mostrar todas as etapas
        $dados = array();// cria um array vazio
        $etapa = new Etapa();// instancia a classe etapa
        $dados['lista'] = $etapa->pegarTodos();//chama a função que pega todas as etapas
        
        $this->loadTemplate('etapas', $dados);//chama o template passando o nome da view e o array de dados

    }

    public function adicionarEtapa(){ // função que irá carregar a tela para adcionar uma nova etapa
        $dados = array();
    
		$this->loadTemplate('adicionar_etapa');
    }

    public function salvarEtapaAdicionada(){ //função que irá chamar o model responsavel por adicionar uma etapa
        if(!empty($_POST['nome'])) { //caso ja receba um nome ao carregar
			$nome = $_POST['nome']; //setta o nome recebido
            $descricao = $_POST['descricao']; //setta a descrição recebida
			$etapa = new Etapa();
			$etapa->adicionarEtapaModel($nome, $descricao);
		    header("Location: ".BASE_URL.'etapa/index');		
		} else {//caso ainda não tenha recebido um registro
			header("Location: ".BASE_URL.'etapa/adicionarEtapa');//carrega o view para inserir
		}
    } 

    public function editarEtapa($id){ //função que irá carregar a tela para editar uma nova etapa, e fazer sua alteração
		
		$dados = array();

		if(!empty($id)) {//pegar as informações do contato pelo ID
			$etapa = new Etapa();

			if(!empty($_POST['nome'])) {//caso recebeu um nome via post(recebido do form de edição)
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];

				$etapa->editarEtapaModel($nome, $id, $descricao);//chama o metodo que salva a edicao feita
			} else {
				$dados['info'] = $etapa->pegarPeloId($id);//receber os dados do registro para carregar a tela

				if(isset($dados['info']['id'])) {
					$this->loadTemplate('editar_etapa', $dados);//carregar o formulário, preenchido.
					exit;
				}
			}
		}

		header("Location: ".BASE_URL.'etapa/index');
    }

 /*   public function excluirEtapa($id){//função de exclusão da etapa

    }*/
}