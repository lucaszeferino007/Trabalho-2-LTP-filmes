<?php include __DIR__ . '/../includes/header.php'; ?>
<section class="card">
    <h2>Editar Gênero</h2>
    <form method="post" action="">
        <label>Nome</label>
        <input type="text" name="nome" value="<?=htmlspecialchars($gen['nome'])?>" required>
        <button class="btn" type="submit">Atualizar</button>
        <a class="btn muted" href="index.php?page=generos">Voltar</a>
    </form>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
