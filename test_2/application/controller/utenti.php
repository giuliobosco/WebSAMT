<?php

require './application/models/utente.php';

class utenti {

	public function index() {
		$utenti = utente::getUtenti();

		require('./application/views/utenti/index.php');
	}

	public function delete(string $param) {
		utente::deleteUser(strval($param));
	}

	public function create() {
		if ($_POST) {
			if (isset($_POST['email']) && isset($_POST['nome']) && isset($_POST['cognome']) && isset($_POST['nascita']) && isset($_POST['password'])) {
				utente::createUser($_POST['email'], $_POST['nome'], $_POST['cognome'], $_POST['nascita'], $_POST['password']);
				header("location: " . URL . "utenti");
			} else {
				require('./application/views/utenti/create.php');
			}
		} else {
			require('./application/views/utenti/create.php');
		}
	}

}