<?php
namespace App\Controllers;

use App\Models\Deck;
use App\Models\Card;
use Sirius\Validation\Validator;

class DecksController extends BaseController {

    /**
     * Ruta {GET} /decks/new que muestra el formulario de añadir un nuevo deck.
     *
     * @return string Render de la web con toda la información.
     */
    public function getNew(){

        $errors = array();
        $error = false;

        $webInfo = [
            'title'  => 'Create new deck - HearthstoneDB',
            'h1'     => 'Create New Deck',
            'submit' => 'Create Deck',
            'method' => 'POST',
        ];

        $cardList = Card::all();

        $deck = array_fill_keys(['name', 'cardList'], '');

        return $this->render('createDeck.twig', [
            'cardList' => $cardList,
            'error'    => $error,
            'errors'   => $errors,
            'webInfo'  => $webInfo,
            'deck'     => $deck,
        ]);
    }

    /**
     * Ruta {POST} /decks/new que procesa la introducción de un nuevo deck.
     *
     * @return string Render de la web con toda la información.
     */
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

        $cardList = Card::all();

        return $this->render('createDeck.twig', [
            'deck' => $deck,
            'webInfo' => $webInfo,
            'cardList' => $cardList,
            'errors' => $errors,
            'countError' => $countError
        ]);
    }

    /**
     * Ruta {GET} /decks/edit/{id} que muestra el formulairo de actualización de un deck.
     *
     * @param $id Código del deck
     *
     * @return string Render de la web con toda la información.
     */
    public function getEdit($id){
        $errors = array();
        $error = false;

        $webInfo = [
            'title'  => 'Edit Deck - HearthstoneDB',
            'h1'     => 'Edit Deck',
            'submit' => 'Edit Deck',
            'method' => 'PUT',
        ];

        $cardList = Card::all();

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

    /**
     * Ruta {PUT} /decks/edit/{id} que actualiza toda la información de un deck.
     * Se usa el verbo PUT porque la actualización se realiza en todos los campos de la db.
     *
     * @param $id Código del deck
     *
     * @return string Render de la web con toda la información.
     */
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

        $cardList = Card::all();

        return $this->render('createDeck.twig', [
            'deck' => $deck,
            'webInfo' => $webInfo,
            'cardList' => $cardList,
            'errors' => $errors,
            'countError' => $countError
        ]);
    }

    /**
     * Ruta raiz {GET} /decks para la dirección de la aplicación.
     * En este caso se muestra la lista de decks.
     *
     * @return string Render de la web con toda la información.
     */
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

    public function deleteIndex(){
        $id = $_REQUEST['id'];

        $deck = Deck::destroy($id);

        header('Location: ' . BASE_URL);
    }
}

