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

    public function editarArquivo($id){
        $dados = array();
        $arquivo = new Arquivo();
        $dados['info'] = $arquivo->pegarPeloId($id);
        if(!empty($_POST['nome_mostrado'])){
            $id_topico = $dados['info']['id_topico'];
            $nome_mostrado = $_POST['nome_mostrado'];
            $descricao = $_POST['descricao'];

				$arquivo->editarArquivoModel( $id, $nome_mostrado, $descricao);//chama o metodo que salva a edicao feita
			} else {
				//$dados['info'] = $topico->pegarPeloId($id);//receber os dados do registro para carregar a tela

				if(isset($dados['info']['id'])) {
					$this->loadTemplate('editar_arquivo', $dados);//carregar o formulário, preenchido.
					exit;
			}
        }
        header("Location: ".BASE_URL.'arquivo/index/'.$id_topico);
    }

    public function excluirArquivo($id) {
        if (!empty($id)) {
            $arquivo = new Arquivo();
            $dados = $arquivo-> pegarPeloId($id);
            $nome_pasta = $dados['nome_pasta'];
            $caminho = 'assets/arquivos/'.$nome_pasta;
            unlink($caminho);
            $arquivo->delete($id);
            
            
		}

		header('Location: ' . $_SERVER['HTTP_REFERER']);//mudar para redirect back
	}
    
        public function download($nome_pasta){
            // Define o tempo máximo de execução em 0 para as conexões lentas
            set_time_limit(0);
            // Arqui você faz as validações e/ou pega os dados do banco de dados
            $aquivoNome = $nome_pasta; // nome do arquivo que será enviado p/ download
            $arquivoLocal = 'assets/arquivos/'.$aquivoNome; // caminho absoluto do arquivo
            // Verifica se o arquivo não existe
            if (!file_exists($arquivoLocal)) {
            // Exiba uma mensagem de erro caso ele não exista
            exit;
            }
            // Aqui você pode aumentar o contador de downloads
            // Definimos o novo nome do arquivo
            //$novoNome = 'imagem_nova.jpg';
            // Configuramos os headers que serão enviados para o browser
            header('Content-Description: File Transfer');
            //header('Content-Disposition: attachment; filename="'.$novoNome.'"');
            header('Content-Type: application/octet-stream');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($aquivoNome));
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
            header('Expires: 0');
            // Envia o arquivo para o cliente
            readfile($aquivoNome);
            exit;
    
        }
    }



