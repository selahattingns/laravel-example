<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class DockerInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docker-install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Docker Install';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('migrate');
        $this->info(Artisan::output());

        Artisan::call('db:seed');
        $this->info(Artisan::output());
    }
}
