<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class CurrencySeed extends Seeder
{
    public function run(): void
    {
        $countDays = (int)Carbon::now()->diffInDays(Carbon::now()->startOfMonth()->subMonth(),true);

        while ($countDays-- > 0) {
            Artisan::call("app:set-currency-command $countDays");
        }
    }
}
