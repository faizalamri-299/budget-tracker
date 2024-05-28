<?php

namespace App\Livewire;

use App\Models\Expense;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;

class ExpensesTable extends DataTableComponent
{
    protected $model = Expense::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setConfigurableArea('toolbar-right-end', 'components.buttons.create');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id"),
            DateColumn::make("Date of Payment", "date_of_payment")
                ->inputFormat('Y-m-d H:i:s')
                ->outputFormat('d/m/Y'),
            Column::make("type", "expense_type.name")
                ->sortable(),
            Column::make("amount", "amount")
                ->sortable(),
            Column::make("description", "description")
                ->sortable(),
            Column::make('Action')
            ->label(
                fn ($row, Column $column) => view('components.datatables.action-column')->with(
                    [
                        'editLink' => route('expense.edit', $row),
                        'deleteLink' => route('expense.destroy', $row),
                    ]
                )
            )->html(),
        ];
    }
}
