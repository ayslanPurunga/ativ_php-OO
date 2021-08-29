<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Professor</title>
</head>

<body>

  <h1>Cadastrar novo Professor</h1>
  <?php
  require './Pessoa.php';
  require './Professor.php';

  //transforma em array
  $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

  if (!empty($formData)) {
    $professor = new Professor($formData['email']);
    $cadastro = $professor->criarProfessor($formData);
    //var_dump($formData);

    if ($cadastro) {
      echo "Professor cadastrado com sucesso.";
    } else {
      echo "Erro ao cadastrar Professor";
    }
  }
  ?>


  <form action="" method="post" name="CadastroProfessor">
    <p>
      <label>Nome</label>
      <input name="nome" type="text" placeholder="Digite o nome" required>
    </p>
    <p>
      <label>Telefone</label>
      <input name="telefone" type="text" placeholder="Digite o telefone">
    </p>
    <p>
      <label>E-mail</label>
      <input name="email" type="text" placeholder="Digite o e-mail">
    </p>
    <p>
      <label>Data de Nascimento</label>
      <input name="data_nascimento" type="text" placeholder="Digite a data de nascimento" require>
    </p>
    <p>
      <label>Especialidade</label>
      <input name="especialidade" type="text" placeholder="Digite a especialidade" require>
    </p>
    <p>
      <label>Salário</label>
      <input name="salario" type="text" placeholder="Digite o valor do salário" require>
    </p>
    <input type="submit" value="Cadastrar" name="cadastrarProfessor">
  </form>
</body>

</html>
