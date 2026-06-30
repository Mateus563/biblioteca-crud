<?php
require_once __DIR__ . '/../controller/LivroController.php';

$controller = new LivroController();

// Se veio POST, atualiza e redireciona
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->atualizar();
    exit;
}

// GET: busca o livro pelo id passado na URL
$id    = $_GET['id'] ?? null;
$livro = $id ? $controller->buscarPorId($id) : null;

if (!$livro) {
    header("Location: lista.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 32px auto; padding: 0 16px; }
        h2 { margin-bottom: 8px; }
        label { display: inline-block; margin: 4px 0 2px; font-size: 0.85rem; }
        input { display: block; padding: 6px 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%; }
        button { padding: 7px 16px; margin-right: 6px; cursor: pointer; border: 1px solid #999; border-radius: 4px; background: #f5f5f5; }
        a { margin-left: 6px; }
    </style>
</head>
<body>

    <h2>Editar Livro</h2>

    <form action="" method="POST" style="max-width: 400px; margin-top: 16px">

        <input type="hidden" name="id" value="<?= htmlspecialchars($livro->getId()) ?>">

        <label>Título</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($livro->getTitulo()) ?>" required>

        <label>Autor</label>
        <input type="text" name="autor" value="<?= htmlspecialchars($livro->getAutor()) ?>" required>

        <label>Editora</label>
        <input type="text" name="editora" value="<?= htmlspecialchars($livro->getEditora()) ?>" required>

        <label>Data de Publicação</label>
        <input type="date" name="data_publicacao" value="<?= htmlspecialchars($livro->getDataPublicacao()) ?>" required>

        <label>Quantidade</label>
        <input type="number" name="quantidade" min="0" value="<?= htmlspecialchars($livro->getQuantidade()) ?>" required>

        <button type="submit">Salvar alterações</button>
        <a href="lista.php">Cancelar</a>
    </form>

</body>
</html>
