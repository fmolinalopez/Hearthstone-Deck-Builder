<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Log;
use App\Models\User;
use Sirius\Validation\Validator;

class AuthController extends BaseController {

    /**
     * Ruta [GET] /login donde se muestr la página de logeo.
     *
     * @return string Render de la web con toda la información.
     */
    public function getLogin(){
        return $this->render('auth/login.twig',[]);
    }

    /**
     * Ruta [POST] /login donde se procesan los datos del formulario.
     *
     * @return string Render de la web con toda la información.
     */
    public function postLogin(){
        $validator = new Validator();

        $validator->add('inputEmail:Email', 'required', [], 'El {label} es requerido');
        $validator->add('inputEmail:Email', 'email',[],'No es un email válido');
        $validator->add('inputPassword:Password', 'required',[],'La {label} es requerida.');

        if($validator->validate($_POST)){
            $user = User::where('email', $_POST['inputEmail'])->first();
            if(password_verify($_POST['inputPassword'], $user->password)){
                $_SESSION['userId'] = $user->id;
                $_SESSION['userName'] = $user->name;
                $_SESSION['userEmail'] = $user->email;

                header('Location: '. BASE_URL);
                return null;
            }

            $validator->addMessage('authError','Los datos son incorrectos');
        }

        Log::logInfo('Intento fallido de login '. $_POST['inputEmail']);

        $errors = $validator->getMessages();

        return $this->render('auth/login.twig', [
            'errors' => $errors
        ]);
    }

    /**
     * Ruta [GET] /logout que permite al usuario deslogearse de la web.
     */
    public function getLogout(){
        //session_destroy();
        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        unset($_SESSION['userEmail']);

        header("Location: ". BASE_URL);
    }
}