<?php

function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}

function redirect($url)
{
    header("Location: " . BASEURL . "/$url");
    exit();
}

function back() {
    $referer = $_SERVER['HTTP_REFERER'] ?? BASEURL . "/dashboard";
    header("Location: $referer");
    exit();
}

function isAlpha($str) {
    return preg_match('/^[a-zA-Z\s]+$/', $str) === 1;
}