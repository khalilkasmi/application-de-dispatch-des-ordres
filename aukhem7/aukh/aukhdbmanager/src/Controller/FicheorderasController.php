<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ficheorderas Controller
 *
 * @property \App\Model\Table\FicheorderasTable $Ficheorderas
 *
 * @method \App\Model\Entity\Ficheordera[] paginate($object = null, array $settings = [])
 */
class FicheorderasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $ficheorderas = $this->paginate($this->Ficheorderas);

        $this->set(compact('ficheorderas'));
        $this->set('_serialize', ['ficheorderas']);
    }

    /**
     * View method
     *
     * @param string|null $id Ficheordera id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ficheordera = $this->Ficheorderas->get($id, [
            'contain' => []
        ]);

        $this->set('ficheordera', $ficheordera);
        $this->set('_serialize', ['ficheordera']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ficheordera = $this->Ficheorderas->newEntity();
        if ($this->request->is('post')) {
            $ficheordera = $this->Ficheorderas->patchEntity($ficheordera, $this->request->getData());
            if ($this->Ficheorderas->save($ficheordera)) {
                $this->Flash->success(__('The ficheordera has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficheordera could not be saved. Please, try again.'));
        }
        $this->set(compact('ficheordera'));
        $this->set('_serialize', ['ficheordera']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ficheordera id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ficheordera = $this->Ficheorderas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ficheordera = $this->Ficheorderas->patchEntity($ficheordera, $this->request->getData());
            if ($this->Ficheorderas->save($ficheordera)) {
                $this->Flash->success(__('The ficheordera has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficheordera could not be saved. Please, try again.'));
        }
        $this->set(compact('ficheordera'));
        $this->set('_serialize', ['ficheordera']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ficheordera id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ficheordera = $this->Ficheorderas->get($id);
        if ($this->Ficheorderas->delete($ficheordera)) {
            $this->Flash->success(__('The ficheordera has been deleted.'));
        } else {
            $this->Flash->error(__('The ficheordera could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
