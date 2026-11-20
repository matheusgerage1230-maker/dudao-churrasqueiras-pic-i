<?php
declare(strict_types=1);
require_once __DIR__ . '/includes/config.php';
session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax', 'secure' => !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off']);
session_start();
header('Cache-Control: no-store');
if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(32)); }
$page = 'contato';
$title = 'Contato e orçamento';
$errors = [];
$ready = false;
$values = array_fill_keys(['nome', 'telefone', 'email', 'cidade', 'ambiente', 'mensagem'], '');
$selected = is_string($_GET['produto'] ?? null) ? substr($_GET['produto'], 0, 150) : '';
if ($selected !== '') { $values['mensagem'] = 'Olá! Tenho interesse em: ' . $selected . '.'; }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($values as $key => $_) { $values[$key] = is_string($_POST[$key] ?? null) ? trim($_POST[$key]) : ''; }
    $token = is_string($_POST['csrf'] ?? null) ? $_POST['csrf'] : '';
    if (!hash_equals($_SESSION['csrf'], $token)) { $errors[] = 'Sua sessão expirou. Atualize a página e tente novamente.'; }
    if (!empty($_POST['website'])) { $errors[] = 'Não foi possível preparar a solicitação.'; }
    if (strlen($values['nome']) < 2 || strlen($values['nome']) > 180) { $errors[] = 'Informe um nome entre 2 e 180 caracteres.'; }
    $digits = preg_replace('/\D/', '', $values['telefone']);
    if (strlen($digits) < 10 || strlen($digits) > 13) { $errors[] = 'Informe um telefone válido com DDD.'; }
    if (!filter_var($values['email'], FILTER_VALIDATE_EMAIL) || strlen($values['email']) > 254) { $errors[] = 'Informe um e-mail válido.'; }
    if ($values['cidade'] === '' || strlen($values['cidade']) > 180) { $errors[] = 'Informe sua cidade (até 180 caracteres).'; }
    if (strlen($values['ambiente']) > 180) { $errors[] = 'Descreva o ambiente em até 180 caracteres.'; }
    if (strlen($values['mensagem']) < 10 || strlen($values['mensagem']) > 2500) { $errors[] = 'Escreva uma mensagem entre 10 e 2500 caracteres.'; }
    if (($_POST['consentimento'] ?? '') !== 'sim') { $errors[] = 'Autorize o contato sobre este projeto para continuar.'; }
    if (!$errors) {
        $message = "Olá, Dudão! Gostaria de solicitar um orçamento.\n\nNome: {$values['nome']}\nTelefone: {$values['telefone']}\nE-mail: {$values['email']}\nCidade: {$values['cidade']}\nAmbiente: {$values['ambiente']}\n\n{$values['mensagem']}";
        $ready = true;
    }
}
require __DIR__ . '/includes/header.php';
?>
<main id="conteudo" class="wrap contact-main">
    <section class="contact-copy"><span class="eyebrow">Contato</span><h1>Sua próxima história começa com uma conversa.</h1><p>Conte sobre o seu projeto. Vamos entender seu ambiente, rotina e expectativas para criar seu espaço de fogo.</p><img src="assets/img/contact-0.jpg" alt="Amigos reunidos em uma área gourmet ao redor da churrasqueira" width="700" height="460"><div class="contact-details"><a href="<?= e(whatsapp()) ?>" target="_blank" rel="noopener noreferrer"><strong><?= e(BUSINESS_PHONE) ?></strong></a><a href="mailto:<?= e(BUSINESS_EMAIL) ?>"><?= e(BUSINESS_EMAIL) ?></a><span><?= e(BUSINESS_CITY) ?></span></div></section>
    <section class="contact-form" id="formulario" aria-labelledby="form-title">
        <?php if ($ready): ?>
        <span class="eyebrow">Próximo passo</span><h2 id="form-title">Sua mensagem está pronta.</h2><p>Confira os dados abaixo e continue no WhatsApp para enviar sua solicitação à Dudão.</p><dl class="mt-4"><dt>Nome</dt><dd><?= e($values['nome']) ?></dd><dt>Contato</dt><dd><?= e($values['telefone']) ?><br><?= e($values['email']) ?></dd><dt>Cidade e ambiente</dt><dd><?= e($values['cidade']) ?><?= $values['ambiente'] !== '' ? ' — ' . e($values['ambiente']) : '' ?></dd><dt>Mensagem</dt><dd class="text-break"><?= nl2br(e($values['mensagem'])) ?></dd></dl><a class="button orange" href="<?= e(whatsapp($message)) ?>" target="_blank" rel="noopener noreferrer">Continuar no WhatsApp →</a><p class="form-note">A solicitação será enviada quando você confirmar o envio no WhatsApp. Nenhum e-mail foi enviado.</p><a class="d-inline-block mt-4 text-decoration-underline" href="contato.php#formulario">Preparar outra solicitação</a>
        <?php else: ?>
        <h2 id="form-title">Conte sobre o seu projeto</h2>
        <?php if ($errors): ?><div class="alert alert-danger" role="alert"><strong>Confira os campos:</strong><ul class="mb-0 mt-2"><?php foreach ($errors as $error): ?><li><?= e($error) ?></li><?php endforeach; ?></ul></div><?php endif; ?>
        <form method="post" action="contato.php#formulario">
            <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
            <div class="d-none" aria-hidden="true"><label>Website<input name="website" tabindex="-1" autocomplete="off"></label></div>
            <div class="row g-3">
                <div class="col-sm-6"><label class="field" for="nome">Nome<input class="form-control" id="nome" name="nome" placeholder="Como podemos chamar você?" autocomplete="name" required minlength="2" maxlength="180" value="<?= e($values['nome']) ?>"></label></div>
                <div class="col-sm-6"><label class="field" for="telefone">Telefone<input class="form-control" id="telefone" name="telefone" type="tel" placeholder="(19) 99999-9999" autocomplete="tel" required maxlength="22" value="<?= e($values['telefone']) ?>"></label></div>
                <div class="col-12"><label class="field" for="email">E-mail<input class="form-control" id="email" name="email" type="email" placeholder="voce@email.com" autocomplete="email" required maxlength="254" value="<?= e($values['email']) ?>"></label></div>
                <div class="col-sm-6"><label class="field" for="cidade">Cidade<input class="form-control" id="cidade" name="cidade" placeholder="Sua cidade" autocomplete="address-level2" required maxlength="180" value="<?= e($values['cidade']) ?>"></label></div>
                <div class="col-sm-6"><label class="field" for="ambiente">Tipo de ambiente <span class="visually-hidden">(opcional)</span><input class="form-control" id="ambiente" name="ambiente" placeholder="Casa, apartamento, gourmet…" maxlength="180" value="<?= e($values['ambiente']) ?>"></label></div>
                <div class="col-12"><label class="field" for="mensagem">Mensagem<textarea class="form-control" id="mensagem" name="mensagem" placeholder="Conte o que você imagina para esse espaço…" required minlength="10" maxlength="2500" rows="4"><?= e($values['mensagem']) ?></textarea></label></div>
            </div>
            <label class="consent"><input type="checkbox" name="consentimento" value="sim" required <?= ($_POST['consentimento'] ?? '') === 'sim' ? 'checked' : '' ?>><span>Concordo em receber contato da Dudão Churrasqueiras sobre este projeto.</span></label>
            <button class="button orange" type="submit">Preparar solicitação →</button><p class="form-note">Você poderá revisar a mensagem antes de enviá-la pelo WhatsApp.</p>
        </form>
        <?php endif; ?>
    </section>
</main>
<?php require __DIR__ . '/includes/footer.php'; ?>
