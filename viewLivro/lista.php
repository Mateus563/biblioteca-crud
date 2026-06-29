<?php
// lista todos os livros cadastrados
require_once __DIR__ . '/../controller/LivroController.php';

$controller = new LivroController();
$livros      = $controller->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Livros</title>
</head>
<body>

    <h2>Livros cadastrados</h2>

    <?php if (count($livros) > 0): 
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>ISBN</th>
                    <th>Ano de Publicação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($livros as $livro):?>
                    <tr>
                        <td><?= $livro->getId() ?></td>
                        <td><?= $livro->getTitulo() ?></td>
                        <td><?= $livro->getAutor() ?></td>
                        <td><?= $livro->getIsbn() ?></td>
                        <td><?= $livro->getAnoPublicacao() ?></td>
                        <td>
                           
                            <a href="edita.php?id=<?= $livro->getId() ?>">Editar</a>

                           
                            <form action="deleta.php" method="POST" style="display:inline"
                                  onsubmit="return confirm('Deseja realmente excluir o livro <?= $livro->getTitulo() ?>?')">
                                <input type="hidden" name="id" value="<?= $livro->getId() ?>">
                                <button type="submit">Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum livro cadastrado.</p> 
    <?php endif; ?>

    <a href="cadastra.php">Cadastrar novo livro</a>

</body>
</html>
