<?php include __DIR__ . '/../includes/header.php'; ?>
<section class="card">
    <h2>Gêneros</h2>
    <p><a class="btn" href="index.php?page=generos&action=create">Criar novo gênero</a></p>
    <table class="table">
        <thead><tr><th>ID</th><th>Nome</th><th>Ações</th></tr></thead>
        <tbody>
        <?php foreach($gens as $g): ?>
            <tr>
                <td><?=htmlspecialchars($g['id'])?></td>
                <td><?=htmlspecialchars($g['nome'])?></td>
                <td>
                    <a href="index.php?page=generos&action=edit&id=<?=$g['id']?>">Editar</a> |
                    <a href="index.php?page=generos&action=delete&id=<?=$g['id']?>" onclick="return confirm('Excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
