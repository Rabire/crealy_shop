<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;

class ContactController extends Controller
{

    //custom_creation exixting_creation informations

    public function ShowExistingCreation() {
        $produits = article::where('status', '1')->get()->toArray();

        return view('contact', [
            'tab' => 'existing_creation',
            'produits' => $produits
        ]);
    }

    public function ShowInformations() {
        return view('contact', [
            'tab' => 'informations'
        ]);
    }


    public function index() {
        return view('contact', [
            'tab' => 'custom_creation'
        ]);
    }
}
