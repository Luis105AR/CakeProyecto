<h1><?= h($user->username) ?></h1>

<p><strong>ID:</strong> <?= $user->id ?></p>

<p><strong>Usuario:</strong> <?= h($user->username) ?></p>

<p><strong>Rol:</strong> <?= h($user->role) ?></p>

<p><strong>Creado:</strong> <?= $user->created ?></p>

<p><strong>Modificado:</strong> <?= $user->modified ?></p>

<?= $this->Html->link(
    'Volver',
    ['action' => 'index']
) ?>