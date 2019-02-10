<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Persserv Controller
 *
 * @property \App\Model\Table\PersservTable $Persserv
 *
 * @method \App\Model\Entity\Persserv[] paginate($object = null, array $settings = [])
 */
class PersservController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $persserv = $this->paginate($this->Persserv);

        $this->set(compact('persserv'));
        $this->set('_serialize', ['persserv']);
    }

    /**
     * View method
     *
     * @param string|null $id Persserv id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $persserv = $this->Persserv->get($id, [
            'contain' => []
        ]);

        $this->set('persserv', $persserv);
        $this->set('_serialize', ['persserv']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $persserv = $this->Persserv->newEntity();
        if ($this->request->is('post')) {
            $persserv = $this->Persserv->patchEntity($persserv, $this->request->getData());
            if ($this->Persserv->save($persserv)) {
                $this->Flash->success(__('The persserv has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The persserv could not be saved. Please, try again.'));
        }
        $this->set(compact('persserv'));
        $this->set('_serialize', ['persserv']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Persserv id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $persserv = $this->Persserv->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $persserv = $this->Persserv->patchEntity($persserv, $this->request->getData());
            if ($this->Persserv->save($persserv)) {
                $this->Flash->success(__('The persserv has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The persserv could not be saved. Please, try again.'));
        }
        $this->set(compact('persserv'));
        $this->set('_serialize', ['persserv']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Persserv id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $persserv = $this->Persserv->get($id);
        if ($this->Persserv->delete($persserv)) {
            $this->Flash->success(__('The persserv has been deleted.'));
        } else {
            $this->Flash->error(__('The persserv could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
