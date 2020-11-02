<?php

class Arquivo extends model{
    public function pegarTodosArquivosId($id){
        $array = array();
        
        $sql = "SELECT * FROM arquivos WHERE id_topico = :id ORDER BY id";
        $preparacao = $this->db->prepare($sql);
        $preparacao->bindValue(':id', $id);
        $preparacao->execute();

        if($preparacao->rowCount() > 0){
            $array = $preparacao->fetchAll();
        }
        return $array;
    }

    public function pegarPeloId($id){
        $array = array();
        $sql = "SELECT * FROM arquivos WHERE id = :id";
        $preparacao = $this->db->prepare($sql);
        $preparacao->bindValue(':id', $id);
        $preparacao->execute();
    
        if($preparacao->rowCount() > 0){
            $array = $preparacao->fetch();
        }
        return $array;
    }

    public function adicionarArquivoModel($id_topico, $nome_mostrado, $nome_pasta, $tipo, $descricao){
        $sql = "INSERT INTO arquivos(id_topico, nome_mostrado, nome_pasta, tipo, descricao) 
                             VALUES (:id_topico,:nome_mostrado, :nome_pasta, :tipo,:descricao)";
        $preparacao = $this->db->prepare($sql);
        $preparacao->bindValue(':id_topico', $id_topico);
        $preparacao->bindValue(':nome_mostrado', $nome_mostrado);
        $preparacao->bindValue(':nome_pasta', $nome_pasta);
        $preparacao->bindValue(':tipo', $tipo);
        $preparacao->bindValue(':descricao', $descricao);
        $preparacao->execute();
    }

    public function editarArquivoModel( $id, $nome_mostrado, $descricao){
        $sql = "UPDATE arquivos SET nome_mostrado = :nome_mostrado, descricao = :descricao WHERE id = :id";
        $preparacao = $this->db->prepare($sql);
        $preparacao->bindValue(':id', $id);
        $preparacao->bindValue(':nome_mostrado', $nome_mostrado);
        $preparacao->bindValue(':descricao', $descricao);
        $preparacao->execute();
    }

    public function delete($id) {
		$sql = "DELETE FROM arquivos WHERE id = :id";
		$sql = $this->db->prepare($sql);
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

}

