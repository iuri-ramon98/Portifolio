<?php
class arquivoController extends controller{
    public function index($id){
        $dados = array();
        $topico = new Topico();
        $arquivo = new Arquivo();

        $dados['topico'] = $topico->pegarPeloId($id);
        $dados['arquivos'] = $arquivo->pegarTodosArquivosId($id);

        $this->loadTemplate('arquivos', $dados);

    }


    public function adicionarArquivo($id_topico){
        $array = array();
        $dados = array();
        $topico = new Topico();
        $dados['topico'] = $topico->pegarPeloId($id_topico);//pega a etapa que chamou a função
        if(!empty($_POST['descricao']) && !empty($_FILES['arquivo']['tmp_name'])){
            $arquivo_recebido = $_FILES['arquivo'];
            $nome_mostrado = $arquivo_recebido['name'];
            $descricao = $_POST['descricao'];

            $array = explode('.', $arquivo_recebido['name']);
            $tipo = $array[1];
            $nome_pasta = md5(time().rand(0,99)).'.'.$tipo;
            $arquivo = new Arquivo();
            $arquivo->adicionarArquivoModel($id_topico, $nome_mostrado, $nome_pasta, $tipo, $descricao);
            $caminho = 'assets/arquivos/'.$nome_pasta;
            move_uploaded_file($arquivo_recebido['tmp_name'], $caminho);
            header("Location: ".BASE_URL.'arquivo/index/'.$id_topico);		
		} else {//caso ainda não tenha recebido um registro
			$this->loadTemplate('adicionar_arquivo', $dados);
		}

        }
    }
