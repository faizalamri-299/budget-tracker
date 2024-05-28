<?php

namespace App\Traits;

use App\Models\Scopes\ExpenseScope;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Scopes\ReadingActivityScope;
use Illuminate\Contracts\Database\Query\Builder;

trait BelongsToUser
{
    public static function boot()
    {
        $userId = Auth::user()?->id;

        if ($userId) {
            static::addGlobalScope(new ExpenseScope());

            static::creating(function ($model) use ($userId) {
                $model->user_id = $userId;
            });
        }

        parent::boot();
    }
}
