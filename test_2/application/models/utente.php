<?php

/**
 * Classe utente.
 *
 * @author giuliobosco
 * @version 1.0 (2019-04-03)
 */
class utente {

	/**
	 * email utente
	 * @var string
	 */
	private $email;

	/**
	 * nome utente
	 * @var string
	 */
	private $nome;

	/**
	 * cognome utente
	 * @var string
	 */
	private $cognome;

	/**
	 * nascita utente
	 * @var datetime
	 */
	private $nascita;

	/**
	 * password utente
	 * @var string
	 */
	private $password;

	/**
	 * Utente costructor
	 *
	 * @param string $email email utente
	 * @param string $nome nome utente
	 * @param string $cognome cognome utente
	 * @param datetime $nasicta nascita utente
	 * @param string $password password utente
	 */
	public function __construct(string $email, string $nome, string $cognome, string $nascita, string $password) {
		if (filter_var(strval($email), FILTER_VALIDATE_EMAIL)) {
			$this->email = strval($email);
			$this->nome = strval($nome);
			$this->cognome = strval($cognome);
			$this->nascita = $nascita;
			$this->password = strval($password);
		}
	}

	/**
	 * Get email utente
	 *
	 * @return string email utente
	 */
	public function getEmail(): string {
		return $this->email;
	}

	/**
	 * Get nome utente
	 *
	 * @return stirng nome utente
	 */
	public function getNome(): string {
		return $this->nome;
	}

	/**
	 * Get cognome utente
	 *
	 * @return string cognome utente
	 */
	public function getCognome(): string {
		return $this->cognome;
	}

	/**
	 * Get nascita utente
	 *
	 * @return datetime nascita utente
	 */
	public function getNascita(): string {
		return $this->nascita;
	}

	/**
	 * Get nascita utente
	 *
	 * @return string password utente
	 */
	public function getPassword(): string {
		return $this->password;
	}

	/**
	 * Get lista di utenti.
	 *
	 * @return array Utenti.
	 */
	public static function getUtenti(): array {
		// apro il file
		$file = fopen("./application/models/utenti.txt", "r");

		// creo array per tutte le linee
		$csv = array();

		// aggiungo ogni riga del file all array csv
		while (!feof($file)) {
			$line = fgetcsv($file, ",");
			if ($line) {
				if (count($line) == 5) {
					$utente = new utente($line[0], $line[1], $line[2], $line[3], $line[4]);
					array_push($csv, $utente);
				}
			}
		}

		// chiudo il file
		fclose($file);

		// ritorno la lista
		return $csv;
	}

	public static function checkUser(string $email, string $password): array {
		// apro il file
		$file = fopen("./application/models/utenti.txt", "r");

		// cerco l'utente
		while (!feof($file)) {
			$line = fgetcsv($file, ",");
			if (count($line) == 5) {
				if ($line[0] == $email && $line[4] == $password) {
					fclose($file);
					return array("nome" => $line[1], "cognome" => $line[2]);
				}
			}
		}

		// chiudo il file
		fclose($file);

		// ritorno niente perché non ho trovato utenti
		return array();
	}

	public static function write($utenti): void {
		$file = fopen("./application/models/utenti.txt", "w");

		foreach ($utenti as $key => $utente) {
			fputcsv($file, array($utente->getEmail(), $utente->getNome(), $utente->getCognome(), $utente->getNascita(), $utente->getPassword()));
		}

		fclose($file);
	}

	public static function deleteUser(string $email): void {
		$utenti = self::getUtenti();

		$id = -1;
		foreach ($utenti as $key => $utente) {
			if ($utente->getEmail() == $email) {
				$id = $key;
			}
		}

		$utenti = array_merge(array_splice($utenti, 0, $id), array_splice($utenti, $id + 1, count($utenti)));
		self::write($utenti);
		header("location: " . URL . "utenti");
	}

	public static function createUser(string $email, string $nome, string $cognome, $nascita, string $password) {
		$file = fopen("./application/models/utenti.txt", "r");

		$finded = false;
		while ((!feof($file)) && !$finded) {
			$line = fgetcsv($file, ",");
			if (count($line) == 5) {
				if ($line[0] == $email) {
					$finded = true;
				}
			}
		}
		fclose($file);

		if ($finded) {

		} else {
			$utente = new utente($email, $nome, $cognome, $nascita, $password);
			$utenti = self::getUtenti();
			array_push($utenti, $utente);
			self:self::write($utenti);
		}
	}
}