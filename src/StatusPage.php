<?php

namespace Eazybright\StatusPage;

use Illuminate\Support\Facades\Storage;

class StatusPage
{
    public $routeListFileName;

    protected function getFileName()
    {
        $this->routeListFileName = Storage::url('urls.cfg');
        return $this->routeListFileName;
    }
}
