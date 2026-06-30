<?php
// lista todos os leitores cadastrados
require_once __DIR__ . '/../controller/LeitorController.php';

$controller = new LeitorController();
$leitores   = $controller->listar();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Leitores</title>
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

    <h2>Leitores cadastrados</h2>

    <p><a href="cadastra.php">Cadastrar novo leitor</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($leitores) > 0): ?>
                <?php foreach ($leitores as $leitor): ?>
                    <tr>
                        <td><?= $leitor->getId() ?></td>
                        <td><?= htmlspecialchars($leitor->getNome()) ?></td>
                        <td><?= htmlspecialchars($leitor->getCpf()) ?></td>
                        <td><?= htmlspecialchars($leitor->getTelefone()) ?></td>
                        <td><?= htmlspecialchars($leitor->getEmail()) ?></td>
                        <td>
                            <a class="acao" href="edita.php?id=<?= $leitor->getId() ?>">Editar</a>
                            <form action="deleta.php" method="POST" style="display:inline"
                                  onsubmit="return confirm('Deseja realmente excluir o leitor <?= htmlspecialchars($leitor->getNome()) ?>?')">
                                <input type="hidden" name="id" value="<?= $leitor->getId() ?>">
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">Nenhum leitor cadastrado.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <p style="margin-top:24px"><a href="../index.php">Voltar ao início</a></p>

</body>
</html>
