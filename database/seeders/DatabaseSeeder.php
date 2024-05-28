<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\ExpenseType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'User Name',
            'email' => 'test@gmail.com',
        ]);

        DB::table('expense_types')->insert([
            ['name' => 'Rent'],
            ['name' => 'Utilities'],
            ['name' => 'Groceries'],
            ['name' => 'Transportation'],
            ['name' => 'Insurance'],
            ['name' => 'Medical'],
            ['name' => 'Entertainment'],
            ['name' => 'Dining Out'],
            ['name' => 'Travel'],
            ['name' => 'Education'],
            ['name' => 'Clothing'],
            ['name' => 'Savings'],
            ['name' => 'Investments'],
            ['name' => 'Personal Care'],
            ['name' => 'Debt Repayment'],
            ['name' => 'Miscellaneous'],
            ['name' => 'Subscriptions'],
            ['name' => 'Taxes'],
            ['name' => 'Charity'],
            ['name' => 'Gifts'],
        ]);

    }
}
