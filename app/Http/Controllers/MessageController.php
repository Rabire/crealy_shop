<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\article;

class MessageController extends Controller
{
    function GetActiveMessages() {
        $active_messages = Message::where('status', '1')->orderBy('created_at', 'desc')->get()->toArray();

        /*
        foreach ($active_messages as $active_message) {
            $new_creationdate = date('d/m/Y', strtotime($active_message['created_at']));
            echo $new_creationdate;
            array_replace($active_message['created_at'],$new_creationdate);
        }
        dump($active_messages);
        */
        return $active_messages;
    }

    static function Created_at_dateFormat($id) {
        $messages = Message::where('id', $id)->first()->get()->toArray();
        foreach ($messages as $message) {
            $new_creationdate = date('d/m/Y', strtotime($message['created_at']));
        }
        return $new_creationdate;
    }

    function GetAllMessages() {
        $active_messages = Message::all()->orderBy('created_at', 'desc')->get()->toArray();
        return $all_messages;
    }

    static function getProductName($id) {
        $products = article::where('id', $id)->first()->get()->toArray();
        foreach ($products as $product) {
            $product = $product;
        }
        $product_name = $product['name'];
        return $product_name;
    }

    function DisableMessage() {
        $message = Message::find($_GET['id']);
        $message->status = 0;

        return back()->with('success', 'Message supprimé avec succès');
    }

    function index() {
        return view('administration/messages', [
            'active_messages' => $this->GetActiveMessages(),
        ]);
    }

}
