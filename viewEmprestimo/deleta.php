<?php
require_once __DIR__ . '/../controller/EmprestimoController.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new EmprestimoController();
    $controller->deletar();
    exit;
}


header("Location: lista.php");