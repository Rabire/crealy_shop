<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\Message;

class ContactController extends Controller
{

    function submit(Request $request) {
        
        if ($request->input('type') == 'existing_creation') {
            request()->validate([
                'fullname' => 'required',
                'phonenumber' => 'required',
                'description' => 'required',
                'title' => 'required',
                'article' => 'required'
            ]);

        } elseif ($request->input('type') == 'custom_creation') {
            request()->validate([
                'fullname' => 'required',
                'phonenumber' => 'required',
                'description' => 'required',
                'title' => 'required'
            ]);
            
        } else {
            request()->validate([
                'fullname' => 'required',
                'phonenumber' => 'required',
                'description' => 'required'
            ]);
        }

        
        //dump($_POST);

        $message = new Message();
        $message->fullname = $_POST['fullname'];
        $message->phonenumber = $_POST['phonenumber'];
        $message->title = isset($_POST['title']);
        $message->description = $_POST['description'];
        $message->type = $_POST['type'];
        if (!$_POST['type'] == 'information') {
            $message->article_id = $_POST['article'];
        }
        $message->status = 1;

        
        if (isset($_FILES['uploaded_file']['name'])) {

            
            if ($_FILES['uploaded_file']['error'] > 0) {
                return back()->with('file_error', 'Une erreur est survenue lors du transfert du fichier.');
            }
    
            $filesize = $_FILES['uploaded_file']['size']; 
            $maxsize = 3000000;
    
            if ($filesize > $maxsize) {
                return back()->with('file_error', 'Ce fichier est trop gros (3 Mo max).');
            }
    
            $fileName = $_FILES['uploaded_file']['name'];
    
            $validExt = array('.jpg', '.jpeg', '.png', '.gif');
            $fileExt = "." . strtolower(substr(strrchr($fileName , '.'), 1));
            if(!in_array($fileExt, $validExt)) {
                return back()->with('file_error', 'Le fichier n\'est pas une image.');
            }
    
            $tmpName = $_FILES['uploaded_file']['tmp_name'];
            $uniqueName = md5(uniqid(rand(), true));
            $fileName = "upload/" . $uniqueName . $fileExt;
            $result = move_uploaded_file($tmpName, $fileName);
    
            if ($result) {
                $message->filepath = $fileName;
            } else {
                return back()->with('file_error', 'Une erreur est survenue lors du transfert du fichier.');
            }
        }
        
    
        //dump($message->filepath);
        $message->save();
        return back()->with('success', 'Votre message à bien été envoyé !');

    }



public function index() {

    if (isset($_GET['type']) && $_GET['type'] == 'existing_creation') {
        $tab = 'existing_creation';

    } elseif (isset($_GET['type']) && $_GET['type'] == 'custom_creation') {
        $tab = 'custom_creation';
        
    } else {
        $tab = 'informations';
    }

    $produits = article::where('status', '1')->get()->toArray();

    return view('contact', [
        'tab' => $tab,
        'produits' => $produits
    ]);
}

}