<?php

if($_SERVER["SERVER_NAME"] == "coqueiral.mg.gov.br" || $_SERVER["SERVER_NAME"] == "www.coqueiral.mg.gov.br") {

    require_once ROOT . 'vendor/le_php-master/logentries.php';

    $ip_allow = array("187.108.112.168");
    
    $ip = $_SERVER["REMOTE_ADDR"];
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $path = $_SERVER["SERVER_NAME"] . $_SERVER['REQUEST_URI'];

    $data = array(
        "ip" => $ip,
        "agent" => $agent,
        "path" => $path
    );

    $log->Info(json_encode($data));

    //Log do Admin
    if($_SERVER['REQUEST_URI'] == "/admin" && !in_array($_SERVER["REMOTE_ADDR"], $ip_allow)) {

        $ip = $_SERVER["REMOTE_ADDR"];
        $agent = $_SERVER['HTTP_USER_AGENT'];
        $message = "Tentativa de acesso ao site fora da rede da prefeitura.";

        $data = array(
            "ip" => $ip,
            "agent" => $agent,
            "message" => $message
        );

        $log->Notice(json_encode($data));
	}
}