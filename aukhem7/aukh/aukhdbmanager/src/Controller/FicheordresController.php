<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ficheordres Controller
 *
 * @property \App\Model\Table\FicheordresTable $Ficheordres
 *
 * @method \App\Model\Entity\Ficheordre[] paginate($object = null, array $settings = [])
 */
class FicheordresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $ficheordres = $this->paginate($this->Ficheordres);

        $this->set(compact('ficheordres'));
        $this->set('_serialize', ['ficheordres']);
    }

    /**
     * View method
     *
     * @param string|null $id Ficheordre id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ficheordre = $this->Ficheordres->get($id, [
            'contain' => []
        ]);

        $this->set('ficheordre', $ficheordre);
        $this->set('_serialize', ['ficheordre']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ficheordre = $this->Ficheordres->newEntity();
        if ($this->request->is('post')) {
            $ficheordre = $this->Ficheordres->patchEntity($ficheordre, $this->request->getData());
            if ($this->Ficheordres->save($ficheordre)) {
                $this->Flash->success(__('The ficheordre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficheordre could not be saved. Please, try again.'));
        }
        $this->set(compact('ficheordre'));
        $this->set('_serialize', ['ficheordre']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ficheordre id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ficheordre = $this->Ficheordres->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ficheordre = $this->Ficheordres->patchEntity($ficheordre, $this->request->getData());
            if ($this->Ficheordres->save($ficheordre)) {
                $this->Flash->success(__('The ficheordre has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ficheordre could not be saved. Please, try again.'));
        }
        $this->set(compact('ficheordre'));
        $this->set('_serialize', ['ficheordre']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ficheordre id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ficheordre = $this->Ficheordres->get($id);
        if ($this->Ficheordres->delete($ficheordre)) {
            $this->Flash->success(__('The ficheordre has been deleted.'));
        } else {
            $this->Flash->error(__('The ficheordre could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
