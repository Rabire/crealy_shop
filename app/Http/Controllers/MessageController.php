<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\article;

class MessageController extends Controller
{
    function GetActiveMessages() {
        $active_messages = Message::where('status', '1')->orderBy('created_at', 'desc')->get()->toArray();
        return $active_messages;
    }

    function GetAllMessages() {
        $all_messages = Message::orderBy('created_at', 'desc')->get()->toArray();
        return $all_messages;
    }

    static function Created_at_dateFormat($id) {
        $messages = Message::where('id', $id)->first()->get()->toArray();
        foreach ($messages as $message) {
            $new_creationdate = date('d/m/Y', strtotime($message['created_at']));
        }
        return $new_creationdate;
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

        $message->save();
        return back()->with('success', 'Message supprimé avec succès');
    }

    function index() {

        if (isset($_GET['filter']) && $_GET['filter'] == 'all') {
            return view('administration/messages', [
                'messages' => $this->GetAllMessages(),
            ]);
        } else {
            return view('administration/messages', [
                'messages' => $this->GetActiveMessages(),
            ]);
        }
    }

}
