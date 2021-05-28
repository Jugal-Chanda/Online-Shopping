<?php

session_start();

function addToSession($sessionName,$data)
{
    $_SESSION[$sessionName] = $data;
}

function checkSessionIsSet($sessionName)
{
    return isset($_SESSION[$sessionName]); 
}

function getSessionData($sessionName)
{
    if(checkSessionIsSet($sessionName))
    {
        return $_SESSION[$sessionName];
    }
    else
    {
        die($sessionName." is not set to session.........");
    }
}

function deleteSession($sessionName)
{
    unset($_SESSION[$sessionName]);
}

if(!checkSessionIsSet('error'))
{
    addToSession('error',array());
}
if(!checkSessionIsSet('success'))
{
    addToSession('success',array());
}