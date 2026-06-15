<h1>Nueva Etiqueta</h1>

<?= $this->Form->create($tag) ?>

<?= $this->Form->control('title', [
    'label' => 'Etiqueta'
]) ?>

<?= $this->Form->button('Guardar') ?>

<?= $this->Form->end() ?>