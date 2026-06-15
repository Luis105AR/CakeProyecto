<h1>Login</h1>

<?= $this->Flash->render() ?>

<?= $this->Form->create() ?>

<fieldset>
    <legend>Iniciar Sesión</legend>

    <?= $this->Form->control('username') ?>
    <?= $this->Form->control('password') ?>

</fieldset>

<?= $this->Form->button('Entrar') ?>

<?= $this->Form->end() ?>
