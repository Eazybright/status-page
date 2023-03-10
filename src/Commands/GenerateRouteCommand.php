<?php

namespace Eazybright\StatusPage\Commands;

use Illuminate\Console\Command;
use Illuminate\Routing\Router;

class GenerateRouteCommand extends Command
{
    public $signature = 'status-page:generate-route';

    public $description = 'This command curls all your routes';

    public function handle(Router $route): int
    {
        $r = collect($route->getRoutes());
        $routes = '';
        foreach ($r as $value) {
            if(!str_starts_with($value->uri(), 'api')){
                $countent = str_replace("\\", "_", $value->getActionName()) ." ".env('APP_URL')."/". $value->uri(). " ".$value->methods()[0];
                $routes .= $countent.PHP_EOL;
            }
        }

        file_put_contents(public_path('urls.cfg'), $routes);
        $this->comment('All done');

        return self::SUCCESS;
    }
}
