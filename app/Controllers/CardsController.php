<?php
namespace App\Controllers;

use App\Models\Deck;
use App\Models\Cards;
use Sirius\Validation\Validator;

class CardsController extends BaseController{

    public function getEdit($id){
        $error = array();

        $webInfo = [
            'title' => 'Edit Card - HearthstoneDb',
            'h1' => 'Edit Card - HearthstoneDb',
            'submit' => 'Edit Card',
            'method' => 'PUT'
        ];

        $card = Cards::find($id);

        if (!$card){
            header( 'Location: ' . BASE_URL);
        }

        return $this->render('editCard.twig', [
            'webInfo' => $webInfo,
            'card'    => $card,
            'error'   => $error
        ]);
    }

    public function putEdit($id){
        $errors = array();
        $validationErrors = array();

        $webInfo = [
            'title' => 'Edit Card - HearthstoneDb',
            'h1' => 'Edit Card - HearthstoneDb',
            'submit' => 'Edit Card',
            'method' => 'PUT'
        ];

        if (!empty($_POST)){
            $card['image'] = $_POST['image'];
            $card['name'] = htmlspecialchars($_POST['name']);
            $card['cost'] = $_POST['cost'];
            $card['type'] = htmlspecialchars($_POST['type']);
            $card['attack'] = $_POST['attack'];
            $card['health'] = $_POST['health'];
            $card['effect'] = htmlspecialchars($_POST['effect']);

            $validator = new Validator();

            $requiredFieldMessage = 'Field {label} is required';

            $validator->add('image:Image', 'required', [], $requiredFieldMessage);
            $validator->add('name:Name', 'required', [], $requiredFieldMessage);
            $validator->add('cost:Cost', 'required', [], $requiredFieldMessage);
            $validator->add('type:Type', 'required', [], $requiredFieldMessage);

            if ($card['cost'] < 0){
                $errors['lessCost'] = ["Card cost can't be less than 0"];
            }
            if ($card['cost'] > 10){
                $errors['moreCost'] = ["Card cost can't be more than 10"];
            }
            if ($card['type'] !== "weapon" && $card['type'] !== "spell" && $card['attack'] < 0){
                $errors['lessAttack'] = ["Minion attack can't be less than 0"];
            }
            if ($card['type'] !== "weapon" && $card['type'] !== "spell" && $card['health'] <= 0){
                $errors['lessHealth'] = ["Minion health can't be less than 1"];
            }
            if ($card['type'] === "spell" && $card['effect'] === ""){
                $errors['noEffect'] = ["Spells must have an effect"];
            }
            if ($card['type'] === "spell" && $card['attack'] !== ""){
                $errors['noAttack'] = ["Spells can't have attack value"];
            }
            if ($card['type'] === "spell" && $card['health'] !== ""){
                $errors['noHealth'] = ["Spells can't hava health value"];
            }

            if ($validator->validate($_POST) && empty($errors)){
                $card = Cards::where('id', $id)->update([
                    'image' => $card['image'],
                    'name' => $card['name'],
                    'cost' => $card['cost'],
                    'type' => $card['type'],
                    'attack' => $card['attack'],
                    'health' => $card['health'],
                    'effect' => $card['effect']
                ]);

                header( 'Location: ' . BASE_URL);
            }else {
                $validationErrors = $validator->getMessages();
            }
        }

        return $this->render('editCard.twig', [
            'webInfo' => $webInfo,
            'card'    => $card,
            'errors'   => $errors,
            'validationErrors' => $validationErrors,
        ]);
    }

    public function getIndex($name = null){
        if (is_null($name)){
            $webInfo = [
                'title' => 'Card List - HearthstoneDb'
            ];

            $cards = Cards::query()->orderBy('cost','asc')->get();
            //$distros = Distro::all();

            return $this->render('cardList.twig', [
                'cards' => $cards,
                'webInfo' => $webInfo,
                'base_url' => BASE_URL,
            ]);
        }else{
            $webInfo = [
                'title' => 'Card Info - HearthstoneDb'
            ];

            // Si hay dos copias de la carta, elimina el x2 del nombre para buscar en la db.
            if (strpos($name, "x2") !== false){
                $cardName = trim(iconv_substr($name, 0, -2));
            }else{
                $cardName = trim($name);
            }

            $card = Cards::where('name', $cardName)->first();

            if( !$card ){
                return $this->render('404.twig', ['webInfo' => $webInfo]);
            }

            //dameDato($distro);
            return $this->render('card.twig', [
                'card' => $card,
                'webInfo'=> $webInfo,
                'base_url' => BASE_URL,
                ]);
        }
    }
}