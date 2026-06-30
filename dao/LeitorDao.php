<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../model/Leitor.php';

class LeitorDao
{
    private $tabela     = 'leitor';
    private $connection;

    public function __construct()
    {
        $db                = new Database();
        $this->connection  = $db->connection;
    }

    public function salvar(Leitor $leitor)
    {
        $sql  = "INSERT INTO $this->tabela (nome, cpf, telefone, email) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $leitor->getNome(),
            $leitor->getCpf(),
            $leitor->getTelefone(),
            $leitor->getEmail()
        ]);
    }

    public function buscarporId($id)
    {
        $sql  = "SELECT * FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return new Leitor(
            $row['nome'],
            $row['cpf'],
            $row['telefone'],
            $row['email'],
            $row['id']
        );
    }

    public function atualizar(Leitor $leitor)
    {
        $sql  = "UPDATE $this->tabela SET nome = ?, cpf = ?, telefone = ?, email = ? WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            $leitor->getNome(),
            $leitor->getCpf(),
            $leitor->getTelefone(),
            $leitor->getEmail(),
            $leitor->getId()
        ]);
    }

    public function deletar($id)
    {
        $sql  = "DELETE FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
    }

    public function listar()
    {
        $sql  = "SELECT * FROM $this->tabela";
        $stmt = $this->connection->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $leitores = [];

        foreach ($rows as $row) {
            $leitores[] = new Leitor(
                $row['nome'],
                $row['cpf'],
                $row['telefone'],
                $row['email'],
                $row['id']
            );
        }

        return $leitores;
    }
}
