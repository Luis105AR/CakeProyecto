<h1>Editar Etiqueta</h1>

<?= $this->Form->create($tag) ?>

<?= $this->Form->control('title', [
    'label' => 'Etiqueta'
]) ?>

<?= $this->Form->button('Actualizar') ?>

<?= $this->Form->end() ?>