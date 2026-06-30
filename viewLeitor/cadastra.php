<?php
require_once __DIR__ . '/../controller/LeitorController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new LeitorController();
    $controller->salvar();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Leitor</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 32px auto; padding: 0 16px; }
        h2 { margin-bottom: 8px; }
        label { display: inline-block; margin: 4px 0 2px; font-size: 0.85rem; }
        input { display: block; padding: 6px 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; width: 100%; }
        button { padding: 7px 16px; margin-right: 6px; cursor: pointer; border: 1px solid #999; border-radius: 4px; background: #f5f5f5; }
    </style>
</head>
<body>

    <h2>Cadastro de Leitor</h2>

    <form action="" method="POST" style="max-width: 400px; margin-top: 16px">

        <label>Nome</label>
        <input type="text" name="nome" required>

        <label>CPF</label>
        <input type="text" name="cpf" required>

        <label>Telefone</label>
        <input type="text" name="telefone" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>CEP</label>
        <input type="text" id="cep" placeholder="00000-000" onblur="buscarCep()">
        <button type="button" onclick="buscarCep()">Buscar CEP</button>

        <label>Endereço</label>
        <input type="text" id="logradouro" readonly>

        <label>Bairro</label>
        <input type="text" id="bairro" readonly>

        <label>Cidade</label>
        <input type="text" id="cidade" readonly>

        <button type="submit">Cadastrar</button>
    </form>

    <p style="margin-top:24px"><a href="lista.php">Ver leitores cadastrados</a></p>

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
