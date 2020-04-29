<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;


class AddController extends Controller
{
    function index() {
        return view('administration/add', [
        ]);
    }

    function SubmitArticle() {

        request()->validate([
            'name' => 'required',
            'image' => 'required',
            'price' => 'required',
            'description' => 'required',
            'manufacture_time' => 'required'
        ]);

        
        dump($_POST);

        $article = new article();
        $article->name = $_POST['name'];
        $article->img = $_POST['image'];
        $article->price = $_POST['price'];
        $article->description = $_POST['description'];
        $article->manufacture_time = $_POST['manufacture_time'];
        $article->status = 1;

        $article->save();
        return back()->with('success', 'Ton produit est en ligne');
    }
}
