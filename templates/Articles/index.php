<h1>Artículos</h1>

<?php
$user = $this->request->getAttribute('identity');
?>

<?php if ($user && $user->role === 'admin'): ?>
<p>
    <?= $this->Html->link('Agregar Artículo', ['action' => 'add']) ?>
</p>
<?php endif; ?>

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

<?php if ($user && $user->role === 'admin'): ?>

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

<?php endif; ?>

<hr>

<?php endforeach; ?>