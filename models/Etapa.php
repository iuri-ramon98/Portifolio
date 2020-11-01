<?php
class Etapa extends Model{



    public function pegarTodos(){//função q retorna todos os registros da tabela etapas
        $array = array();//cria um array vazio

		$sql = "SELECT * FROM etapas ORDER BY id";//query de consulta
		$sql = $this->db->query($sql);//executando a query

		if($sql->rowCount() > 0) {//se hover registros
			$array = $sql->fetchAll();//pegue todos e insira no array de retorno
		}

		return $array;
    }

    public function pegarPeloId($id){

        $array = array();

        $sql = "SELECT * FROM etapas WHERE id = :id";
        $preparacao = $this->db->prepare($sql);
        $preparacao->bindValue(':id', $id);
        $preparacao->execute();

        if($preparacao->rowCount() > 0){
            $array = $preparacao->fetch();
        }

        return $array;

        
    }

    public function adicionarEtapaModel($nome, $descricao){//função qu adiciona uma nova etapa
       
       $sql = "INSERT INTO etapas(nome, descricao) VALUES (:nome,:descricao)";
       $preparacao = $this->db->prepare($sql);
       $preparacao->bindValue(':nome', $nome);
       $preparacao->bindValue(':descricao', $descricao);
       $preparacao->execute();
       
        
    }


    public function editarEtapaModel($nome, $id, $descricao){

        $sql = "UPDATE etapas SET nome = :nome, descricao = :descricao WHERE id = :id";
        $preparacao = $this->db->prepare($sql);
        $preparacao->bindValue(':nome', $nome);
        $preparacao->bindValue(':descricao', $descricao);
        $preparacao->bindValue(':id', $id);
        $preparacao->execute();

    }




}