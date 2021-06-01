<?php

$route = get_route();

include 'admin.php';
include 'juri.php';

if(startsWith($route,'admin') || startsWith($route,'juri'))
{
    $__LAYOUTS = 'admin/index';
}