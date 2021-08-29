<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Estudante</title>
</head>
<body>
    <h1>Cadastro de Estudante</h1>
    <?php
        require './Pessoa.php';
        require './Estudante.php';

        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($formData)) {
            $estudante = new Estudante($formData['email']);
            $cadastro = $estudante->criarEstudante($formData);

            if ($cadastro) {
                echo "Estudante cadastrado com sucesso!";
            }else{
                echo "Problema ao cadastrar estudante";
            }
        }
    ?>

    <form action="" name="CadastroEstudante" method="POST">
        <p>
            <label for="">Nome</label>
            <input type="text" name="nome" required>
        </p>
        <p>
            <label for="">Telefone</label>
            <input type="text" name="telefone">
        </p>
        <p>
            <label for="">Email</label>
            <input type="text" name="email">
        </p>
        <p>
            <label for="">Data de Nascimento</label>
            <input type="date" name="data_nascimento">
        </p>
        <p>
            <label for="">Matrícula</label>
            <input type="text" name="matricula">
        </p>
        <input type="submit" value="cadastrar" name="cadastrarEstudante">
    </form>
</body>
</html>