<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General;

class ConfigController extends Controller
{

    private function db_general_infos() {
        $general_infos = General::all()->first()->toArray();
        //dump($general_infos);
        return $general_infos;
    }

        

    function setdelay(Request $request)
    {
        $delay = $request->input('delay');
        
        $db_info = General::find(1);

        $db_info->delay = $delay;
        $db_info->save();
        return back();
        
    }


    public function index() {
        return view('administration/index', [
            'general_infos' => $this->db_general_infos()
        ]);
    }
}
