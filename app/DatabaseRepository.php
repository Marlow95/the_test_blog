<?php

interface DatabaseRepository
{
    function getAll();
    function getOne();
    function post();
    function update();
    function delete();
}