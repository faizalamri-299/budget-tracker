<?php

namespace App\Models;

use App\Traits\BelongsToUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;
    use BelongsToUser;
    protected $guarded = [];
    protected $casts = [
        'date_of_payment' => 'datetime',
    ];

    public function expense_type()
    {
        return $this->belongsTo(ExpenseType::class);
    }

    public static function getExpenses()
    {
        return self::where('user_id', auth()->user()->id)->sum('amount') ?? 0;
    }
}
