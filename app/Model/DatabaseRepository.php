<?php

interface DatabaseRepository
{
    function getAll();
    function getOne($id);
    //post & update will take in multiple different parameters
    function delete($id);
}