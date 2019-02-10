<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ficheordrea Controller
 *
 * @property \App\Model\Table\FicheordreaTable $Ficheordrea
 *
 * @method \App\Model\Entity\Ficheordrea[] paginate($object = null, array $settings = [])
 */
class FicheordreaController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $ficheordrea = $this->paginate($this->Ficheordrea);

        $this->set(compact('ficheordrea'));
        $this->set('_serialize', ['ficheordrea']);
    }

    /**
     * View method
     *
     * @param string|null $id Ficheordrea id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ficheordrea = $this->Ficheordrea->get($id, [
            'contain' => []
        ]);

        $this->set('ficheordrea', $ficheordrea);
        $this->set('_serialize', ['ficheordrea']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ficheordrea = $this->Ficheordrea->newEntity();
        if ($this->request->is('post')) {
            $ficheordrea = $this->Ficheordrea->patchEntity($ficheordrea, $this->request->getData());
            if ($this->Ficheordrea->save($ficheordrea)) {
                $this->Flash->success(__('The ficheordrea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficheordrea could not be saved. Please, try again.'));
        }
        $this->set(compact('ficheordrea'));
        $this->set('_serialize', ['ficheordrea']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ficheordrea id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ficheordrea = $this->Ficheordrea->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ficheordrea = $this->Ficheordrea->patchEntity($ficheordrea, $this->request->getData());
            if ($this->Ficheordrea->save($ficheordrea)) {
                $this->Flash->success(__('The ficheordrea has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficheordrea could not be saved. Please, try again.'));
        }
        $this->set(compact('ficheordrea'));
        $this->set('_serialize', ['ficheordrea']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ficheordrea id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ficheordrea = $this->Ficheordrea->get($id);
        if ($this->Ficheordrea->delete($ficheordrea)) {
            $this->Flash->success(__('The ficheordrea has been deleted.'));
        } else {
            $this->Flash->error(__('The ficheordrea could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
