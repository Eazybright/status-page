<?php

namespace Eazybright\StatusPage\Commands;

use Illuminate\Console\Command;

class CopyBashFileCommand extends Command
{
    public $signature = 'status-page:copy-script';

    public $description = 'This command curls all your routes';

    public function handle(): int
    {
        file_put_contents(base_path('health-check.sh'), file_get_contents(dirname(__FILE__.'/health-check.sh')));

        $this->comment('All done');

        return self::SUCCESS;
    }
}
