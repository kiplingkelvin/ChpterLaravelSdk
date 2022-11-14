<?php

namespace KiplingKelvin\ChpterLaravelSdk\Console;

use Illuminate\Console\Command;

class InstallChpter extends Command
{
    protected $signature = "chpter:install";

    protected $description = "Install Chpter package";

    public function handle()
    {
        $this->info('Installing Chpter for Laravel ...');
        $this->info('Publishing Configuration...');

        $this->call('vendor:publish', [
      '--provider' => "KiplingKelvin\ChpterLaravelSdk\ChpterServiceProvider",
      '--tag' => "chpter-config"
    ]);

        $this->info('Installed Chpter for Laravel');
    }
}
