<?php

require_once __DIR__ . '/../dao/LeitorDao.php'; 


class LeitorController
{
    
    public function listar()
    {
        $dao = new LeitorDao();
        return $dao->listar();
    }


    public function buscarPorId($id)
    {
        $dao = new LeitorDao();
        return $dao->buscarPorId($id);
    }


    public function atualizar()
    {
        $leitor = new Leitor(
            $_POST['nome'],
            $_POST['cpf'],
            $_POST['telefone'],
            $_POST['email'],
            $_POST['id']
        );

        $dao = new LeitorDao();
        $dao->atualizar($leitor);

        header("Location: lista.php");
    }


    public function deletar()
    {
        $dao = new LeitorDao();
        $dao->deletar($_POST['id']);

        header("Location: lista.php");
    }


    public function salvar()
    {

        $leitor = new Leitor(
            $_POST['nome'],
            $_POST['cpf'],
            $_POST['telefone'],
            $_POST['email']
        );

        $dao = new LeitorDao(); 
        $dao->salvar($leitor);  

        header("Location: lista.php"); 
    }
}