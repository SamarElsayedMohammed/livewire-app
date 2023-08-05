<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class Tickets extends Component
{
    public $tickets;
    public $active = 1;
    protected $listeners = ['ticketSelected'];
    public function ticketSelected($id)
    {
        $this->active = $id;
    }
    public function render()
    {
        $this->tickets = Ticket::all();
        return view('livewire.tickets');
    }
}