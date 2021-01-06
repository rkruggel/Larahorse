<?php

namespace App\Http\Livewire;

use App\Models\progs;

use Kdion4891\LaravelLivewireForms\ArrayField;
use Kdion4891\LaravelLivewireForms\Field;
use Kdion4891\LaravelLivewireForms\FormComponent;

class ProgCreateForm extends FormComponent
{
//    protected
    public function fields()
    {
        return [
            Field::make('Progname', 'name')->input()->rules('required'),
            Field::make('Datum','date')->input()->placeholder('dd.mm.yyyy')->rules('required'),
            Field::make('Aktiv', 'active')->checkbox(['aktive', 'wartend', 'deaktiviert'])->placeholder('ist das programm aktive?')->rules('required|min:2'),
            Field::make('User', 'user')->input(),
            Field::make('Beschreibung', 'desc')->textarea(),
            Field::make('Colors')->select(['Red', 'Green', 'Blue']),

        ];
    }

    public function success()
    {
        progs::create($this->form_data);
    }

    public function saveAndStayResponse()
    {
        return redirect()->route('progs.create');
    }

    public function saveAndGoBackResponse()
    {
        return redirect()->route('progs.index');
    }
}
