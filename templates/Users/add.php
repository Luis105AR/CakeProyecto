<h1>Nuevo Usuario</h1>

<?= $this->Form->create($user) ?>

<?= $this->Form->control('username', [
    'label' => 'Usuario'
]) ?>

<?= $this->Form->control('password', [
    'label' => 'Contraseña'
]) ?>

<?= $this->Form->control('role', [
    'options' => [
        'admin' => 'admin',
        'user' => 'user'
    ]
]) ?>

<?= $this->Form->button('Guardar') ?>

<?= $this->Form->end() ?>
