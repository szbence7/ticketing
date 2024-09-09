<?php
namespace App\Controller;

use App\Controller\AppController;

class AdminDashboardController extends AppController
{
    public function index()
    {
        $ticketsTable = $this->getTableLocator()->get('Tickets');
        try {
            $totalTickets = $ticketsTable->find()->count();
            $openTickets = $ticketsTable->find()
                ->where(['Statuses.status_name !=' => 'resolved'])
                ->contain(['Statuses'])
                ->count();
            $closedTickets = $ticketsTable->find()
                ->where(['Statuses.status_name' => 'resolved'])
                ->contain(['Statuses'])
                ->count();
        } catch (\Exception $e) {
            $this->Flash->error('Error fetching ticket statistics: ' . $e->getMessage());
            $totalTickets = $openTickets = $closedTickets = 'Error';
        }

        $this->set(compact('totalTickets', 'openTickets', 'closedTickets'));
    }
}
