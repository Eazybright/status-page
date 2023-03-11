<?php

namespace Eazybright\StatusPage\Commands;

use Illuminate\Console\Command;
use Illuminate\Routing\Router;

class GenerateRouteCommand extends Command
{
    public $signature = 'status-page:generate-route';

    public $description = 'This command crawls all your routes into a file.';

    public function handle(Router $route): int
    {
        $r = collect($route->getRoutes());
        $routes = '';

        foreach ($r as $value) {
            $uri = $value->uri();
            $method = $value->methods()[0];
            $actionName = $value->getActionName();

            // Remove the controller namespace 
            $actionName = str_replace("Controllers\\", "", substr($actionName, stripos($actionName, 'Controllers\\')));

            // Replace every occurrence of backlash with underscore
            $actionName = str_replace("\\", "_", $actionName);

            $content = $actionName." ".env('APP_URL')."/". $uri. " ".$method;
            $routes .= $content.PHP_EOL;
        }

        file_put_contents(public_path('urls.cfg'), $routes);
        $this->comment('All done');

        return self::SUCCESS;
    }
}
