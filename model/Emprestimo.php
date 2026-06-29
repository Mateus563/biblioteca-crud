<?php


class Leitor
{
    private $id;       
    private $id_leitor;       
    private $id_livro;   
    private $data_locacao;
    private $data_devolucao;



    public function __construct($id_leitor, $id_livro, $data_locacao, $data_devolucao, $id = null)
    {
        $this->id_leitor             = $id_leitor;         
        $this->id_livro              = $id_livro;                     
        $this->data_locacao          = $data_locacao;     
        $this->data_devolucao        = $data_devolucao;        
        $this->id                    = $id;           
    }

  
    public function getId()           { return $this->id; }
    public function getIdLeitor()     { return $this->id_leitor; }
    public function getIdLivro()      { return $this->id_livro; }
    public function getDataLocacao()  { return $this->data_locacao; }
    public function getDataDevolucao() { return $this->data_devolucao; }

}