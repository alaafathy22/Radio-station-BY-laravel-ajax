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

class Controller_get_when_Selected extends ControllerOOP
{
    public function get_when_Selected(Request $request)
    {
        if (!$this->fun_get_data()) {
            $allData = $this->allData;
            foreach ($allData as $value) {
                if ($value['id'] == $request->id_station) {
                    $file = $value['url'];
                    $file_headers = @get_headers($file);
                    if (!$file_headers || $file_headers[0] == 'HTTP/1.1 401 Unauthorized') {
                        return response()->json([
                            'con_link_station' => '#',
                            'id_station' => $value['id'],
                            'title_station' => $value['name'],
                            'status' => 'false',
                        ]);
                    } else {
                        return response()->json([
                            'con_link_station' => $value['url'],
                            'id_station' => $value['id'],
                            'title_station' => $value['name'],
                            'status' => 'true',

                        ]);
                    }
                }
            }
        }
    }
}
