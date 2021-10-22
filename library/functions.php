<?php
session_start();
$connection = require 'connection.php';
$public_path = '../public/';

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

function get_content_json($filename)
{
    global $public_path;
    $file_path = $public_path.$filename.'.json';

    if(!file_exists($file_path))
        return false;

    $file = file_get_contents($file_path);
    return json_decode($file);
}

function set_content_json($filename,$content,$mode='rewrite') // type: rewrite, append
{
    global $public_path;
    $mode = $mode == 'rewrite' ? FILE_USE_INCLUDE_PATH : FILE_USE_INCLUDE_PATH | FILE_APPEND;
    $file_path = $public_path.$filename.'.json';
    return file_put_contents($file_path,$content,$mode);
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