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
</head>
<body>

    <h2>Cadastro de Leitor</h2>

    
    <form action="" method="POST">

        <label>Nome</label>
        <input type="text" name="nome" required> 
        <br>

        <label>CPF</label>
        <input type="text" name="cpf" required> 
        <br>
       
        <label>CEP do Leitor</label>
        <input type="text" id="cep" placeholder="00000-000">
        <button type="button" onclick="buscarCep()">Buscar CEP</button>
        <br>

        <label>Cidade</label>
        <input type="text" id="cidade" readonly>
        <br>

        <label>Cor principal</label>
        <input type="text" name="corprincipal" required> 
        <br>

        <button type="submit">Cadastrar</button> 
    </form>

    <a href="lista.php">Ver leitores cadastrados</a>

    <script>
    async function buscarCep() {
        const cep = document.getElementById('cep').value.replace(/\D/g, '');

        if (cep.length !== 8) return;

        const url = `https://viacep.com.br/ws/${cep}/json/`;
        const resposta = await fetch(url);
        const dados = await resposta.json();

        if (dados.erro) {
            alert('CEP não encontrado.');
            return;
        }

        document.getElementById('cidade').value = `${dados.localidade} — ${dados.uf}`;
    }
    </script>

</body>
</html>