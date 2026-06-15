<h1>Relación Artículos - Etiquetas</h1>

<table>
    <thead>
        <tr>
            <th>Article ID</th>
            <th>Tag ID</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($articlesTags as $row): ?>
        <tr>
            <td><?= $row->article_id ?></td>
            <td><?= $row->tag_id ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>