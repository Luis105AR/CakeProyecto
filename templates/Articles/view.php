<h1><?= h($article->title) ?></h1>

<p>
    <?= h($article->body) ?>
</p>

<p>
    <?= $this->Html->link(
        'Volver a artículos',
        ['action' => 'index']
    ) ?>
</p>