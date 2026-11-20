<?php
$page = 'produtos';
$title = 'Produtos e serviços';
require __DIR__ . '/includes/header.php';
?>
<main id="conteudo">
    <div class="wrap">
        <section class="products-intro"><div><span class="eyebrow">Produtos &amp; serviços</span><h1>Uma churrasqueira para cada jeito de receber.</h1><p>Do primeiro risco à primeira brasa, desenhamos soluções que pertencem ao ambiente e à rotina de quem cozinha.</p></div><img src="assets/img/products-3.jpg" alt="Chamas acesas sobre uma grelha de churrasqueira" width="700" height="500" fetchpriority="high"></section>
        <section class="product-list" aria-label="Nossos modelos">
            <?php foreach ($products as $id => $product): ?>
            <article class="product" id="<?= e($id) ?>"><img src="assets/img/<?= e($product['image']) ?>" alt="<?= e($product['title']) ?>" loading="lazy" width="700" height="600"><div class="product-copy"><span class="eyebrow"><?= e($product['tag']) ?></span><h2><?= e($product['title']) ?></h2><p><?= e($product['description']) ?></p><button class="button dark" data-bs-toggle="modal" data-bs-target="#detalhes-<?= e($id) ?>">Ver detalhes <span aria-hidden="true">→</span></button></div></article>
            <div class="modal fade" id="detalhes-<?= e($id) ?>" tabindex="-1" aria-labelledby="titulo-<?= e($id) ?>" aria-hidden="true"><div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"><div class="modal-content"><div class="modal-header"><h2 class="modal-title fs-4" id="titulo-<?= e($id) ?>"><?= e($product['title']) ?></h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar detalhes"></button></div><div class="modal-body"><div class="row g-4 align-items-center"><div class="col-md-6"><img class="rounded-4" src="assets/img/<?= e($product['image']) ?>" alt="<?= e($product['title']) ?>" loading="lazy"></div><div class="col-md-6"><span class="eyebrow"><?= e($product['tag']) ?></span><p><?= e($product['description']) ?></p><p class="mt-3"><?= e($product['detail']) ?></p><a class="button orange mt-4" href="contato.php?produto=<?= rawurlencode($product['title']) ?>#formulario">Quero este modelo →</a></div></div></div></div></div></div>
            <?php endforeach; ?>
        </section>
    </div>
    <section class="project-cta"><div class="wrap"><div><h2>Vamos desenhar seu espaço de fogo?</h2><p>Conte como você gosta de receber. A primeira conversa é sem compromisso.</p></div><a class="button" href="contato.php#formulario">Iniciar projeto →</a></div></section>
    <section class="installation" id="montagem"><div class="wrap installation-inner"><img src="assets/img/products-1.jpg" alt="Churrasqueira em aço instalada com acabamento embutido" loading="lazy" width="600" height="750"><div><span class="eyebrow">Montagem especializada</span><h2>Instalação sem improviso.</h2><p>Nossa própria equipe cuida de medidas e dutos.</p><ol class="steps"><li><span aria-hidden="true">↗</span><div><strong>Visita técnica</strong><p>Conferimos o espaço e os pontos críticos.</p></div></li><li><span aria-hidden="true">▤</span><div><strong>Projeto executivo</strong><p>Compatibilizamos arquitetura, exaustão e uso.</p></div></li><li><span aria-hidden="true">⌁</span><div><strong>Montagem</strong><p>Instalação protegida, testada e entregue pronta.</p></div></li></ol></div></div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
