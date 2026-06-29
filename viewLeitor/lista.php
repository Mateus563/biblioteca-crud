<?php
// lista todos os leitores cadastrados
require_once __DIR__ . '/../controller/LeitorController.php';

$controller = new LeitorController();
$leitores      = $controller->listar();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Leitores</title>
</head>
<body>

    <h2>Leitores cadastrados</h2>

    <?php if (count($leitores) > 0): 
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>CEP</th>
                    <th>Telefone</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($leitores as $leitor):?>
                    <tr>
                        <td><?= $leitor->getId() ?></td>
                        <td><?= $leitor->getNome() ?></td>
                        <td><?= $leitor->getCpf() ?></td>
                        <td><?= $leitor->getCep() ?></td>
                        <td><?= $leitor->getTelefone() ?></td>
                        <td><?= $leitor->getEmail() ?></td>
                        <td>

                            <a href="edita.php?id=<?= $leitor->getId() ?>">Editar</a>


                            <form action="deleta.php" method="POST" style="display:inline"
                                  onsubmit="return confirm('Deseja realmente excluir o leitor <?= $leitor->getNome() ?>?')">
                                <input type="hidden" name="id" value="<?= $leitor->getId() ?>">
                                <button type="submit">Deletar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum leitor cadastrado.</p> 
    <?php endif; ?>

    <a href="cadastra.php">Cadastrar novo leitor</a>

</body>
</html>
