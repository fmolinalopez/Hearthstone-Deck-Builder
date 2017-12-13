<?php
namespace App\Controllers;

use App\Models\Card;
use App\Models\Deck;

class ApiController{
    public function getCards($id = null){
        if (is_null($id)){
            $cards = Card::all();

            header('Content-Type: application/json');
            return json_encode($cards);
        }else{
            $card = Card::find($id);

            header('Content-Type: application/json');
            return json_encode($card);
        }
    }
}