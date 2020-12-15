<?php

namespace App\Http\Livewire;


use App\Models\pusers;
use Illuminate\Database\Eloquent\Collection;
use App\Models\progs;
use DateTime;
use Illuminate\Support\Facades\Config;
use Livewire\Component;
use MongoDB\BSON\ObjectId;
use MongoDB\Driver\Session;


class SelectProg extends Component
{
    public array $testvar;

    /**
     * @var Collection
     */
    public Collection $proglists;

    /**
     * @var \MongoDB\BSON\ObjectId
     */
    public ObjectId $progid;

    /**
     * @var string
     */
    public string $progname = "";




    private function test()
    {
        // $users = User::whereRaw('age > ? and votes = 100', [25])->get();
        $tza = progs::all();
        $tzb = progs::where('itype', 'data')->get();
        $tzc = progs::where('itype', 'screen')->get();
        $tzd = progs::where([
            ['itype', '=', 'data'],
            ['active', '=', true]
        ])
            ->orderBy('name', 'asc')
            ->get();
        $tze = progs::where('itype', '=', 'data')
            ->where('active', '=', true)
            ->orderBy('name', 'asc')
            ->get();

        $tcounta = $tza->count();       // 7
        $tcountb = $tzb->count();       // 6
        $tcountc = $tzc->count();       // 1
        $tcountd = $tzd->count();       // 4
        $tcounte = $tze->count();       // 4



        $pilz = progs::where('name', 'Pilze')->first();
        if(!$pilz) {
            $tg = Date('Y-m-d', mktime(0, 0, 0, 1, 2, 2020));
            $tzf = new progs();
            $tzf['type'] = 'data';
            $tzf['name'] = 'Pilze';
            $tzf['date'] = $tg;
            $tzf['active'] = false;
            $tzf['user'] = 'diana';
            $tzf['desc'] = 'keine Bemerkung';
            $tzf->save();
        }


        $rt = progs::where('name', 'ich')->first();
        $rt->active = false;
        $rt->save();

        $a=0;
    }


//    protected function getListeners(): array
//    {
//        return ['saveProg'];
//    }


    /**
     * @param $id
     */
    public function wndProgShow()   //$id)
    {
//        $puser = pusers::where('id', $id)->first();
//        $this->telefons = $puser->jtelefon;
        $a=0;
    }






    public function add()
    {
        $a=0;
    }

    public function delete()
    {
        $a=0;
    }

    public function edit()
    {
        $a=0;
    }

    public function editall()
    {
        $a=0;
    }

    public function clear()
    {
        $this->progname = "";
    }




    public function saveProg($value)
    {
        // den prognamen setzen
        $this->progname = $value;


        $a=0;

        Config::set('lara.progname', $value);
        $t = Config::get('lara.progname');

        $a=0;
    }


    public function mount()
    {
        // -- ein Test
        $this->testvar = ['Prog', 'Liste'];

        // test
//        $this->test();

        // Daten suchen

        /**
         *
         */
        $this->proglists = progs::where('itype', '=', 'data')
            ->where('active', '=', true)
            ->orderBy('name', 'asc')
            ->get();


        $a = 0;
        $FF = $this->emit('saveProg');

    }

    /**
     * @return \MongoDB\BSON\ObjectId
     */
    private function zsakah()
    {
        return $this->proglists->_id;
    }


    public function render()
    {
        return view('livewire.select-prog');
    }
}
