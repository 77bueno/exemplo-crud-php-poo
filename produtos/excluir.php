<?php
use ExemploCrudPdo\Produto;
require_once "../vendor/autoload.php";
$produto = new Produto;
$produto->setId($_GET['id']);
$produto->excluirProduto();
header("location:visualizar.php");