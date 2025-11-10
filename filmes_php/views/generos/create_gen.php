<?php include __DIR__ . '/../includes/header.php'; ?>
<section class="card">
    <h2>Cadastrar Gênero</h2>
    <form method="post" action="">
        <label>Nome</label>
        <input type="text" name="nome" required>
        <button class="btn" type="submit">Salvar</button>
        <a class="btn muted" href="index.php?page=generos">Voltar</a>
    </form>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
