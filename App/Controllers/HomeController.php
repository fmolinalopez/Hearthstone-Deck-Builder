<?php
namespace App\Controllers;

class HomeController{

    public function getIndex(){
        $decks = new DecksController();

        return $decks->getIndex();
    }
}