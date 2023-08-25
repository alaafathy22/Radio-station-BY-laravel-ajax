<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ControllerOOP;

class Controller_HomePage extends ControllerOOP
{
    public function get_data()
    {
        if (!$this->fun_get_data()) {
            $allData = $this->allData;
            return view('home_page', compact('allData'));
        } else {
            return view('./layouts/error_page');
        }
    }
}
