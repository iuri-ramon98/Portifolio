<?php
class Topico extends model{
    public function pegarTodosTopicosId($id){
       $array = array();

        $sql = "SELECT * FROM topicos WHERE id_etapa = :id";
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

        $sql = "SELECT * FROM topicos WHERE id = :id";
        $preparacao = $this->db->prepare($sql);
        $preparacao->bindValue(':id', $id);
        $preparacao->execute();

        if($preparacao->rowCount() > 0){
            $array = $preparacao->fetch();
        }

        return $array;

        
    }

    public function adicionarTopicoModel($id_etapa, $nome, $descricao){
        $sql = "INSERT INTO topicos(id_etapa, nome, descricao) VALUES (:id_etapa,:nome,:descricao)";
        $preparacao = $this->db->prepare($sql);
        $preparacao->bindValue(':id_etapa', $id_etapa);
        $preparacao->bindValue(':nome', $nome);
        $preparacao->bindValue(':descricao', $descricao);
        $preparacao->execute();
    }

    public function editarTopicoModel( $id, $id_etapa, $nome, $descricao){
        $sql = "UPDATE topicos SET id_etapa = :id_etapa, nome = :nome, descricao = :descricao WHERE id = :id";
        $preparacao = $this->db->prepare($sql);
        $preparacao->bindValue(':id_etapa', $id_etapa);
        $preparacao->bindValue(':nome', $nome);
        $preparacao->bindValue(':descricao', $descricao);
        $preparacao->bindValue(':id', $id);
        $preparacao->execute();
    }
}