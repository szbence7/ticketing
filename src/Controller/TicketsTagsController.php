<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TicketsTags Controller
 *
 * @property \App\Model\Table\TicketsTagsTable $TicketsTags
 */
class TicketsTagsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->TicketsTags->find()
            ->contain(['Tickets', 'Tags']);
        $ticketsTags = $this->paginate($query);

        $this->set(compact('ticketsTags'));
    }

    /**
     * View method
     *
     * @param string|null $id Tickets Tag id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticketsTag = $this->TicketsTags->get($id, contain: ['Tickets', 'Tags']);
        $this->set(compact('ticketsTag'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticketsTag = $this->TicketsTags->newEmptyEntity();
        if ($this->request->is('post')) {
            $ticketsTag = $this->TicketsTags->patchEntity($ticketsTag, $this->request->getData());
            if ($this->TicketsTags->save($ticketsTag)) {
                $this->Flash->success(__('The tickets tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tickets tag could not be saved. Please, try again.'));
        }
        $tickets = $this->TicketsTags->Tickets->find('list', limit: 200)->all();
        $tags = $this->TicketsTags->Tags->find('list', limit: 200)->all();
        $this->set(compact('ticketsTag', 'tickets', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Tickets Tag id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticketsTag = $this->TicketsTags->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticketsTag = $this->TicketsTags->patchEntity($ticketsTag, $this->request->getData());
            if ($this->TicketsTags->save($ticketsTag)) {
                $this->Flash->success(__('The tickets tag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The tickets tag could not be saved. Please, try again.'));
        }
        $tickets = $this->TicketsTags->Tickets->find('list', limit: 200)->all();
        $tags = $this->TicketsTags->Tags->find('list', limit: 200)->all();
        $this->set(compact('ticketsTag', 'tickets', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Tickets Tag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticketsTag = $this->TicketsTags->get($id);
        if ($this->TicketsTags->delete($ticketsTag)) {
            $this->Flash->success(__('The tickets tag has been deleted.'));
        } else {
            $this->Flash->error(__('The tickets tag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
