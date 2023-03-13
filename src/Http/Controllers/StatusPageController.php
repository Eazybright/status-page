<?php

namespace Eazybright\StatusPage\Http\Controllers;

use Illuminate\Routing\Controller;

class StatusPageController extends Controller
{
    public function index()
    {
        return view('status-page::status-page');
    }
}
