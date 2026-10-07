<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cadastro de Aluno</h1>
<form action="exibir_aluno.php" method="POST">

    <label>Nome:</label>
    <input type="text"  name="nome" ><br><br>

    <label>Email:</label>
    <input type="email"  name="email" ><br><br>

    <label>Matrícula:</label>
    <input type="text"  name="matricula" ><br><br>

    <input type="submit" value="Enviar">
</form>

 <h1>Cadastro de Profesores</h1>
<form action="exibir_professor.php" method="POST">

    <label>Nome:</label>
    <input type="text"  name="nome" ><br><br>

    <label>Email:</label>
    <input type="email"  name="email" ><br><br>

    <label>Disciplina:</label>
    <input type="text"  name="disciplina" ><br><br>

    <input type="submit" value="Enviar">
</form>

<h2>Professores Cadastrados</h2>
<?php
$banco = 'banco.json';
$professores = [];

if (file_exists($banco)) {
    $json = file_get_contents($banco);
    $dados = json_decode($json, true);

    if (isset($dados['professores']) && is_array($dados['professores'])) {
        $professores = $dados['professores'];
    }
}
?>

<?php if (count($professores) > 0): ?>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Disciplina</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($professores as $professor): ?>
                <tr>
                    <td><?= htmlspecialchars($professor['nome'] ?? '') ?></td>
                    <td><?= htmlspecialchars($professor['email'] ?? '') ?></td>
                    <td><?= htmlspecialchars($professor['disciplina'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Nenhum professor cadastrado.</p>
<?php endif; ?>
</body>
</html>