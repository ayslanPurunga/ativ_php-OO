<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de gestão acadêmica</title>
</head>

<body>
    <?php
    require './Pessoa.php';
    require './Estudante.php';
    require './Professor.php';
    require './Disciplina.php';

    $conexao = new Conn();
    ?>

    <h2>Professor</h2>
    <?php
    /*$professor = new Professor('debora@debora.com.br');
    $professorDados = $professor->verProfessor();
    echo "Nome: {$professorDados->nome} <br>";
    echo "Telefone: {$professorDados->telefone} <br>";
    echo "Email: {$professorDados->email} <br>";
    echo "Especialidade: {$professorDados->especialidade} <br>";
    echo "Salario: {$professorDados->salario} <br>";
    echo "Idade: {$professor->calculaIdade($professorDados->data_nascimento)} <br>";
    echo "Avaliação: {$professor->calculaAvaliacao()}";*/


    $professores = $conexao->listaProfessores();
    foreach ($professores as $key => $value) {
        echo $value['nome'] . "<br>";
    }
    ?>

    <br>
    <a href="cadastroProfessor.php"><button type="button">Novo Professor</button></a>

    <br>
    <hr>

    <h2>Estudante</h2>
    <?php

    /*$estudante = new Estudante(3);
    $estudanteDados = $estudante->verEstudante();
    echo "Nome: {$estudanteDados->nome} <br>";
    echo "Telefone: {$estudanteDados->telefone} <br>";
    echo "Email: {$estudanteDados->email} <br>";
    echo "Matrícula: {$estudanteDados->matricula} <br>";
    echo "IRA: {$estudanteDados->ira} <br>";
    echo "Idade: {$estudante->calculaIdade($estudanteDados->data_nascimento)} <br>";
    echo "Avaliação: {$estudante->calculaAvaliacao()} <br>";
    echo "Disciplinas: {$estudante->disciplinasMatriculadas()} <br>";
    echo "Atualizar Ira: {$estudante->atualizaIRA(8)} <br>";*/

    $estudantes = $conexao->listarEstudantes();
    foreach ($estudantes as $key => $value) {
        echo $value['nome'] . " - <a href='editarEstudante.php?email={$value['email']}'>Editar</a><br>";
    }

    ?>
    <br>
    <a href="cadastroEstudante.php"><button type="button">Novo Estudante</button></a>

    <br><hr><br>

    <?php
    $disciplinaMatematica = new Disciplina();
    $disciplinaMatematica->nome = 'Matematica';
    $disciplinaMatematica->setCodigo('MAT');
    $disciplinaMatematica->creditos = '4';
    Disciplina::ministrarDisciplina();
    $matematica = $disciplinaMatematica->verDisciplina();
    echo $matematica.PHP_EOL;
    ?>
    <br>
    <?php
    $disciplinaPortugues = new Disciplina();
    $disciplinaPortugues->nome = 'Portugues';
    $disciplinaPortugues->setCodigo('PORT');
    $disciplinaPortugues->creditos = 4;
    Disciplina::ministrarDisciplina();
    echo $disciplinaPortugues->verDisciplina()."<br>";

    ?>
</body>

</html>