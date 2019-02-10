<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Chefdep Controller
 *
 * @property \App\Model\Table\ChefdepTable $Chefdep
 *
 * @method \App\Model\Entity\Chefdep[] paginate($object = null, array $settings = [])
 */
class ChefdepController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $chefdep = $this->paginate($this->Chefdep);

        $this->set(compact('chefdep'));
        $this->set('_serialize', ['chefdep']);
    }

    /**
     * View method
     *
     * @param string|null $id Chefdep id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $chefdep = $this->Chefdep->get($id, [
            'contain' => []
        ]);

        $this->set('chefdep', $chefdep);
        $this->set('_serialize', ['chefdep']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $chefdep = $this->Chefdep->newEntity();
        if ($this->request->is('post')) {
            $chefdep = $this->Chefdep->patchEntity($chefdep, $this->request->getData());
            if ($this->Chefdep->save($chefdep)) {
                $this->Flash->success(__('The chefdep has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chefdep could not be saved. Please, try again.'));
        }
        $this->set(compact('chefdep'));
        $this->set('_serialize', ['chefdep']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Chefdep id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $chefdep = $this->Chefdep->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $chefdep = $this->Chefdep->patchEntity($chefdep, $this->request->getData());
            if ($this->Chefdep->save($chefdep)) {
                $this->Flash->success(__('The chefdep has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The chefdep could not be saved. Please, try again.'));
        }
        $this->set(compact('chefdep'));
        $this->set('_serialize', ['chefdep']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Chefdep id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $chefdep = $this->Chefdep->get($id);
        if ($this->Chefdep->delete($chefdep)) {
            $this->Flash->success(__('The chefdep has been deleted.'));
        } else {
            $this->Flash->error(__('The chefdep could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
