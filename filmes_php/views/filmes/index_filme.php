<?php include __DIR__ . '/../includes/header.php'; ?>
<section class="card">
    <h2>Filmes</h2>
    <p><a class="btn" href="index.php?page=filmes&action=create">Adicionar filme</a></p>
    <table class="table">
        <thead><tr><th>ID</th><th>Título</th><th>Gênero</th><th>Ano</th><th>Duração</th><th>Ações</th></tr></thead>
        <tbody>
        <?php foreach($films as $f): ?>
            <tr>
                <td><?=htmlspecialchars($f['id'])?></td>
                <td><?=htmlspecialchars($f['titulo'])?></td>
                <td><?=htmlspecialchars($f['genero'])?></td>
                <td><?=htmlspecialchars($f['ano'])?></td>
                <td><?=htmlspecialchars($f['duracao'])?> min</td>
                <td>
                    <a href="index.php?page=filmes&action=edit&id=<?=$f['id']?>">Editar</a> |
                    <a href="index.php?page=filmes&action=delete&id=<?=$f['id']?>" onclick="return confirm('Excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
