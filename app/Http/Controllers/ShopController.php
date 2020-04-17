<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\article;
use App\General;
use DateTime;

class ShopController extends Controller
{
    private function db_article_list() {
        $produits = article::all()->toArray();
        return $produits;
    }

    private function db_general_infos() {
        $general_infos = General::all()->first()->toArray();
        //dump($general_infos);
        return $general_infos;
    }

    public function index() {
        return view('shop', [
            'articles' => $this->db_article_list()
        ]);
    }


    public static function availiableDate($id) {
        $general_infos = General::all()->first()->toArray();

        $article_array = article::where('id', $id)->get()->toArray();
        foreach($article_array as $article) {
            $manufacture_time = $article['manufacture_time'];
        }
        
        $current_manufacture = date("Y-m-d", strtotime("+" . $manufacture_time . " day"));
        $current_manufacture_delay = date('Y-m-d',strtotime($current_manufacture . "+" . $general_infos['delay'] . " days"));

        $jour_semaine = array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
        $jours_dmY = (new DateTime($current_manufacture_delay))->format('d/m/Y');
        $jours_w = (new DateTime($current_manufacture_delay))->format('w');
        $jours_fr = $jour_semaine[$jours_w];

        return $jour_semaine[$jours_w] . " " . $jours_dmY;
    }

}