<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SetCurrencyCommand extends Command
{
    protected $signature = 'app:set-currency-command {subDay=0}';

    protected $description = 'Command description';

    public function handle(): void
    {
        $date = Carbon::now()->subDays($this->argument('subDay'));

        $currencies = Http::get('https://api.nbrb.by/exrates/rates', [
            'periodicity' => 0,
            'ondate' => $date->format('Y-m-d')
        ])->collect()->transform(fn($item) => [
            $item['Cur_Abbreviation'] => round($item['Cur_OfficialRate'] / $item['Cur_Scale'],9)
        ])->collapse();

        Currency::query()->updateOrCreate(['date' => $date], ['currencies' => $currencies]);
    }
}
