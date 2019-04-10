<?php

require './application/models/utente.php';

class utenti
{

    public function index()
    {
		$utenti = utente::getUtenti();
        
        require('./application/views/utenti/index.php');
    }

    public function delete(string $param) {
        utente::deleteUser(strval($param));
    }

}