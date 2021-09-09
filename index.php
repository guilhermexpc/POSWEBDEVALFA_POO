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
    
    $estudante = new Estudante(1);
    echo $estudante->disciplinasMatriculadas();
    ?>    
    <br><hr> 

    <h2>Professores</h2>
    <?php
    $professor = new Professor('debora@debora.com.br');
    $professorDados = $professor->verProfessor();
    echo "Nome: {$professorDados->nome} <br>"; 
    echo "Telefone: {$professorDados->telefone} <br>"; 
    echo "Email: {$professorDados->email} <br>"; 
    echo "especialidade: {$professorDados->especialidade} <br>"; 
    echo "salario: {$professorDados->salario} <br>"; 
    echo "email: {$professor->calcularIdade($professorDados->data_nascimento)} <br>"; 
    echo "Avaliação: {$professor->calculaAvaliacao()}";
    echo "<hr>Lista de Professores<br>";
    $conexao = new Conn();
    $professores = $conexao->listarProfessores();
    foreach ($professores as $key => $value) {
        echo $value['nome']."<a href='editarEstudante.php?email={$value['email']}'>Editar <br><a/>";
    }
    ?>
    <h2>Estudante</h2>
    <?php
     $estudante = new Estudante('paulo@paulo.com.br');
     $estudanteDados = $estudante->verEstudante();
     echo "Nome: {$estudanteDados->nome} <br>";

     echo "Telefone: {$estudanteDados->telefone} <br>";
     echo "Email: {$estudanteDados->email} <br>";
     echo "Matricula: {$estudanteDados->matricula} <br>";
     echo "IRA: {$estudanteDados->ira} <br>";
     echo "Idade: {$estudante->calcularIdade($estudanteDados->data_nascimento) } <br>";
     echo "Avaliação: {$estudante->calculaAvaliacao()} <br>";
     

    ?>

       
</body>
</html>