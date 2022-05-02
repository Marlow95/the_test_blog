<?php

interface DatabaseRepository
{
    function getAll();
    function getOne($id);
    //post will take in multiple different parameters
    function update($id);
    function delete($id);
}