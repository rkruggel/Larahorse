<?php

namespace App\Http\Livewire;


use DateTime;
use Livewire\Component;
use MongoDB;

class SelectProg extends Component
{
    public string $testvar;




    public function mount()
    {
        // -- ein Test
        $this->testvar = "testvar inhalt";

        // -- daten aus der DB holen
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $db =  $client->Larahorse;

        $collection = $db->progs;
        $er = $collection->find(['active' => true]);

        $atti = [];
        foreach ($er as $dbb) {
            array_push($atti, $dbb);
        }


        $a = 0;
    }

    public function render()
    {
        return view('livewire.select-prog');
    }
}
