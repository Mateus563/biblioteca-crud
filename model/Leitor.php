<?php


class Leitor
{
    private $id;       
    private $nome;       
    private $cpf;   
    private $telefone;
    private $email; 


    public function __construct($nome, $cpf, $telefone, $email, $id = null)
    {
        $this->nome         = $nome;         
        $this->cpf          = $cpf;                     
        $this->telefone     = $telefone;     
        $this->email        = $email;        
        $this->id           = $id;           
    }

  
    public function getId()           { return $this->id; }
    public function getNome()         { return $this->nome; }
    public function getCpf()          { return $this->cpf; }
    public function getTelefone()     { return $this->telefone; }
    public function getEmail()        { return $this->email; }
}
