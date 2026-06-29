<?php
require_once __DIR__ . '/../controller/EmprestimoController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new EmprestimoController();
    $controller->salvar();
}
?>
<!DOCTYPE html>    
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Empréstimo</title>
</head>
<body>

    <h2>Cadastro de Empréstimo</h2>

    
    <form action="" method="POST">

        <label>ID livro</label>
        <input type="text" name="id_livro" required> 
        <br>

        <label>ID usuário</label>
        <input type="text" name="id_usuario" required> 
        <br>
        <br>
       
        <label>Data de Locação</label>
        <input type="text" name="data_locacao" required> 
        <br>


        <label>Data de Devolução</label>
        <input type="text" name="data_devolucao" required> 
        <br>

        <button type="submit">Cadastrar</button> 
    </form>

    <a href="lista.php">Ver livros cadastrados</a>



</body>
</html>