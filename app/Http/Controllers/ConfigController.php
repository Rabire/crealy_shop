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
        return back()->with('success', 'Mise à jour réussie');
        
    }


    public function index() {
        return view('administration/index', [
            'general_infos' => $this->db_general_infos(),
            'articles' => $this->db_article_list()
        ]);
    }


    function filter(Request $request) {

        $filter = $request->get('filter');

        //dump($filter);

        if ($filter == 1) {
            $produits_actifs = article::where('status', '=', '1')->get()->toarray();
            //dump($produits_actifs);
            return view('administration/index', [
                'general_infos' => $this->db_general_infos(),
                'articles' => $produits_actifs
            ]);
        } else if ($filter == 0) {
            $produits_inactifs = article::where('status', '=', '0')->get()->toarray();
            //dump($produits_inactifs);
            return view('administration/index', [
                'general_infos' => $this->db_general_infos(),
                'articles' => $produits_inactifs
            ]);

        } else {
            return $this->index();
        }

    }


}
