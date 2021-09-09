<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Estudante</title>
</head>
<body>
    <h1>Cadastro Estudante</h1>
    <?php
        require './Pessoa.php';
        require './Estudante.php';

        $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if (!empty($formData)) {
            $estudante = new Estudante($formData['email']);
            $cadastro = $estudante->criarEstudante($formData);
            if ($cadastro) {
                echo "Cadastrado";
            }else{
                echo "Problema ao cadastrar";
            }
        }
    ?>
    <form name="CadastroEstudante" action="" method="POST">
        <p>
            <label>Nome</label>
            <input type="text" name="nome" required>
        </p>
        <p>
            <label>Telefone</label>
            <input type="text" name="telefone" require>
        </p>
        <p>
            <label>Email</label>
            <input type="text" name="email" require>
        </p>
        <p>
            <label>Data Nascimento</label>
            <input type="text" name="data_nascimento" require>
        </p>
        <p>
            <label>Matrícula</label>
            <input type="text" name="matricula" require>
        </p>
        <input type="submit" value="Cadastrar" name="cadastrarEstudante">
    </form>
</body>
</html>