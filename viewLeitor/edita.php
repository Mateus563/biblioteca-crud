<?php
require_once __DIR__ . '/../controller/LeitorController.php';

$controller = new LeitorController();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->atualizar();
    exit;
}

// GET: busca o leitor pelo id passado na URL
$id   = $_GET['id'] ?? null;
$leitor = $id ? $controller->buscarPorId($id) : null;

if (!$leitor) {
    header("Location: lista.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Leitor</title>
</head>
<body>

    <h2>Editar Leitor</h2>

    <form action="" method="POST">

        <!-- id oculto necessário para o UPDATE saber qual registro alterar -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($leitor->getId()) ?>">

        <label>Nome</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($leitor->getNome()) ?>" required>
        <br>

        <label>CPF</label>
        <input type="text" name="cpf" value="<?= htmlspecialchars($leitor->getCpf()) ?>" required>
        <br>

        <label>CEP</label>
        <input type="text" name="cep" value="<?= htmlspecialchars($leitor->getCep()) ?>" required>
        <br>

        <label>Telefone</label>
        <input type="text" name="telefone" value="<?= htmlspecialchars($leitor->getTelefone()) ?>" required>
        <br>

        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($leitor->getEmail()) ?>" required>
        <br>

        <button type="submit">Salvar alterações</button>
    </form>

    <a href="lista.php">Cancelar</a>

</body>
</html>
