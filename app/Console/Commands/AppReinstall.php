<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AppReinstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reinstall';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reinstall the whole app. WILL WIPE ALL YOUR DATA.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->confirm('Are you sure you want to reinstall this application? You will lose all data stored in the database! [yes|no]')) {
          // First reset data
          $this->info('Reseting DB...');

          $this->call('migrate:reset');

          $this->info('Done!');

          // Now install it again
          $this->call('app:install');
        }
    }
}
