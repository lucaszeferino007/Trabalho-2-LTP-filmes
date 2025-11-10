<?php include __DIR__ . '/../includes/header.php'; ?>
<section class="card">
    <h2>Editar Filme</h2>
    <form method="post" action="">
        <label>Título</label>
        <input type="text" name="titulo" value="<?=htmlspecialchars($film['titulo'])?>" required>
        <label>Sinopse</label>
        <textarea name="sinopse"><?=htmlspecialchars($film['sinopse'])?></textarea>
        <label>Ano</label>
        <input type="number" name="ano" value="<?=htmlspecialchars($film['ano'])?>" required>
        <label>Duração (min)</label>
        <input type="number" name="duracao" value="<?=htmlspecialchars($film['duracao'])?>">
        <label>Gênero</label>
        <select name="genero_id" required>
            <?php foreach($gens as $g): ?>
                <option value="<?=$g['id']?>" <?=($g['id']==$film['genero_id'])? 'selected' : ''?>><?=htmlspecialchars($g['nome'])?></option>
            <?php endforeach; ?>
        </select>
        <button class="btn" type="submit">Atualizar</button>
        <a class="btn muted" href="index.php?page=filmes">Voltar</a>
    </form>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
