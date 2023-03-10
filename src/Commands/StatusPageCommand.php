<?php

namespace Eazybright\StatusPage\Commands;

use Illuminate\Console\Command;
use Eazybright\StatusPage\StatusPage;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Exception\ProcessTimedOutException;

class StatusPageCommand extends Command
{
    public $signature = 'status-page:create';

    public $description = 'Create status page';

    public function handle(): int
    {
        $filename = public_path('urls.cfg');
        $bashFile = base_path('health-check.sh');


        $process = new Process(['bash', $bashFile], null, [
            'FILENAME' => $filename,
            'LOG_DIRECTORY' => public_path('/vendor/status-page/logs')
        ]);
        $process->setTimeout(3600);

        try {
            $process->run(function ($type, $buffer) {
                if (Process::ERR === $type) {
                    $this->error('ERR > '.$buffer);
                } else {
                    $this->info('OUT > '.$buffer);
                }
            });
        } catch (ProcessFailedException $exception) {
            $this->error($exception->getMessage());
        }catch(ProcessTimedOutException $exception){
            $this->error('Process Timeout: '.$exception->getMessage());
        }

        $this->comment('All done');

        return self::SUCCESS;
    }
}
