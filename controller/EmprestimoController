<?php

require_once __DIR__ . '/../dao/EmprestimoDao.php'; 


class EmprestimoController
{
    
    public function listar()
    {
        $dao = new EmprestimoDao();
        return $dao->listar();
    }


    public function buscarPorId($id)
    {
        $dao = new EmprestimoDao();
        return $dao->buscarPorId($id);
    }


    public function atualizar()
    {
        $emprestimo = new Emprestimo(
            $_POST['id_leitor'],
            $_POST['id_livro'],
            $_POST['data_locacao'],
            $_POST['data_devolucao'],
            $_POST['id']
        );

        $dao = new EmprestimoDao();
        $dao->atualizar($emprestimo);

        header("Location: lista.php");
    }


    public function deletar()
    {
        $dao = new EmprestimoDao();
        $dao->deletar($_POST['id']);

        header("Location: lista.php");
    }


    public function salvar()
    {

        $emprestimo = new Emprestimo(
            $_POST['id_leitor'],
            $_POST['id_livro'],
            $_POST['data_locacao'],
            $_POST['data_devolucao']
        );

        $dao = new EmprestimoDao(); 
        $dao->salvar($emprestimo);  

        header("Location: lista.php"); 
    }
}