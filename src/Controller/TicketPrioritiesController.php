<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TicketPriorities Controller
 *
 * @property \App\Model\Table\TicketPrioritiesTable $TicketPriorities
 */
class TicketPrioritiesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->TicketPriorities->find();
        $ticketPriorities = $this->paginate($query);

        $this->set(compact('ticketPriorities'));
    }

    /**
     * View method
     *
     * @param string|null $id Ticket Priority id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticketPriority = $this->TicketPriorities->get($id, contain: []);
        $this->set(compact('ticketPriority'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticketPriority = $this->TicketPriorities->newEmptyEntity();
        if ($this->request->is('post')) {
            $ticketPriority = $this->TicketPriorities->patchEntity($ticketPriority, $this->request->getData());
            if ($this->TicketPriorities->save($ticketPriority)) {
                $this->Flash->success(__('The ticket priority has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket priority could not be saved. Please, try again.'));
        }
        $this->set(compact('ticketPriority'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket Priority id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticketPriority = $this->TicketPriorities->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticketPriority = $this->TicketPriorities->patchEntity($ticketPriority, $this->request->getData());
            if ($this->TicketPriorities->save($ticketPriority)) {
                $this->Flash->success(__('The ticket priority has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket priority could not be saved. Please, try again.'));
        }
        $this->set(compact('ticketPriority'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket Priority id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticketPriority = $this->TicketPriorities->get($id);
        if ($this->TicketPriorities->delete($ticketPriority)) {
            $this->Flash->success(__('The ticket priority has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket priority could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
