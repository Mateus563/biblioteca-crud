<?php

require_once __DIR__ . '/../Database.php';
require_once __DIR__ . '/../Leitor.php';
require_once __DIR__ . '/../Emprestimo.php';

class EmprestimoDao
{
    private $tabela     = 'Emprestimo';
    private $connection;

    public function __construct()
    {
        $db                = new Database(); 
        $this->connection  = $db->connection;
    }

    public function salvar(Emprestimo $emprestimo)
    {
        $sql  = "INSERT INTO $this->tabela (id_leitor, id_livro, data_locacao, data_devolucao) VALUES (?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql); 
    

        $stmt->execute([$emprestimo->getIdLeitor(), $emprestimo->getIdLivro(), $emprestimo->getDataLocacao(), $emprestimo->getDataDevolucao()]);
    }

    public function buscarporId($id)
    {
        $sql  = "SELECT * FROM $this->tabela WHERE id = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([$id]);
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        return new Emprestimo(
            $row['id_leitor'],
            $row['id_livro'],
            $row['data_locacao'],
            $row['data_devolucao'],
            $row['id']
        );
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

        $emprestimos = [];

        foreach ($rows as $row) {
            $emprestimos[] = new Emprestimo(
                $row['id_leitor'],
                $row['id_livro'],
                $row['data_locacao'],
                $row['data_devolucao'],
                $row['id']
            );
        }
        
        return $emprestimos;
    }
}