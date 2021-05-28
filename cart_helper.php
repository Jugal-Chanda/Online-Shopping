<?php

include_once "session.php";

function cartCount()
{
    if(checkSessionIsSet("cart"))
    {
        $cart = getSessionData("cart");
        return count($cart);
    }
    return 0;
}