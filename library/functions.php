<?php
session_start();
$connection = require 'connection.php';

function base_url()
{
    return sprintf(
        "%s://%s:%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'],
        $_SERVER['SERVER_PORT']
    );
}

function get_connection()
{
    global $connection;
    return $connection['connection'];
}

function render($template, $data = [], $type = 'partial')
{
    $layouts = $GLOBALS['__LAYOUTS']??'index'; 
    if(!empty($data))
        extract($data);

    $template = '../templates/'.$template;

    if(file_exists($template.'.php'))
    {
        ob_start();
        require $template.'.php';
        $content = ob_get_clean();
    }
    else
        $content = "";
    
    if($type == 'template')
    {
        ob_start();
        require '../templates/'.$layouts.'.php';
        $content = ob_get_clean();
    }
    return $content;
}

function view($template, $data = [])
{
    return render($template, $data, 'template');
}

function partial($template, $data = [])
{
    return render($template, $data);
}

function request()
{
    return (new src\Request);
}

function session()
{
    return (new src\Session);
}

function redirect()
{
    return (new src\Redirect);
}

function get_route()
{
    return $_GET['r']??'';
}

function startsWith( $haystack, $needle ) {
    $length = strlen( $needle );
    return substr( $haystack, 0, $length ) === $needle;
}

function endsWith( $haystack, $needle ) {
   $length = strlen( $needle );
   if( !$length ) {
       return true;
   }
   return substr( $haystack, -$length ) === $needle;
}