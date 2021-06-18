<?php
if($user = session()->get('user'))
{ 
    return redirect()->route($user->level);
}

if(request()->isMethod('POST'))
{
    $conn    = get_connection();
    $request = request()->post();
    $db      = new src\Database($conn);

    $user    = $db->single('users',[
        'login'    => $request->login,
        'password' => md5($request->password),
        'level'    => 'admin'
    ]);

    if($user)
    {
        session()->set(['user'=>$user]);
        return redirect()->route('auth/login-admin');
    }

    return redirect()->route('auth/login-admin')->withMessage('fail','Login Gagal!');


}

return partial('auth/login-admin');