<?php

namespace App\Livewire\Expense;

use App\Models\Expense;
use Carbon\Carbon;
use Livewire\Component;

class Form extends Component
{
    public $expenseId = null;
    public $expense_type_id;
    public $date_of_payment;
    public $description;
    public $amount;
    public $budget;

    protected function rules()
    {
        return [
            'expense_type_id' => 'required',
            'date_of_payment' => 'required',
            'description' => 'required',
            'amount' => 'required|lt:'.$this->budget,
        ];
    }

    public function mount($expense)
    {
        if($expense) {
            $this->expenseId = $expense->id;
            $this->expense_type_id = $expense->expense_type_id;
            $this->date_of_payment = $expense->date_of_payment->format('d/m/Y');
            $this->amount = $expense->amount;
            $this->description = $expense->description;
        }
        $this->budget = auth()->user()->budget->amount - Expense::where('user_id', auth()->user()->id)->sum('amount');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.expense.form');
    }

    public function save($expenseId = null)
    {
        $validated = $this->validate();

        // Format the date_of_payment to 'Y-m-d'
        $validated['date_of_payment'] = Carbon::createFromFormat('d/m/Y', $this->date_of_payment)->format('Y-m-d');

        $data = [
            'id' => $expenseId
        ];
        Expense::updateOrCreate($data, $validated);

        return to_route('expense.index');
    }
}
