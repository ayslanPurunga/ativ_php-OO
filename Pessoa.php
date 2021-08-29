<?php

require './Conn.php';

abstract class Pessoa
{
    public int $id;
    public string $nome;
    public string $telefone;
    protected string $email;
    public string $dataNascimento;
    
    public function __construct($email)
    {
        $this->email = $email;
    }
    
    public function verDados():object
    {
        $conn = new Conn();
        $conectar = $conn->connect();
        
        $sql = "SELECT nome, telefone, email
                FROM php_oo.pessoa
                WHERE email = :email";

        $result = $conectar->prepare($sql);
        $result->execute(array(':email' => $this->email));
        
        return $result->fetchObject();
        
    }
    
    public function calculaIdade($dataNascimento):int
    {
        $date = new DateTime($dataNascimento);
        $interval = $date->diff(New DateTime(date('Y-m-d')));
        return $interval->format('%Y');
    }
    
    abstract function calculaAvaliacao();
}