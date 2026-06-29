<?php
// lista todos os empréstimos cadastrados
require_once __DIR__ . '/../controller/EmprestimoController.php';

$controller = new EmprestimoController();
$emprestimos = $controller->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Empréstimos</title>
</head>
<body>

    <h2>Empréstimos cadastrados</h2>

    <?php if (count($emprestimos) > 0): 
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Leitor</th> 
                    <th>ID Livro</th>
                    <th>Data de Locação</th>
                    <th>Data de Devolução</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($emprestimos as $emprestimo):?>
                    <tr>
                        <td><?= $emprestimo->getId() ?></td>
                        <td><?= $emprestimo->getIdLeitor() ?></td>
                        <td><?= $emprestimo->getIdLivro() ?></td>
                        <td><?= $emprestimo->getDataLocacao() ?></td>
                        <td><?= $emprestimo->getDataDevolucao() ?></td>
                        <td>
                           
                            <a href="edita.php?id=<?= $emprestimo->getId() ?>">Editar</a>

                           
                            <form action="deleta.php" method="POST" style="display:inline"
                                  onsubmit="return confirm('Deseja realmente excluir o empréstimo <?= $emprestimo->getId() ?>?')">
                                <input type="hidden" name="id" value="<?= $emprestimo->getId() ?>">
                                <button type="submit">Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum empréstimo cadastrado.</p> 
    <?php endif; ?>

    <a href="cadastra.php">Cadastrar novo empréstimo</a>

</body>
</html>