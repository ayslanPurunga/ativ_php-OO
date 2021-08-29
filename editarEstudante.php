<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Estudante</title>
</head>
<body>
    <h1>Edição de Estudante</h1>
    <?php
        require './Pessoa.php';
        require './Estudante.php';

        $estudante = new Estudante($_GET['email']);
        $estudanteDados = $estudante->verEstudante();

        if (isset($_POST['editarEstudante'])) {
            $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $estudante = new Estudante($formData['email']);
            $estudanteDados = $estudante->editarEstudante($formData);

            if ($estudanteDados) {
                echo "Estudante editado com sucesso!";
                echo "<a href='index.php'>Voltar</a>";
                exit;
            }else{
                echo "Falha ao editar estudante";
            }

        } 
            ?>
            <form action="" name="EdicaoEstudante" method="POST">
            <input type="hidden" name="id" value="<?=$estudanteDados->ID?>">
            <p>
                <label for="">Nome</label>
                <input type="text" name="nome" required value="<?=$estudanteDados->nome?>">
            </p>
            <p>
                <label for="">Telefone</label>
                <input type="text" name="telefone" value="<?=$estudanteDados->telefone?>">
            </p>
            <p>
                <label for="">Email</label>
                <input type="text" name="email" value="<?=$estudanteDados->email?>">
            </p>
            <p>
                <label for="">Data de Nascimento</label>
                <input type="date" name="data_nascimento" value="<?=$estudanteDados->data_nascimento?>">
            </p>
            <p>
                <label for="">Matrícula</label>
                <input type="text" name="matricula" value="<?=$estudanteDados->matricula?>">
            </p>
            <input type="submit" value="cadastrar" name="editarEstudante">
        </form>
        
</body>
</html>