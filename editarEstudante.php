<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Estudante</title>
</head>
<body>
    <h1>Edição Estudante</h1>
    <?php
        require './Pessoa.php';
        require './Estudante.php';

        $estudante = new Estudante($_GET['email']);
        $estudanteDados = $estudante->verEstudante();

        if (isset($_POST['editarEstudante'])) {
            $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $estudante = new Estudante($formData['email']);
            $estudanteDados = $estudante->editarEstudante($formData);
            
            if ($estudanteDados){
                echo "Esdutante OK";
            }
            else {
                echo "Esdutante Ñ OK";
            }
        }else
            $estudanteDados = $estudante->verEstudante();

    ?>
    <form name="EdicaoEstudante" action="" method="POST">
        <input type="hidden" name="id" value="<?=$estudanteDados->ID?>">
        <p> 
            <label>Nome</label>
            <input type="text" name="nome" value="<?=$estudanteDados->nome ?>">
        </p>
        <p>
            <label>Telefone</label>
            <input type="text" name="telefone" value="<?=$estudanteDados->telefone ?>">
        </p>
        <p>
            <label>Email</label>
            <input type="text" name="email" value="<?=$estudanteDados->email ?>">
        </p>
        <p>
            <label>Data Nascimento</label>
            <input type="text" name="data_nascimento" value="<?=$estudanteDados->data_nascimento ?>">
        </p>
        <p>
            <label>Matrícula</label>
            <input type="text" name="matricula" value="<?=$estudanteDados->matricula ?>">
        </p>
        <input type="submit" value="Cadastrar" name="editarEstudante">
    </form>
</body>
</html>