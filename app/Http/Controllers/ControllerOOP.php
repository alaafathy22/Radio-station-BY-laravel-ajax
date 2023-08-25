<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class ControllerOOP extends BaseController
{
    public $response;
    public $allData_before_add;
    public $arr_for_cairo_radio;
    public $allData;

    function fun_get_data()
    {
        try {
            $this->response = Http::get('https://www.mp3quran.net/api/v3/radios?language=ar');
            $this->allData_before_add = $this->response['radios'];
            $this->arr_for_cairo_radio = [
                [
                    'id' => '444',
                    'name' => 'اذاعة القرآن الكريم من القاهرة مباشر',
                    'url' => 'https://stream.radiojar.com/8s5u5tpdtwzuv'
                ]
            ];
            $this->allData = array_merge($this->allData_before_add, $this->arr_for_cairo_radio);
            $this->allData = array_reverse($this->allData);
        } catch (Exception $e) {
            return 'sorry you have error on network';
        }
    }
}
