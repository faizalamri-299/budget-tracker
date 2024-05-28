<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index(Request $request)
    {
        return view('dashboard.index', [
            'expensesDistribution' => $this->calculateExpensesDistribution(),
            'budgetLeft' => $this->calculateBudgetPercentageLeft(),
            'budget' => auth()->user()->budget?->amount
        ]);
    }

    public function calculateExpensesDistribution()
    {
        //need to return value in array category => value
        $expenses = Expense::withoutGlobalScopes()
            ->join('expense_types', 'expenses.expense_type_id', '=', 'expense_types.id')
            ->selectRaw('expense_type_id, expense_types.name as expense_type_name, MAX(expenses.id) as id, SUM(expenses.amount) as total_amount')
            ->where('expenses.user_id', Auth::id())
            ->groupBy('expense_type_id', 'expense_types.name')
            ->get();

        $expenseData = $expenses->map(function ($expense) {
            return [
                'x' => $expense->expense_type->name,
                'y' => $expense->total_amount ?? 0,
            ];
        });

        return json_encode($expenseData);
    }

    public function calculateBudgetPercentageLeft()
    {
        $budgetAmount = Auth::user()->budget->amount;
        $expenses = Expense::getExpenses();
        $remainingPercentage = number_format(100 - (($expenses / $budgetAmount) * 100), 2);

        return [$remainingPercentage, $expenses];
    }
}
