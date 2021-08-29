<?php 

class Conn
{
    public $username = 'root';
    public $password = '';
    public $dsn = "mysql:dbname=php_oo;host=localhost";
    public $port = 3306;
    public $connect = null;

    public function connect()
    {
        try {
            $this->connect = new PDO($this->dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND 
            => "SET NAMES 'utf8'"));
            
            return $this->connect;

        } catch (Throwable $e) {
            throw $e;
        }
    }

    public function listaProfessores():array
    {
        $sql = "SELECT nome, telefone, email, especialidade, salario, data_nascimento FROM professor as o LEFT JOIN pessoa as p 
                ON (o.pessoa_id = p.ID)";
        $conectar = $this->connect();
        $result = $conectar->prepare($sql);                
        $result->execute();
        return $result->fetchAll();
    }

    public function listarEstudantes(): array
  {
    $sql = "SELECT nome, telefone, email, matricula, ira, data_nascimento
    FROM estudante as o
    LEFT JOIN pessoa as p ON (es.pessoa_id = pe.id)";
    $conectar = $this->connect();
    $result = $conectar->prepare($sql);
    $result->execute();
    return $result->fetchAll();
  }
}