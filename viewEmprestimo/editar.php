<?php
require_once __DIR__ . '/../controller/EmprestimoController.php';

$controller = new EmprestimoController();

// Se veio POST, atualiza e redireciona
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->atualizar();
    exit;
}

// GET: busca o empréstimo pelo id passado na URL
$id   = $_GET['id'] ?? null;
$emprestimo = $id ? $controller->buscarPorId($id) : null;

if (!$emprestimo) {
    header("Location: lista.php");  isbn
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Empréstimo</title>
</head>
<body>

    <h2>Editar Empréstimo</h2>

    <form action="" method="POST">

    
        <input type="hidden" name="id" value="<?= htmlspecialchars($emprestimo->getId()) ?>">

        <label>ID Leitor</label>
        <input type="text" name="id_leitor" value="<?= htmlspecialchars($emprestimo->getIdLeitor()) ?>" required>
        <br>

        <label>ID Livro</label>
        <input type="text" name="id_livro" value="<?= htmlspecialchars($emprestimo->getIdLivro()) ?>" required>
        <br>

        <label>Data de Locação</label>
        <input type="text" name="data_locacao" value="<?= htmlspecialchars($emprestimo->getDataLocacao()) ?>" required>
        <br>

        <label>Data de Devolução</label>
        <input type="text" name="data_devolucao" value="<?= htmlspecialchars($emprestimo->getDataDevolucao()) ?>" required>
        <br>


        <button type="submit">Salvar alterações</button>
    </form>

    <a href="lista.php">Cancelar</a>

</body>
</html>