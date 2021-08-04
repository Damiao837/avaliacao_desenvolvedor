<?php

class mClientes extends Connectar {

    public function inserir($comprador, $descricao, $preco, $quantidade, $endereco, $fornecedor)
    {
        $sql = "INSERT INTO clientes (comprador,descricao,preco,quantidade,endereco,fornecedor) VALUES (:comprador,:descricao,:preco,:quantidade,:endereco,:fornecedor)";
        $con = $this->Connect();
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":comprador", addslashes($comprador), PDO::PARAM_STR);
        $stmt->bindValue(":descricao", addslashes($descricao), PDO::PARAM_STR);
        $stmt->bindValue(":preco", $preco, PDO::PARAM_INT);
        $stmt->bindValue(":quantidade", $quantidade, PDO::PARAM_INT);
        $stmt->bindValue(":endereco", addslashes($endereco), PDO::PARAM_STR);
        $stmt->bindValue(":fornecedor", addslashes($fornecedor), PDO::PARAM_STR);

        try {
            return $stmt->execute();
        } catch (Exception $ex) {
            return false;
        }
    }

    public function listar()
    {
        $sql = "SELECT * FROM Clientes";
        $con = $this->Connect();
        $stmt = $con->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
