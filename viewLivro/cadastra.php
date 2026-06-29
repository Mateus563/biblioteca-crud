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
</head>
<body>

    <h2>Cadastro de Livro</h2> 

    
    <form action="" method="POST">

        <label>Título</label>
        <input type="text" name="titulo" required> 
        <br>

        <label>Autor</label>
        <input type="text" name="autor" required> 
        <br>
       
        <label>Editora</label>
        <input type="text" name="editora" required> 
        <br>


        <label>Ano de Publicação</label>
        <input type="text" name="ano_publicacao" required> 
        <br>

        <label>Quantidade</label>
        <input type="text" name="quantidade" required>

        <button type="submit">Cadastrar</button> 
    </form>

    <a href="lista.php">Ver livros cadastrados</a>



</body>
</html>