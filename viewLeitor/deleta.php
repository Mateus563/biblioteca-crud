<?php
require_once __DIR__ . '/../controller/LeitorController.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller = new LeitorController();
    $controller->deletar();
    exit;
}


header("Location: lista.php");
