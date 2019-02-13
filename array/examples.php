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

// Array with numeric key
$array = array("Value1", "Value2", "Value3");
var_dump($array);

// Array with key
$array = array("Key1"=>"Value1", "Key2"=>"Value2", "Key3"=>"Value3");
var_dump($array);

// array for test functions and add elements
$array = $array(5);
$array[] = 7;
$array[] = 44;
var_dump($array);

// insert value at the end of array
array_push($array, "inserted value");
// remove last element
array_pop($array);

// remove a value and reorder keys
array_splice($array,2,1);
// replace element
array_splice($array,2,1,"replaced value");
// remove value but do not reorder keys
unset($array[2]);

// create array with 3 strings
$array = array("Hello", "World", "!");
// implode the strings of the array in a single string
$string = implode(" ", $array);
// explode the string in an array by the spaces
$array = explode(" ", $string);