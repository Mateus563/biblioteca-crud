<?php
require_once __DIR__ . '/../controller/LivroController.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new LivroController();
    $controller->deletar();
    exit;
}


header("Location: lista.php");