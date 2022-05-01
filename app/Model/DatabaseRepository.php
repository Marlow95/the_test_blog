<?php

interface DatabaseRepository
{
    function getAll();
    function getOne($id);
    function post();
    function update($id);
    function delete($id);
}