<?php
require_once __DIR__ . '/../controller/LeitorController.php';

$controller = new LeitorController();

// Se veio POST, atualiza e redireciona
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->atualizar();
    exit;
}

// GET: busca o leitor pelo id passado na URL
$id     = $_GET['id'] ?? null;
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

    <h2>Editar Leitor</h2>

    <form action="" method="POST" style="max-width: 400px; margin-top: 16px">

        <input type="hidden" name="id" value="<?= htmlspecialchars($leitor->getId()) ?>">

        <label>Nome</label>
        <input type="text" name="nome" value="<?= htmlspecialchars($leitor->getNome()) ?>" required>

        <label>CPF</label>
        <input type="text" name="cpf" value="<?= htmlspecialchars($leitor->getCpf()) ?>" required>

        <label>Telefone</label>
        <input type="text" name="telefone" value="<?= htmlspecialchars($leitor->getTelefone()) ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars($leitor->getEmail()) ?>" required>

        <label>CEP</label>
        <input type="text" id="cep" placeholder="00000-000" onblur="buscarCep()">
        <button type="button" onclick="buscarCep()">Buscar CEP</button>

        <label>Endereço</label>
        <input type="text" id="logradouro" readonly>

        <label>Bairro</label>
        <input type="text" id="bairro" readonly>

        <label>Cidade</label>
        <input type="text" id="cidade" readonly>

        <button type="submit">Salvar alterações</button>
        <a href="lista.php">Cancelar</a>
    </form>

    <script>
    async function buscarCep() {
        const cep = document.getElementById('cep').value.replace(/\D/g, '');
        if (cep.length !== 8) return;

        const resposta = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
        const dados = await resposta.json();

        if (dados.erro) {
            alert('CEP não encontrado.');
            return;
        }

        document.getElementById('logradouro').value = dados.logradouro || '';
        document.getElementById('bairro').value = dados.bairro || '';
        document.getElementById('cidade').value = `${dados.localidade} — ${dados.uf}`;
    }
    </script>

</body>
</html>
