<?php
require_once __DIR__ . '/../controller/LivroController.php';

$controller = new LivroController();

// Se veio POST, atualiza e redireciona
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->atualizar();
    exit;
}

// GET: busca o livro pelo id passado na URL
$id   = $_GET['id'] ?? null;
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
</head>
<body>

    <h2>Editar Livro</h2>

    <form action="" method="POST">

    
        <input type="hidden" name="id" value="<?= htmlspecialchars($livro->getId()) ?>">

        <label>Título</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($livro->getTitulo()) ?>" required>
        <br>

        <label>Autor</label>
        <input type="text" name="autor" value="<?= htmlspecialchars($livro->getAutor()) ?>" required>
        <br>

        <label>Editora</label>
        <input type="text" name="editora" value="<?= htmlspecialchars($livro->getEditora()) ?>" required>
        <br>

        <label>Data de Publicação</label>
        <input type="text" name="data_publicacao" value="<?= htmlspecialchars($livro->getDataPublicacao()) ?>" required>
        <br>

        <label>Quantidade</label>
        <input type="text" name="quantidade" value="<?= htmlspecialchars($livro->getQuantidade()) ?>" required>
        <br>

        <button type="submit">Salvar alterações</button>
    </form>

    <a href="lista.php">Cancelar</a>

</body>
</html>