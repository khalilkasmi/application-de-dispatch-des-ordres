<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Employe Controller
 *
 * @property \App\Model\Table\EmployeTable $Employe
 *
 * @method \App\Model\Entity\Employe[] paginate($object = null, array $settings = [])
 */
class EmployeController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $employe = $this->paginate($this->Employe);

        $this->set(compact('employe'));
        $this->set('_serialize', ['employe']);
    }

    /**
     * View method
     *
     * @param string|null $id Employe id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $employe = $this->Employe->get($id, [
            'contain' => []
        ]);

        $this->set('employe', $employe);
        $this->set('_serialize', ['employe']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $employe = $this->Employe->newEntity();
        if ($this->request->is('post')) {
            $employe = $this->Employe->patchEntity($employe, $this->request->getData());
            if ($this->Employe->save($employe)) {
                $this->Flash->success(__('The employe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employe could not be saved. Please, try again.'));
        }
        $this->set(compact('employe'));
        $this->set('_serialize', ['employe']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Employe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $employe = $this->Employe->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $employe = $this->Employe->patchEntity($employe, $this->request->getData());
            if ($this->Employe->save($employe)) {
                $this->Flash->success(__('The employe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The employe could not be saved. Please, try again.'));
        }
        $this->set(compact('employe'));
        $this->set('_serialize', ['employe']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Employe id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $employe = $this->Employe->get($id);
        if ($this->Employe->delete($employe)) {
            $this->Flash->success(__('The employe has been deleted.'));
        } else {
            $this->Flash->error(__('The employe could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
