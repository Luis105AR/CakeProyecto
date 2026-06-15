<?php
declare(strict_types=1);

namespace App\Controller;

class TagsController extends AppController
{
    public function index()
    {
        $tags = $this->Tags->find()->all();

        $this->set(compact('tags'));
    }

    public function view($id = null)
    {
        $tag = $this->Tags->get($id);

        $this->set(compact('tag'));
    }

    public function add()
    {
        $tag = $this->Tags->newEmptyEntity();

        if ($this->request->is('post')) {

            $tag = $this->Tags->patchEntity(
                $tag,
                $this->request->getData()
            );

            if ($this->Tags->save($tag)) {

                $this->Flash->success('La etiqueta fue guardada.');

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('No se pudo guardar la etiqueta.');
        }

        $this->set(compact('tag'));
    }

    public function edit($id = null)
    {
        $tag = $this->Tags->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $tag = $this->Tags->patchEntity(
                $tag,
                $this->request->getData()
            );

            if ($this->Tags->save($tag)) {

                $this->Flash->success('La etiqueta fue actualizada.');

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error('No se pudo actualizar la etiqueta.');
        }

        $this->set(compact('tag'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $tag = $this->Tags->get($id);

        if ($this->Tags->delete($tag)) {

            $this->Flash->success('La etiqueta fue eliminada.');
        } else {

            $this->Flash->error('No se pudo eliminar la etiqueta.');
        }

        return $this->redirect(['action' => 'index']);
    }
}