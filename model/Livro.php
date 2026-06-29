<?php


class Livro
{
    private $id;       
    private $titulo;       
    private $autor;   
    private $editora;      
    private $data_publicacao;
    private $quantidade;



    public function __construct($titulo, $autor, $editora, $data_publicacao, $quantidade, $id = null)
    {
        $this->titulo             = $titulo;         
        $this->autor              = $autor;         
        $this->editora            = $editora;       
        $this->data_publicacao    = $data_publicacao; 
        $this->quantidade         = $quantidade;    
        $this->id                 = $id;           
    }


    public function getId()           { return $this->id; }
    public function getTitulo()         { return $this->titulo; }
    public function getAutor()        { return $this->autor; }
    public function getEditora()      { return $this->editora; }
    public function getDataPublicacao() { return $this->data_publicacao; }
    public function getQuantidade()   { return $this->quantidade; }

}