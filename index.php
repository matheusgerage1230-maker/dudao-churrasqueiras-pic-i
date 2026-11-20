<?php
$page = 'inicio';
require __DIR__ . '/includes/header.php';
?>
<main id="conteudo">
    <section class="hero">
        <div class="hero-inner">
            <div class="hero-copy"><span class="eyebrow">Desenhadas ao redor do fogo</span><h1>O coração da casa começa aqui.</h1><p>Churrasqueiras artesanais que unem engenharia, presença e o ritual brasileiro de reunir pessoas.</p><div class="actions"><a class="button orange" href="produtos.php">Conheça os modelos <span aria-hidden="true">→</span></a><a class="button" href="<?= e(whatsapp()) ?>" target="_blank" rel="noopener noreferrer">Fale com um especialista <span aria-hidden="true">→</span></a></div></div>
            <img class="hero-image" src="assets/img/home-5.jpg" alt="Conjunto artesanal de churrasqueira e fornos de tijolos em uma varanda coberta" fetchpriority="high" width="900" height="1000">
        </div>
    </section>
    <section class="collection" aria-labelledby="colecao-title">
        <div class="wrap"><div class="section-head"><div><span class="eyebrow">Coleção</span><h2 id="colecao-title">Feitas para ocupar o centro da cena.</h2></div></div>
            <div class="row g-4">
                <?php foreach ($collection as $item): ?>
                <div class="col-md-4"><a class="collection-card" href="contato.php?produto=<?= rawurlencode($item['title']) ?>#formulario"><img src="assets/img/<?= e($item['image']) ?>" alt="<?= e($item['title']) ?> da Dudão Churrasqueiras" loading="lazy" width="600" height="800"><div class="card-caption"><h3><?= e($item['title']) ?></h3><p><?= e($item['description']) ?></p></div></a></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="testimonial"><div class="wrap testimonial-grid"><div><span class="eyebrow">Histórias ao redor da brasa</span><h2>Quem acende,<br>recomenda.</h2></div><div class="quote"><div class="quote-mark" aria-hidden="true">“</div><blockquote>A churrasqueira mudou a dinâmica da nossa casa. A equipe entendeu o espaço, instalou tudo com precisão e o acabamento é impecável.</blockquote><div class="person"><img src="assets/img/home-6.jpg" alt="" loading="lazy" width="42" height="42"><div><strong>Marina &amp; Caio</strong><small>Projeto residencial • Campinas</small></div></div></div></div></section>
    <section class="showroom"><iframe class="showroom-map" title="Localização da Dudão Churrasqueiras no Google Maps" src="https://maps.google.com/maps?q=<?= rawurlencode(BUSINESS_ADDRESS . ', Piracicaba, SP, Brasil') ?>&amp;output=embed&amp;hl=pt-BR&amp;z=16" width="1000" height="460" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe><div class="showroom-copy"><span class="eyebrow">Visite nosso showroom</span><h2>Veja o fogo de perto.</h2><p><?= e(BUSINESS_ADDRESS) ?><br><?= e(BUSINESS_CITY) ?></p><p>Seg–Sex, 8h às 18h</p><a class="button" href="https://www.google.com/maps/search/?api=1&amp;query=<?= rawurlencode(BUSINESS_ADDRESS . ', Piracicaba, SP') ?>" target="_blank" rel="noopener noreferrer">Traçar rota <span aria-hidden="true">→</span></a></div></section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
