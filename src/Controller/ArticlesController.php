<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Articles Controller
 *
 * @property \App\Model\Table\ArticlesTable $Articles
 */
class ArticlesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
public function index()
{
    $articles = $this->Articles
        ->find()
        ->contain(['Users'])
        ->all();

    $this->set(compact('articles'));
}

    /**
     * View method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   public function view($slug = null)
{
    $article = $this->Articles
        ->find('bySlug', slug: $slug)
        ->firstOrFail();

    $this->set(compact('article'));
}

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $user = $this->request->getAttribute('identity');

    if (!$user || $user->role !== 'admin') {
        $this->Flash->error('No tienes permisos.');

        return $this->redirect(['action' => 'index']);
    }

    $article = $this->Articles->newEmptyEntity();

    if ($this->request->is('post')) {

        $data = $this->request->getData();

        $article = $this->Articles->patchEntity($article, $data);

        $article->user_id = $user->id;

        if ($this->Articles->save($article)) {

            if (!empty($data['tags'])) {

                $tags = array_map('trim', explode(',', $data['tags']));

                $tagsTable = $this->fetchTable('Tags');

                foreach ($tags as $tagTitle) {

                    $tag = $tagsTable->find()
                        ->where(['title' => $tagTitle])
                        ->first();

                    if (!$tag) {
                        $tag = $tagsTable->newEntity([
                            'title' => $tagTitle
                        ]);

                        $tagsTable->save($tag);
                    }

                    $connection = $this->Articles->getConnection();

                    $connection->insert(
                        'articles_tags',
                        [
                            'article_id' => $article->id,
                            'tag_id' => $tag->id
                        ]
                    );
                }
            }

            $this->Flash->success(__('The article has been saved.'));

            return $this->redirect(['action' => 'index']);
        }

        $this->Flash->error(__('The article could not be saved. Please, try again.'));
    }

    $this->set(compact('article'));
}
    /**
     * Edit method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->request->getAttribute('identity');

if (!$user || $user->role !== 'admin') {
    $this->Flash->error('No tienes permisos.');

    return $this->redirect(['action' => 'index']);
}
        $article = $this->Articles->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $article = $this->Articles->patchEntity($article, $this->request->getData());
            if ($this->Articles->save($article)) {
                $this->Flash->success(__('The article has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The article could not be saved. Please, try again.'));
        }
        $this->set(compact('article'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Article id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $user = $this->request->getAttribute('identity');

if (!$user || $user->role !== 'admin') {
    $this->Flash->error('No tienes permisos.');

    return $this->redirect(['action' => 'index']);
}
        $this->request->allowMethod(['post', 'delete']);
        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article has been deleted.'));
        } else {
            $this->Flash->error(__('The article could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
