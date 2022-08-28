<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MinuteData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commande Artisan pour insérer données chaque minutes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        exec('php script.php');
    }
}
