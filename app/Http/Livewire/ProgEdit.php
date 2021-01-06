<?php

namespace App\Http\Livewire;

use App\Library\yamlData;
use Livewire\Component;

class ProgEdit extends Component
{
    public string $yamltext;

    public function render()
    {
        $this->yamltext = yamlData::ReadText('main');

        return view('livewire.prog-edit');
    }
}
