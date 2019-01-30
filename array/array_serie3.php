<?php
/*
 * The MIT License
 *
 * Copyright 2018 giuliobosco.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
/**
 * @author giuliobosco
 * @version 1.0
 */

// es 1
$cities = array (
		array("Zurigo","Zurigo",394012),
		array("Ginevra","Ginevra",191964),
		array("Basilea","Basilea città",171659),
		array("Berna","Berna",133656),
		array("Losanna","Vaud",125885),
		array("Winterthur","Zurigo",101745),
		array("Lucerna","Lucerna",78093),
		array("San Gallo","San Gallo",72642),
		array("Lugano","Ticino",66034),
		array("Bienne","Berna",51635),
);

function matrixPrinter($array) {
	echo "<table><tr><th>Citta</th><th>Cantone</th><th>abitanti</th></tr>";
	foreach($array as $y => $y_vlaue){
		echo "<tr>";
		foreach($array[$y] as $x => $x_value) {
			echo "<td>".$x_value."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";
}

matrixPrinter($cities);

// es 2
function orderBy (&$array, $key) {
    $order=array();
    $ret=array();
    reset($array);
    foreach ($array as $i => $item) {
        $sorter[$i]=$item[$key];
    }
    asort($order);
    foreach ($order as $i => $item) {
        $ret[$i]=$array[$i];
    }
    $array=$ret;
}

orderBy($cities,2);

matrixPrinter($cities);

// es 3

function countBy($array, $key) {
	$cantos =array();
	foreach ($array as $i => $item) {
		if ($n = array_search($item[1], $cantos) == null) {
			$cantos[array_search($item[1], $cantos)] = 0;
		}

		$cantos[array_search($item[1], $cantos)] += $item[2];
	}

	return $cantos;
}

// es 4
$students = array (
		array("Giulio","Bosco","26.05.2001","Via al Boh0",6900,"Lugano"),
		array("Matteo","Forni","24.10.2001","Via al Boh1",6950,"Camignolo"),
		array("Bryan","Beffa","04.12.1999","Via al Boh2",6900,"Lugano"),
		array("Paolo","Guebeli","24.01.2001","Via al Boh3",6969,"Tesserete"),
		array("Jari","Näser","24.10.2001","Via al Boh4",6910,"Cadro")
);
?>
