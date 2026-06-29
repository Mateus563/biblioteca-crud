<?php

require_once __DIR__ . '/../dao/LivroDao.php'; 


class LivroController
{
    
    public function listar()
    {
        $dao = new LivroDao();
        return $dao->listar();  
    }


    public function buscarPorId($id)
    {
        $dao = new LivroDao();
        return $dao->buscarPorId($id);
    }


    public function atualizar()
    {
        $livro = new Livro(
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['editora'],
            $_POST['data_publicacao'],
            $_POST['quantidade'],
            $_POST['id']
        );

        $dao = new LivroDao();
        $dao->atualizar($livro);

        header("Location: lista.php");
    }


    public function deletar()
    {
        $dao = new LivroDao();
        $dao->deletar($_POST['id']);

        header("Location: lista.php");
    }


    public function salvar()
    {

        $livro = new Livro(
            $_POST['titulo'],
            $_POST['autor'],
            $_POST['editora'],
            $_POST['data_publicacao'],
            $_POST['quantidade']
        );

        $dao = new LivroDao();
        $dao->salvar($livro);

        header("Location: lista.php"); 
    }
}