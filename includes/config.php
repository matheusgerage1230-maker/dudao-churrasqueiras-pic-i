<?php
declare(strict_types=1);
const BUSINESS_NAME = 'Dudão Churrasqueiras';
const BUSINESS_PHONE = '(19) 99655-9994';
const BUSINESS_WHATSAPP = '5519996559994';
const BUSINESS_EMAIL = 'contato@dudao.com.br';
const BUSINESS_CITY = 'Piracicaba • SP';
const BUSINESS_ADDRESS = 'Rua Conchas, 1290 — Pau Queimado';

function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}
function whatsapp(string $message = 'Olá! Gostaria de conversar sobre um projeto de churrasqueira.'): string {
    return 'https://wa.me/' . BUSINESS_WHATSAPP . '?text=' . rawurlencode($message);
}

$products = [
    '45-graus' => ['title' => 'Churrasqueira 45° graus', 'tag' => 'Ícone da coleção', 'image' => 'products-4.jpg', 'description' => 'Feita com tijolos de cores mescladas.', 'detail' => 'Uma churrasqueira de alvenaria que valoriza o encontro ao redor da brasa. Converse com nossa equipe sobre as medidas e a instalação no seu espaço.'],
    'tradicional' => ['title' => 'Churrasqueira Tradicional + Mureta de apoio', 'tag' => 'Modular', 'image' => 'products-0.jpg', 'description' => 'Bancada, cuba e fogo em um sistema modular que cresce com o seu espaço.', 'detail' => 'Um conjunto que reúne preparo e churrasqueira no mesmo ambiente. Solicite um orçamento para adaptar a composição ao seu projeto.'],
    'trio' => ['title' => 'Trio', 'tag' => 'Varandas', 'image' => 'products-2.jpg', 'description' => 'Churrasqueira com forno iglu, forno de ferro e fogão a lenha.', 'detail' => 'Diferentes formas de cozinhar em um só espaço. Fale com nossa equipe para planejar as medidas, a disposição e a montagem do conjunto.'],
];
$collection = [
    ['title' => 'Churrasqueira Revestida', 'image' => 'home-3.jpg', 'description' => 'Acabamento que valoriza seu espaço'],
    ['title' => 'Fogão a Lenha', 'image' => 'home-4.jpg', 'description' => 'Alvenaria • sob medida'],
    ['title' => 'Forno de Pizza', 'image' => 'home-2.jpg', 'description' => 'O sabor de reunir pessoas'],
];
