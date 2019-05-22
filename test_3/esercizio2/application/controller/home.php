<?php

require_once "application/models/table.php";

class Home
{

    public function index()
    {

        $alpha = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'l');

        $table = new table();
		if (isset($_COOKIE['matrix']) && isset($_COOKIE['matrixCounter'])) {
            $table->unserializeMatrix($_COOKIE['matrix']);
            $table->unserialzieMatrixCounter($_COOKIE['matrixCounter']);
        } else {
		    $table->init(10,10);
        }

        if ($_POST) {

		    if (isset($_POST['cella']) && isset($_POST['valore'])) {
		        if (!empty($_POST['cella']) && ! empty($_POST['valore'])) {
		            $cella = htmlspecialchars($_POST['cella']);
                    $pd = $cella;
		            $valore = htmlspecialchars($_POST['valore']);
                    $c = explode("#", strval($cella));
                    if (count($c) == 2) {
                        $x = $c[0];
                        $y = $c[1];

                        $x = array_search($x, $alpha);

                        $x = intval($x);
                        $y = intval($y);
                        $valore = intval($valore);
                        $table->setValue($y, $x, $valore);
                    }
                }
            }
        }

        $matrix = $table->getMatrix();

		setcookie('matrix', $table->serializeMatrix(), time() + 3600);
		setcookie('matrixCounter', $table->serializeMatrixCounter(), time() + 3600);

		require_once "application/views/index.php";
    }


}
