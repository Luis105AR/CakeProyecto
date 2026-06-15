<h1>Artículos</h1>

<?php
$user = $this->request->getAttribute('identity');
?>

<?php if ($user && $user->role === 'admin'): ?>
<div style="text-align:right; margin-bottom:15px;">
    <?= $this->Html->link(
        'Nuevo Artículo',
        ['action' => 'add'],
        ['class' => 'button']
    ) ?>
</div>
<?php endif; ?>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Slug</th>
            <th>Creado</th>
            <th>Modificado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $article->id ?></td>
            <td><?= h($article->title) ?></td>
            <td><?= h($article->slug) ?></td>
            <td><?= $article->created ?></td>
            <td><?= $article->modified ?></td>

            <td>
                <?= $this->Html->link(
                    'Ver',
                    ['action' => 'view', $article->slug]
                ) ?>

                <?php if ($user && $user->role === 'admin'): ?>

                    |

                    <?= $this->Html->link(
                        'Editar',
                        ['action' => 'edit', $article->id]
                    ) ?>

                    |

                    <?= $this->Form->postLink(
                        'Eliminar',
                        ['action' => 'delete', $article->id],
                        ['confirm' => '¿Eliminar artículo?']
                    ) ?>

                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>