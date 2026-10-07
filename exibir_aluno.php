<?php
// Importando as classes
require_once "Usuario.php";
//require_once "Professor.php";
require_once "Aluno.php";
// Criando objetos
$nome = $_POST['nome']??'';
$email = $_POST['email']??'';
$matricula = $_POST['matricula']??'';

$aluno1 = new Aluno($nome, $email, $matricula);
//$aluno2 = new Aluno("Ana Pereira", "ana@aluno.com", "2025A002");

// Exibindo informações dos alunos
echo "<h2>Alunos</h2>";
echo $aluno1->exibirInfo() . "<br>";
echo $aluno1->estudar() . "<br><br>";

//echo $aluno2->exibirInfo() . "<br>";
//echo $aluno2->estudar() . "<br><br>";
?>