<?php
namespace App\Controllers;

use App\Models\Deck;
use App\Models\Cards;
use Sirius\Validation\Validator;

class DecksController extends BaseController {

    public function getNew(){

        $errors = array();
        $error = false;

        $webInfo = [
            'title'  => 'Create new deck - HearthstoneDB',
            'h1'     => 'Create New Deck',
            'submit' => 'Create Deck',
            'method' => 'POST',
        ];

        $cardList = Cards::all();

        $deck = array_fill_keys(['name', 'cardList'], '');

        return $this->render('createDeck.twig', [
            'cardList' => $cardList,
            'error'    => $error,
            'errors'   => $errors,
            'webInfo'  => $webInfo,
            'deck'     => $deck,
        ]);
    }

    public function postNew(){

        $webInfo = [
            'title'  => 'Create new deck - HearthstoneDB',
            'h1'     => 'Create New Deck',
            'submit' => 'Create',
            'method' => 'POST',
        ];

        $errors = [];

        // Si POST no esta vacio comprueba que no haya errores en el formulario.
        if (!empty($_POST)){
            $validator = new Validator();

            $deck['deckName'] = trim(htmlspecialchars($_POST['name']));
            $deck['cardList'] = htmlspecialchars($_POST['deckCards']);
            $count = 0;

            // Se convierte cardList a array y se elimina el ultimo elemento que es un campo vacio
            $cardList = explode(",", $deck['cardList']);
            array_pop($cardList);

            // Se comprueba cada carta de $cardList y si hay 1 copia se suma 1 a count y si hay 2
            // copias se suma 2 a count.
            foreach ($cardList as $card){
                if (strpos($card, "x2") !== false){
                    $count+=2;

                }else{
                    $count+=1;
                }
            }

//            $deckLenghtString = 'A deck must have 15 cards';
            // Si el campo de nombre esta vacio crea un error.
            $validator->add('name:DeckName', 'required', [], "Field {label} is required");
//            // Si en el campo de texto no hay 15 cartas se crea un error.
//            $validator->add($count, 'GreaterThan', ['min' => 14], $deckLenghtString);
//            // Si en el campo de texto hay mas de 15 cartas se crea un error.
//            $validator->add($count, 'LessThan', ['max' => 16], $deckLenghtString);

            // Si no hay ningun error añade el mazo a la base de datos.
            if ($validator->validate($_POST) && $count === 15){

                $deck = new Deck([
                    'deckName' => $deck['deckName'],
                    'cardList' => $deck['cardList'],
                ]);

                $deck->save();

                header('Location: ' . BASE_URL);
            }else {
                $errors = $validator->getMessages();
                $countError['count'] = ["Decks must have 15 cards"];
            }
        }

        $cardList = Cards::all();

        return $this->render('createDeck.twig', [
            'deck' => $deck,
            'webInfo' => $webInfo,
            'cardList' => $cardList,
            'errors' => $errors,
            'countError' => $countError
        ]);
    }

    public function getEdit($id){
        $errors = array();
        $error = false;

        $webInfo = [
            'title'  => 'Edit Deck - HearthstoneDB',
            'h1'     => 'Edit Deck',
            'submit' => 'Edit Deck',
            'method' => 'PUT',
        ];

        $cardList = Cards::all();

        $deck = Deck::find($id);

        if (!$deck){
            return $this->render('404.twig', ['webInfo' => $webInfo]);
        }

        return $this->render('createDeck.twig', [
            'cardList' => $cardList,
            'error'    => $error,
            'errors'   => $errors,
            'webInfo'  => $webInfo,
            'deck'     => $deck,
        ]);
    }

    public function putEdit($id){

        $webInfo = [
            'title'  => 'Edit Deck - HearthstoneDB',
            'h1'     => 'Edit Deck',
            'submit' => 'Edit Deck',
            'method' => 'PUT',
        ];

        $errors = [];
        $error = false;

        if (!empty($_POST)){
            $validator = new Validator();

            $deck['id'] = $id;
            $deck['deckName'] = trim(htmlspecialchars($_POST['name']));
            $deck['cardList'] = htmlspecialchars($_POST['deckCards']);
            $count = 0;

            // Se convierte cardList a array y se elimina el ultimo elemento que es un campo vacio
            $cardList = explode(",", $deck['cardList']);
            array_pop($cardList);

            // Se comprueba cada carta de $cardList y si hay 1 copia se suma 1 a count y si hay 2
            // copias se suma 2 a count.
            foreach ($cardList as $card){
                if (strpos($card, "x2") !== false){
                    $count+=2;

                }else{
                    $count+=1;
                }
            }

//            $deckLenghtString = 'A deck must have 15 cards';
            // Si el campo de nombre esta vacio crea un error.
            $validator->add('name:DeckName', 'required', [], "Field {label} is required");
//            // Si en el campo de texto no hay 15 cartas se crea un error.
//            $validator->add($count, 'GreaterThan', ['min' => 14], $deckLenghtString);
//            // Si en el campo de texto hay mas de 15 cartas se crea un error.
//            $validator->add($count, 'LessThan', ['max' => 16], $deckLenghtString);

            // Si no hay ningun error añade el mazo a la base de datos.
            if ($validator->validate($_POST) && $count === 15){

                $deck = Deck::where('id', $id)->update([
                    'id'       => $deck['id'],
                    'deckName' => $deck['deckName'],
                    'cardList' => $deck['cardList'],
                ]);

                header('Location: ' . BASE_URL);
            }else {
                $errors = $validator->getMessages();
                $countError['count'] = ["Decks must have 15 cards"];
            }
        }

        $cardList = Cards::all();

        return $this->render('createDeck.twig', [
            'deck' => $deck,
            'webInfo' => $webInfo,
            'cardList' => $cardList,
            'errors' => $errors,
            'countError' => $countError
        ]);
    }

    public function getIndex(){
        $webInfo = [
            'title' => 'Página de Inicio - HearthstoneDB'
        ];

        $decks = Deck::query()->orderBy('created_at', 'desc')->get();
        //$decks = Deck::all();

        return $this->render('home.twig', [
            'decks' => $decks,
            'webInfo' => $webInfo,
        ]);
    }
}

