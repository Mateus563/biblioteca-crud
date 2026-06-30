<?php
// lista todos os livros cadastrados
require_once __DIR__ . '/../controller/LivroController.php';

$controller = new LivroController();
$livros     = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Livros</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 32px auto; padding: 0 16px; }
        h2 { margin-bottom: 8px; }
        button { padding: 7px 16px; margin-right: 6px; cursor: pointer; border: 1px solid #999; border-radius: 4px; background: #f5f5f5; }
        table { width: 100%; border-collapse: collapse; margin-top: 32px; }
        th, td { padding: 9px 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f5f5f5; }
        a.acao { margin-right: 6px; }
    </style>
</head>
<body>

    <h2>Livros cadastrados</h2>

    <p><a href="cadastra.php">Cadastrar novo livro</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Autor</th>
                <th>Editora</th>
                <th>Data de Publicação</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($livros) > 0): ?>
                <?php foreach ($livros as $livro): ?>
                    <tr>
                        <td><?= $livro->getId() ?></td>
                        <td><?= htmlspecialchars($livro->getTitulo()) ?></td>
                        <td><?= htmlspecialchars($livro->getAutor()) ?></td>
                        <td><?= htmlspecialchars($livro->getEditora()) ?></td>
                        <td><?= htmlspecialchars($livro->getDataPublicacao()) ?></td>
                        <td><?= htmlspecialchars($livro->getQuantidade()) ?></td>
                        <td>
                            <a class="acao" href="edita.php?id=<?= $livro->getId() ?>">Editar</a>
                            <form action="deleta.php" method="POST" style="display:inline"
                                  onsubmit="return confirm('Deseja realmente excluir o livro <?= htmlspecialchars($livro->getTitulo()) ?>?')">
                                <input type="hidden" name="id" value="<?= $livro->getId() ?>">
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7">Nenhum livro cadastrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <p style="margin-top:24px"><a href="../index.php">Voltar ao início</a></p>

</body>
</html>
