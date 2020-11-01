<?php
class topicoController extends controller{
    public function index($id){
        $dados = array();
        $etapa = new Etapa();
        $topico = new Topico();
        $dados['etapa'] = $etapa->pegarPeloId($id);
        $dados['topicos'] = $topico->pegarTodosTopicosId($id);
        
        $this->loadTemplate('topicos', $dados);
    }

    public function adicionarTopico($id_etapa){//posteriormente fazer todo o processo em uma só função(assim como o editar)
        $dados = array();
        $etapa = new Etapa();
        $dados['etapa'] = $etapa->pegarPeloId($id_etapa);//pega a etapa que chamou a função

        $this->loadTemplate('adicionar_topico', $dados);
    }


    public function salvarTopicoAdicionado(){ //função que irá chamar o model responsavel por adicionar uma etapa
        if(!empty($_POST['nome'])) { //caso ja receba um nome ao carregar
            $id_etapa = $_POST['id_etapa'];
            $nome = $_POST['nome']; //setta o nome recebido
            $descricao = $_POST['descricao']; //setta a descrição recebida
			$topico = new Topico();
			$topico->adicionarTopicoModel($id_etapa, $nome, $descricao);
		    header("Location: ".BASE_URL.'topico/index/'.$id_etapa);		
		} else {//caso ainda não tenha recebido um registro
			header("Location: ".BASE_URL.'topico/index/'.$id_etapa);//carrega o view para inserir
		}
    } 


    public function editarTopico($id){
        $dados = array();
        $topico = new Topico();
        $dados['info'] = $topico->pegarPeloId($id);

		if(!empty($id)) {//pegar as informações do contato pelo ID
            

			if(!empty($_POST['nome'])) {//caso recebeu um nome via post(recebido do form de edição)
                $id_etapa = $dados['info']['id_etapa'];
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];

				$topico->editarTopicoModel( $id, $id_etapa, $nome, $descricao);//chama o metodo que salva a edicao feita
			} else {
				//$dados['info'] = $topico->pegarPeloId($id);//receber os dados do registro para carregar a tela

				if(isset($dados['info']['id'])) {
					$this->loadTemplate('editar_topico', $dados);//carregar o formulário, preenchido.
					exit;
				}
			}
		}

		header("Location: ".BASE_URL.'topico/index/'.$id_etapa);
    }
}