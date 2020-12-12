<?php

namespace App\Http\Livewire;


use App\Models\progs;
use DateTime;
use Livewire\Component;


class SelectProg extends Component
{
    public string $testvar;




    public function mount()
    {
        // -- ein Test
        $this->testvar = "testvar inhalt";


//        $users = User::whereRaw('age > ? and votes = 100', [25])->get();


        $tza = progs::all();
        $tzb = progs::where('type', 'data')->get();
        $tzc = progs::where('type', 'screen')->get();
        $tzd = progs::where([
            ['type', '=', 'data'],
            ['active', '=', true]
        ])
            ->orderBy('name', 'asc')
            ->get();
        $tze = progs::where('type', '=', 'data')
            ->where('active', '=', true)
            ->orderBy('name', 'asc')
            ->get();

        $tcounta = $tza->count();
        $tcountb = $tzb->count();
        $tcountc = $tzc->count();
        $tcountd = $tzd->count();
        $tcounte = $tze->count();

        $tg = Date('Y-m-d', mktime(0,0,0, 1,2,2020));

        $tzf = new progs();
        $tzf['type'] = 'data';
        $tzf['name'] = 'Pilze';
        $tzf['date'] = $tg;
        $tzf['active'] = false;
        $tzf['user'] = 'diana';
        $tzf['desc'] = 'keine Bemerkung';
        //$tzf->save();



        $a = 0;
    }

    public function render()
    {
        return view('livewire.select-prog');
    }
}
