<?php
namespace App\Controllers;

use App\Controllers\Auth\AuthController;
use App\Controllers\Auth\RegisterController;

class HomeController{

    /**
     * Ruta [GET] / donde se muestra la página de inicio del proyecto.
     *
     * @return string Render de la web con toda la información.
     */
    public function getIndex(){
        $decks = new DecksController();

        return $decks->getIndex();
    }

    /**
     * Ruta [GET] /login donde se muestra la pagina de logeo.
     *
     * @return string Render de la web con toda la información.
     */
    public function getLogin(){
        $auth = new AuthController();

        return $auth->getLogin();
    }

    /**
     * Ruta [POST] /login donde se procesan los datos de logeo.
     *
     * @return string Render de la web con toda la información.
     */
    public function postLogin(){
        $auth = new AuthController();

        return $auth->postLogin();
    }

    /**
     * Ruta [GET] /registro donde se muestra el formulario de registro.
     *
     * @return string Render de la web con toda la información.
     */
    public function getRegistro(){
        $register = new RegisterController();

        return $register->getRegister();
    }

    /**
     * Rut a[POST] /registro donde se procesan los datos de registro.
     *
     * @return string Render de la web con toda la información.
     */
    public function postRegistro(){
        $register = new RegisterController();

        return $register->postRegister();
    }

    /**
     * Ruta [GET] /logout que perminte deslogearse de la web.q
     */
    public function getLogout(){
        $auth = new AuthController();

        return $auth->getLogout();
    }
}