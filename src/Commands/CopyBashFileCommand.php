<?php

namespace Eazybright\StatusPage\Commands;

use Illuminate\Console\Command;

class CopyBashFileCommand extends Command
{
    public $signature = 'status-page:copy-script';

    public $description = 'This command curls all your routes';

    public function handle(): int
    {
        $scriptName = 'health-check.sh';
        
        file_put_contents(base_path('health-check.sh'), file_get_contents(ROOTPATH.'/'.$scriptName));

        $this->comment($scriptName.' file copied to your root folder');

        return self::SUCCESS;
    }
}
