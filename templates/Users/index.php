<h1>Usuarios</h1>

<p>
    <?= $this->Html->link(
        'Nuevo Usuario',
        ['action' => 'add'],
        ['class' => 'button']
    ) ?>
</p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th>Creado</th>
            <th>Modificado</th>
            <th>Comportamiento</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($users as $user): ?>

        <tr>
            <td><?= $user->id ?></td>
            <td><?= h($user->username) ?></td>
            <td><?= h($user->role) ?></td>
            <td><?= $user->created ?></td>
            <td><?= $user->modified ?></td>

            <td>
                <?= $this->Html->link(
                    'Ver',
                    ['action' => 'view', $user->id]
                ) ?>

                |

                <?= $this->Html->link(
                    'Editar',
                    ['action' => 'edit', $user->id]
                ) ?>

                |

                <?= $this->Form->postLink(
                    'Eliminar',
                    ['action' => 'delete', $user->id],
                    ['confirm' => '¿Eliminar usuario?']
                ) ?>
            </td>
        </tr>

    <?php endforeach; ?>

    </tbody>
</table>