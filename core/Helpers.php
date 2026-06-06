<?php

function dd($data) : void
{
    echo "<pre>";
    die(var_dump($data));
}

function escape(string $html) : string
{
    return htmlspecialchars($html);
}

function view($uri, $data = [])
{
    extract($data);
    return include "views/$uri.view.php";
}

function redirect($view)
{
    return header("Location: $view");
}

function request(string $name) : string
{
    if(Request::METHOD() === "GET")
    {
        return $_GET[$name];
    }
    if(Request::METHOD() === "POST")
    {
        return $_POST[$name];
    }
}

function validateEmail(string $email) : bool
{
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function isLoggedIn() : bool
{
    if(isset($_SESSION["is_logged_in"]))
    {
        return true;
    } else {
        return false;
    }
}

function upload(string $sourceDir, string $sourceFile) : string
{
    return BASE_DIR . "/../views/uploads/$sourceDir/$sourceFile";
}

function checkMIMEtype(string $file) : bool 
{
    $allowedContentType = [
        "image/png",
        "image/jpg",
        "image/jpeg",
        "image/gif",
        "image/webp",
    ];
    if(in_array(mime_content_type($file), $allowedContentType)) {
        return true;
    }
    return false;
}
