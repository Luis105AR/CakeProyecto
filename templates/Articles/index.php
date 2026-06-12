<h1>Artículos</h1>

<p>
    <?= $this->Html->link('Agregar Artículo', ['action' => 'add']) ?>
</p>

<?php foreach ($articles as $article): ?>

<h3>
    <?= $this->Html->link(
        $article->title,
        ['action' => 'view', $article->slug]
    ) ?>
</h3>

<p>
    <?= h($article->body) ?>
</p>

<p>
    <?= $this->Html->link(
        'Editar',
        ['action' => 'edit', $article->id]
    ) ?>
</p>

<p>
    <?= $this->Form->postLink(
        'Eliminar',
        ['action' => 'delete', $article->id],
        ['confirm' => '¿Seguro que deseas eliminar este artículo?']
    ) ?>
</p>

<hr>
<?php endforeach; ?>