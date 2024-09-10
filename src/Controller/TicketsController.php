<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;

/**
 * Tickets Controller
 *
 * @property \App\Model\Table\TicketsTable $Tickets
 */
class TicketsController extends AppController
{
    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        
        // Allow unauthenticated access to the index and add actions
        $this->UsersAuth->setConfig('authenticate', [
            'actions' => ['index', 'add'],
            'enabled' => false
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Tickets->find()
            ->contain(['Users', 'Categories', 'TicketPriorities', 'Statuses', 'Tags']);
        $tickets = $this->paginate($query);

        $this->set(compact('tickets'));
    }

    /**
     * View method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ticket = $this->Tickets->get($id, [
            'contain' => [
                'Users', 
                'Categories', 
                'TicketPriorities', 
                'Statuses',
                'TicketHistories' => [
                    'sort' => ['TicketHistories.changed_at' => 'ASC'],
                    'Statuses'
                ],
                'Tags'
            ],
        ]);

        $this->set(compact('ticket'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ticket = $this->Tickets->newEmptyEntity();
        if ($this->request->is('post')) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
            
            // Set the user_id to the current logged-in user's id, if available
            $user = $this->request->getAttribute('identity');
            if ($user) {
                $ticket->user_id = $user->id;
            }
            
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
        $categories = $this->Tickets->Categories->find('list', ['limit' => 200])->all();
        $ticketPriorities = $this->Tickets->TicketPriorities->find('list', ['limit' => 200])->all();
        $statuses = $this->Tickets->Statuses->find('list', ['limit' => 200])->all();
        $tags = $this->Tickets->Tags->find('list', ['limit' => 200])->all();
        $this->set(compact('ticket', 'categories', 'ticketPriorities', 'statuses', 'tags'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ticket = $this->Tickets->get($id, contain: ['Tags']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ticket = $this->Tickets->patchEntity($ticket, $this->request->getData());
            if ($this->Tickets->save($ticket)) {
                $this->Flash->success(__('The ticket has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ticket could not be saved. Please, try again.'));
        }
        $users = $this->Tickets->Users->find('list', limit: 200)->all();
        $categories = $this->Tickets->Categories->find('list', limit: 200)->all();
        $ticketPriorities = $this->Tickets->TicketPriorities->find('list', limit: 200)->all();
        $statuses = $this->Tickets->Statuses->find('list', limit: 200)->all();
        $tags = $this->Tickets->Tags->find('list', limit: 200)->all();
        $this->set(compact('ticket', 'users', 'categories', 'ticketPriorities', 'statuses', 'tags'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ticket id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ticket = $this->Tickets->get($id);
        if ($this->Tickets->delete($ticket)) {
            $this->Flash->success(__('The ticket has been deleted.'));
        } else {
            $this->Flash->error(__('The ticket could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function assign($id = null)
    {
        $ticket = $this->Tickets->get($id);
        $assignment = $this->Tickets->Assignments->newEmptyEntity();
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['ticket_id'] = $id;
            $data['assigned_by'] = null; // We're allowing this to be null now
            $data['assigned_at'] = date('Y-m-d H:i:s');
            $assignment = $this->Tickets->Assignments->patchEntity($assignment, $data);
            
            if ($this->Tickets->Assignments->save($assignment)) {
                $this->Flash->success(__('The ticket has been assigned.'));
                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The ticket could not be assigned. Please, try again.'));
            // Keep this line to see detailed error messages
            $this->Flash->error(print_r($assignment->getErrors(), true));
        }
        
        // Fetch the list of users for the dropdown
        $users = $this->Tickets->Assignments->AssignedUsers->find('list', [
            'keyField' => 'id',
            'valueField' => 'username'
        ])->toArray();
        
        $this->set(compact('ticket', 'assignment', 'users'));
    }

    public function addReply($id = null)
    {
        $this->request->allowMethod(['post']);
        $ticket = $this->Tickets->get($id, ['contain' => ['Statuses']]);
        
        $user = $this->getRequest()->getAttribute('identity');
        $changed_by = $user ? $user->id : null;
        
        $ticketHistory = $this->Tickets->TicketHistories->newEntity([
            'ticket_id' => $id,
            'status_id' => $ticket->status_id,
            'changed_by' => $changed_by,
            'changed_at' => date('Y-m-d H:i:s'),
            'reply_content' => $this->request->getData('reply_content')
        ]);
        
        if ($this->Tickets->TicketHistories->save($ticketHistory)) {
            $this->Flash->success(__('Your reply has been added.'));
        } else {
            $this->Flash->error(__('Unable to add reply. Please, try again.'));
            $this->Flash->error(print_r($ticketHistory->getErrors(), true));
        }
        return $this->redirect(['action' => 'view', $id]);
    }
}
