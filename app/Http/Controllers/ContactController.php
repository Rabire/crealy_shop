<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\article;
use App\Message;

class ContactController extends Controller
{

    function customCreationSubmit() {
        
        request()->validate([
            'fullname' => 'required',
            'phonenumber' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        
        //dump($_POST);

        $message = new Message();
        $message->fullname = $_POST['fullname'];
        $message->phonenumber = $_POST['phonenumber'];
        $message->title = $_POST['title'];
        $message->description = $_POST['description'];
        $message->type = "custom_creation";

        
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
        
    
        $message->save();
        return back()->with('success', 'Votre message à été envoyé !');

    }

    function customExistingSubmit() {
        
        request()->validate([
            'fullname' => 'required',
            'phonenumber' => 'required',
            'title' => 'required',
            'description' => 'required',
            'article' => 'required'
        ]);
        
        //dump($_POST);

        $message = new Message();
        $message->fullname = $_POST['fullname'];
        $message->phonenumber = $_POST['phonenumber'];
        $message->title = $_POST['title'];
        $message->description = $_POST['description'];
        $message->type = "existing_creation";
        $message->article_id = $_POST['article'];

        
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
        
    
        $message->save();
        return back()->with('success', 'Votre message à été envoyé !');

    }


    function informationsSubmit() {
        
        request()->validate([
            'fullname' => 'required',
            'phonenumber' => 'required',
            'description' => 'required'
        ]);
        
        //dump($_POST);

        $message = new Message();
        $message->fullname = $_POST['fullname'];
        $message->phonenumber = $_POST['phonenumber'];
        $message->description = $_POST['description'];
        $message->type = "informations";
    
        $message->save();
        return back()->with('success', 'Votre message à été envoyé !');

    }



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
