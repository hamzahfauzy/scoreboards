<?php

$restricted_route = 'juri/*';

$redirect_to = 'auth/login';
$rule        = !session()->get('user') || session()->get('user')->level == 'admin';


if(endsWith($restricted_route,'*'))
{
    // remove asterisk
    $r = str_replace('*','',$restricted_route);
    if(startsWith($route,$restricted_route) && $rule)
    {
        return redirect()->route($redirect_to);
    }
}