<?php

namespace App\Console\Commands;

use App\Models\Rule;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Fresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fresh';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('migrate:refresh');
        $this->info(Artisan::output());

        Artisan::call('db:seed');
        $this->info(Artisan::output());

        Rule::firstOrCreate([
            "rule_type_id" => 1,
            "rule_values" => "[1000,10]"
        ]);
        Rule::firstOrCreate([
            "rule_type_id" => 2,
            "rule_values" => "[2,6,1]"
        ]);
        Rule::firstOrCreate([
            "rule_type_id" => 3,
            "rule_values" => "[1,2,20]"
        ]);
    }
}
