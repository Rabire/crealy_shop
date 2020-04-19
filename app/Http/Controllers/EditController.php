<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;


class EditController extends Controller
{

    public function GetID()
    {
        $product_id = $_GET['id'];

        if (is_numeric($product_id) == true) {
            return $product_id;
        }else {
            return '0';
        }
    }

    private function getProductInfos() {
        $productID = $this->GetID();
        
        $produits = article::all()->where('id', $productID)->toArray();

        foreach ($produits as $produit) {
            dump($produit);
            return $produit;
        }


    }

    function index() {
        return view('administration/edit', [
            'id' => $this->GetID(),
            'article' => $this->getProductInfos()
        ]);
    }

    function update() {
        $ProductInfos = $this->getProductInfos();

        $db_article_info = article::find($ProductInfos['id']);

        $post = $_POST;
        dump($post);

        if ($ProductInfos['name'] !== $post['name']) {
            $db_article_info->name = $post['name'];
        }

        if ($ProductInfos['img'] !== $post['image']) {
            $db_article_info->img = $post['image'];
        }

        if ($ProductInfos['description'] !== $post['description']) {
            $db_article_info->description = $post['description'];
        }

        if ($ProductInfos['price'] !== $post['price']) {
            $db_article_info->price = $post['price'];
        }

        if ($ProductInfos['manufacture_time'] !== $post['manufacture_time']) {
            $db_article_info->manufacture_time = $post['manufacture_time'];
        }

        $db_article_info->save();
        
        return back();

    }

}
