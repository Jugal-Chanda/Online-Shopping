<?php

include_once "session.php";
include_once "datatabase/query.php";



function attempt($data)
{
    $result = selectWhereE('users',$data);
    if(count($result) == 1)
    {
        return getFirst($result);
    }
    if(count($result) == 0)
    {
        return null;
    }
    return null;
}

function login($data)
{
    $user = attempt($data);
    if($user !== null)
    {
        
        addToSession("user_token",$user['token']);
        return json_encode([
            "message" => "login successfull",
            "status" => 1
        ]);
    }
    return json_encode([
        "message" => "user not found",
        "status" => 0
    ]);
}

function isAuthenticated()
{
    if(checkSessionIsSet("user_token"))
    {
        return true;
    }
    return false;
}

function getAuthenticateUser()
{   
    
    if(isAuthenticated())
    {
        $userToken = getSessionData("user_token");
        $user = selectWhereE('users',['token'=>$userToken]);
        $user = getFirst($user);
        return $user;
    }
    return null;
}

function logout()
{
    deleteSession("user_token");
    return json_encode([
        "message" => "Logout Successfully"
    ]);
}