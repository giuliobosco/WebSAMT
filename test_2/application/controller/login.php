<?php

require './application/models/utente.php';

class login
{

    public function index()
    {
        $error_message = "";
        // controllo che siano settati email e password
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            // controllo caratteri speciali
            $email = htmlspecialchars(strval($_POST["email"]));
            $password = htmlspecialchars(strval($_POST["password"]));

            // controllo esistenaza utente
            $utente = utente::checkUser($email, $password);
            if (count($utente) > 1) {
                // se esite ritorno home
                $this->home($utente);
                return;
            } else {
                // se non esiste ritorno errore
                $error_message = "Errore di accesso";
            }
        }

		require './application/views/login/index.php';
    }

    public function home(array $utente) {
        $nome = $utente["nome"];
        $cognome = $utente["cognome"];

        require './application/views/admin/index.php';
    }
}