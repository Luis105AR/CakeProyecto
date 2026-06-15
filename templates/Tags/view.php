<h1><?= h($tag->title) ?></h1>

<p>
    <strong>ID:</strong>
    <?= $tag->id ?>
</p>

<p>
    <strong>Creado:</strong>
    <?= $tag->created ?>
</p>

<p>
    <strong>Modificado:</strong>
    <?= $tag->modified ?>
</p>

<?= $this->Html->link(
    'Volver',
    ['action' => 'index']
) ?>