<?php

namespace Eazybright\StatusPage\Commands;

use Illuminate\Console\Command;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Storage;

class GenerateRouteCommand extends Command
{
    public $signature = 'status-page:generate-route';

    public $description = 'This command curls all your routes';

    public function handle(Router $route): int
    {
        $r = $route->getRoutes();
        $routes = '';
        foreach ($r as $value) {
            if(!str_starts_with($value->uri(), 'api')){
                $countent = str_replace("\\", "_", $value->getActionName()) ." ".env('APP_URL')."/". $value->uri(). " ".$value->methods()[0];
                $routes .= $countent.PHP_EOL;
            }
        }

        Storage::put('urls.cfg', $routes, true);
        $this->comment('All done');

        return self::SUCCESS;
    }
}
