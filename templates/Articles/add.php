<h1>Agregar Artículo</h1>

<?= $this->Form->create($article) ?>

<fieldset>
    <legend>Agregar Artículo</legend>

    <?=
        $this->Form->control('title');
    ?>

    <?=
        $this->Form->control('slug');
    ?>

    <?=
        $this->Form->control('body', ['rows' => '5']);
    ?>
</fieldset>

<?= $this->Form->button(__('Guardar Artículo')) ?>

<?= $this->Form->end() ?>