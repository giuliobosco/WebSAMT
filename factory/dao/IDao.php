<?php

interface IDao {
    function get();
    function getById($id);
    function insert($object);
    function update($object);
    function delete($object);
}