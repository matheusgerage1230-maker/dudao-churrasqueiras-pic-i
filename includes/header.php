<?php
require_once __DIR__ . '/config.php';
$page = $page ?? 'inicio';
$title = $title ?? 'Churrasqueiras artesanais em Piracicaba';
?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Churrasqueiras artesanais, fogões a lenha e fornos de pizza em Piracicaba. Conheça a Dudão Churrasqueiras e solicite seu orçamento.">
    <meta name="theme-color" content="#181613">
    <title><?= e($title) ?> | <?= e(BUSINESS_NAME) ?></title>
    <link rel="icon" href="assets/favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="assets/vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<a class="skip" href="#conteudo">Pular para o conteúdo</a>
<header class="site-header">
    <div class="wrap header-inner">
        <a href="index.php" class="brand" aria-label="Dudão Churrasqueiras — início"><span class="brand-dot" aria-hidden="true"></span><span><strong>DUDÃO CHURRASQUEIRAS</strong><small>CHURRASQUEIRAS ARTESANAIS</small></span></a>
        <button class="menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Abrir ou fechar menu">Menu ☰</button>
        <nav id="menu" class="site-nav collapse" aria-label="Navegação principal">
            <a href="index.php" <?= $page === 'inicio' ? 'aria-current="page"' : '' ?>>Início</a>
            <a href="produtos.php" <?= $page === 'produtos' ? 'aria-current="page"' : '' ?>>Produtos &amp; serviços</a>
            <a href="contato.php" <?= $page === 'contato' ? 'aria-current="page"' : '' ?>>Contato</a>
            <a href="contato.php#formulario" class="button">Solicitar orçamento <span aria-hidden="true">→</span></a>
        </nav>
    </div>
</header>
