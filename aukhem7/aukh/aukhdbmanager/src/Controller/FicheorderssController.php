<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ficheorderss Controller
 *
 * @property \App\Model\Table\FicheorderssTable $Ficheorderss
 *
 * @method \App\Model\Entity\Ficheorders[] paginate($object = null, array $settings = [])
 */
class FicheorderssController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $ficheorderss = $this->paginate($this->Ficheorderss);

        $this->set(compact('ficheorderss'));
        $this->set('_serialize', ['ficheorderss']);
    }

    /**
     * View method
     *
     * @param string|null $id Ficheorders id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ficheorders = $this->Ficheorderss->get($id, [
            'contain' => []
        ]);

        $this->set('ficheorders', $ficheorders);
        $this->set('_serialize', ['ficheorders']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ficheorders = $this->Ficheorderss->newEntity();
        if ($this->request->is('post')) {
            $ficheorders = $this->Ficheorderss->patchEntity($ficheorders, $this->request->getData());
            if ($this->Ficheorderss->save($ficheorders)) {
                $this->Flash->success(__('The ficheorders has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficheorders could not be saved. Please, try again.'));
        }
        $this->set(compact('ficheorders'));
        $this->set('_serialize', ['ficheorders']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ficheorders id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ficheorders = $this->Ficheorderss->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ficheorders = $this->Ficheorderss->patchEntity($ficheorders, $this->request->getData());
            if ($this->Ficheorderss->save($ficheorders)) {
                $this->Flash->success(__('The ficheorders has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficheorders could not be saved. Please, try again.'));
        }
        $this->set(compact('ficheorders'));
        $this->set('_serialize', ['ficheorders']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ficheorders id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ficheorders = $this->Ficheorderss->get($id);
        if ($this->Ficheorderss->delete($ficheorders)) {
            $this->Flash->success(__('The ficheorders has been deleted.'));
        } else {
            $this->Flash->error(__('The ficheorders could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
