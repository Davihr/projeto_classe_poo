<?php
// Importando as classes
require_once "Usuario.php";
require_once "Professor.php";
//require_once "Aluno.php";
// Criando objetos

$nome = $_POST['nome']??'';
$email = $_POST['email']??'';
$disciplina = $_POST['disciplina']??'';

$professor1 = new Professor($nome, $email, $disciplina);

// Exibindo informações dos professores
echo "<h2>Professores</h2>";
echo $professor1->exibirInfo() . "<br>";
echo $professor1->darAula() . "<br><br>";
//Caimnho do arquivo JSON
$banco = 'banco.json';

//Ler dados existentes
$dados = [];
if (file_exists($banco)){
    $json = file_get_contents($banco);
    $dados = json_decode($json, true);
}

$usuario = new Professor($nome, $email, $disciplina);
$dados['professores'] = [
    'nome' => $usuario -> getNome(),
    'email' => $usuario -> getEmail(),
    'disciplina' => $usuario -> getDisciplina()
];

file_put_contents($banco, json_encode($dados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

echo"<h2>Cadastro realizado com sucesso!</h2>";
echo"<a href='index.php'>Voltar</a><br>";
echo"<a href='index.php'>Voltar para o início</a>";
?>