<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter = 1;
    public function increament()
    {
        $this->counter++;
    }
    public function decreament()
    {
        $this->counter--;

    }
    public function render()
    {
        return view('livewire.counter');
    }
}