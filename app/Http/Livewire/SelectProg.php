<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SelectProg extends Component
{
    public string $testvar;

    public function mount()
    {
        $this->testvar = "testvar inhalt";
    }

    public function render()
    {
        return view('livewire.select-prog');
    }
}
