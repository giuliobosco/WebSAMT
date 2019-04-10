<?php


class admin
{

    public function index(array $utente)
    {
	    $nome = $utente["nome"];
	    $cognome = $utente["cognome"];

	    require './application/views/admin/index.php';
    }


}
