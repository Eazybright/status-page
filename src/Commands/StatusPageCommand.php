<?php

namespace Eazybright\StatusPage\Commands;

use Illuminate\Console\Command;
use Eazybright\StatusPage\StatusPage;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class StatusPageCommand extends Command
{
    public $signature = 'status-page:create';

    public $description = 'Create status page';

    public function handle()
    {
        $filename = Storage::url('app/urls.cfg');
        putenv("FILENAME=$filename");

        $this->comment('filename:'.$filename);
        $bashFile = base_path('health-check.sh');
        $this->comment('bashFile:'.$bashFile);


        $process = new Process(['/bin/bash', $bashFile], null, ['FILENAME' =>$filename]);
        try {
            $process->mustRun();
        
            echo $process->getOutput();
        } catch (ProcessFailedException $exception) {
            echo $exception->getMessage();
        }
        // $bashFile = dirname(__FILE__.'/health-check.sh');
        // $process = Process::fromShellCommandline('bash '.$bashFile);

        // $processOutput = '';

        // $captureOutput = function ($type, $line) use (&$processOutput) {
        //     $processOutput .= $line;
        // };

        // $process->setTimeout(null)
        //     ->run($captureOutput);

        // if ($process->getExitCode()) {
        //     $exception = new \Exception($processOutput);
        //     report($exception);

        //     throw $exception;
        // }

        // $this->comment('All done - '.$processOutput);

        // return self::SUCCESS;
    }
}
