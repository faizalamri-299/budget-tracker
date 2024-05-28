<?php

namespace App\Livewire\Budget;

use App\Models\Budget;
use Livewire\Component;

class Form extends Component
{
    public $amount;
    protected $rules = [
        'amount' => 'required',
    ];

    public function mount()
    {
        $this->amount = auth()->user()->budget?->amount;
    }
    public function render()
    {
        return view('livewire.budget.form');
    }

    public function save()
    {
        $data = $this->validate();

        Budget::updateOrCreate(
            ['user_id' => auth()->user()->id],
            $data
        );

        return to_route('home');
    }
}
