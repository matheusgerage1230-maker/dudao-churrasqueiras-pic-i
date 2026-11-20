<footer class="site-footer">
    <div class="wrap">
        <div class="footer-top">
            <div><a class="footer-brand" href="index.php">DUDÃO CHURRASQUEIRAS</a><p class="footer-copy">Fogo, aço e encontros memoráveis. Churrasqueiras feitas para durar gerações.</p></div>
            <nav class="footer-links" aria-label="Explore"><strong>Explore</strong><a href="index.php">Início</a><a href="produtos.php">Produtos</a><a href="produtos.php#montagem">Montagem</a><a href="contato.php">Contato</a></nav>
            <div class="footer-links"><strong>Fale conosco</strong><a href="<?= e(whatsapp()) ?>" target="_blank" rel="noopener noreferrer"><?= e(BUSINESS_PHONE) ?></a><a href="mailto:<?= e(BUSINESS_EMAIL) ?>"><?= e(BUSINESS_EMAIL) ?></a><span><?= e(BUSINESS_CITY) ?></span></div>
        </div>
        <div class="footer-bottom"><span>© <?= date('Y') ?> Dudão Churrasqueiras. Todos os direitos reservados.</span><a href="<?= e(whatsapp()) ?>" target="_blank" rel="noopener noreferrer">WhatsApp ↗</a></div>
    </div>
</footer>
<script src="assets/vendor/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>
