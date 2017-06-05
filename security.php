<?php
/*
REDIRECIONAMENTO DE SITES ATRAVÉS DE AGENTS INVÁLIDOS
*/

$invalid_agent = [
    "",
];

if(in_array($_SERVER['HTTP_USER_AGENT'], $invalid_agent)){
    header("Location: http://127.0.0.1");
    die();
}

/*
REDIRECIONAMENTO DE ACESSO POR DIRETÓRIOS INVÁLIDOS
*/

$path_patterns =[
    "/log/interspire_6.1.4/",
    "/filter.php"
];

$request = $_SERVER['REQUEST_URI'];

foreach ($path_patterns as $pattern){
    if(strstr($request, $pattern)) {
        header("Location: http://127.0.0.1");
        die();
    }    
}