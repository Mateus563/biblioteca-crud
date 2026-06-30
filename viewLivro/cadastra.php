<?php
require_once __DIR__ . '/../controller/LivroController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new LivroController();
    $controller->salvar();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livro</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 32px auto; padding: 0 16px; }
        h2 { margin-bottom: 8px; }
        label { display: inline-block; margin: 4px 0 2px; font-size: 0.85rem; }
        input { display: block; padding: 6px 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%; }
        button { padding: 7px 16px; margin-right: 6px; cursor: pointer; border: 1px solid #999; border-radius: 4px; background: #f5f5f5; }
    </style>
</head>
<body>

    <h2>Cadastro de Livro</h2>

    <form action="" method="POST" style="max-width: 400px; margin-top: 16px">

        <label>Título</label>
        <input type="text" name="titulo" required>

        <label>Autor</label>
        <input type="text" name="autor" required>

        <label>Editora</label>
        <input type="text" name="editora" required>

        <label>Data de Publicação</label>
        <input type="date" name="data_publicacao" required>

        <label>Quantidade</label>
        <input type="number" name="quantidade" min="0" required>

        <button type="submit">Cadastrar</button>
    </form>

    <p style="margin-top:24px"><a href="lista.php">Ver livros cadastrados</a></p>

</body>
</html>
