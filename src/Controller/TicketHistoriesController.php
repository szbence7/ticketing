<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TicketHistories Controller
 *
 * @property \App\Model\Table\TicketHistoriesTable $TicketHistories
 */
class TicketHistoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->TicketHistories->find()
            ->contain(['Tickets', 'Statuses']);
        $ticketHistories = $this->paginate($query);

        $this->set(compact('ticketHistories'));
    }

    /**
     * View method
     *
     * @param string|null $id Ticket History id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticketHistory = $this->TicketHistories->get($id, contain: ['Tickets', 'Statuses']);
        $this->set(compact('ticketHistory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticketHistory = $this->TicketHistories->newEmptyEntity();
        if ($this->request->is('post')) {
            $ticketHistory = $this->TicketHistories->patchEntity($ticketHistory, $this->request->getData());
            if ($this->TicketHistories->save($ticketHistory)) {
                $this->Flash->success(__('The ticket history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket history could not be saved. Please, try again.'));
        }
        $tickets = $this->TicketHistories->Tickets->find('list', limit: 200)->all();
        $statuses = $this->TicketHistories->Statuses->find('list', limit: 200)->all();
        $this->set(compact('ticketHistory', 'tickets', 'statuses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket History id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticketHistory = $this->TicketHistories->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticketHistory = $this->TicketHistories->patchEntity($ticketHistory, $this->request->getData());
            if ($this->TicketHistories->save($ticketHistory)) {
                $this->Flash->success(__('The ticket history has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket history could not be saved. Please, try again.'));
        }
        $tickets = $this->TicketHistories->Tickets->find('list', limit: 200)->all();
        $statuses = $this->TicketHistories->Statuses->find('list', limit: 200)->all();
        $this->set(compact('ticketHistory', 'tickets', 'statuses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket History id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticketHistory = $this->TicketHistories->get($id);
        if ($this->TicketHistories->delete($ticketHistory)) {
            $this->Flash->success(__('The ticket history has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket history could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
