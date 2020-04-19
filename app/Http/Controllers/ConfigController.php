<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\General;
use App\article;

class ConfigController extends Controller
{

    private function db_general_infos() {
        $general_infos = General::all()->first()->toArray();
        //dump($general_infos);
        return $general_infos;
    }

    private function db_article_list() {
        $produits = article::all()->toArray();
        return $produits;
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
            'general_infos' => $this->db_general_infos(),
            'articles' => $this->db_article_list()
        ]);
    }

}
