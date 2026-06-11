<h1>Editar Artículo</h1>

<?= $this->Form->create($article) ?>

<fieldset>
    <legend>Editar Artículo</legend>

    <?= $this->Form->control('title') ?>

    <?= $this->Form->control('slug') ?>

    <?= $this->Form->control('body', ['rows' => 5]) ?>
</fieldset>

<?= $this->Form->button(__('Guardar Cambios')) ?>

<?= $this->Form->end() ?>