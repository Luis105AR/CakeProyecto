<h1>Etiquetas</h1>

<p>
    <?= $this->Html->link(
        'Nueva Etiqueta',
        ['action' => 'add'],
        ['class' => 'button']
    ) ?>
</p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Etiqueta</th>
            <th>Creado</th>
            <th>Modificado</th>
            <th>Comportamiento</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach ($tags as $tag): ?>

        <tr>
            <td><?= $tag->id ?></td>

            <td><?= h($tag->title) ?></td>

            <td><?= $tag->created ?></td>

            <td><?= $tag->modified ?></td>

            <td>

                <?= $this->Html->link(
                    'Ver',
                    ['action' => 'view', $tag->id]
                ) ?>

                |

                <?= $this->Html->link(
                    'Editar',
                    ['action' => 'edit', $tag->id]
                ) ?>

                |

                <?= $this->Form->postLink(
                    'Eliminar',
                    ['action' => 'delete', $tag->id],
                    ['confirm' => '¿Eliminar etiqueta?']
                ) ?>

            </td>
        </tr>

    <?php endforeach; ?>

    </tbody>
</table>